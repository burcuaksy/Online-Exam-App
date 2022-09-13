<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\examList;
use App\Models\examResult;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ExamListController extends Controller
{
    public function index($name, $question) {
        $data = [
            'name' => $name,
            'question' => $question,
            'body' => '',
            'passive' => 0,
            'deleted' => 0,
        ];

        $exams = examList::create($data);   
        $exams->save();

        return response()->json([
            'status' => true, 
            'data' => $exams->name.' Adlı '.$exams->question.' soruluk sınav oluşturma işlemi başarılı.',
            'id' => $exams->id,
        ], 200);
    }

    public function examdetail($id) {

        $examData = examList::select('*')->where('id', $id)->first();

        return view('system/updateexam', compact('examData'));
    }

    public function examsave(Request $request, examList $examList ,$id) {
        $examData = examList::select('*')->where('id', $id)->first();
        $arr = [];

        for ($i=1; $i < $examData->question + 1; $i++) { 
            $data = [
                'question' => $request['question'.strval($i)],
                'answer1' => $request['cevap1'.strval($i)],
                'answer2' => $request['cevap2'.strval($i)],
                'answer3' => $request['cevap3'.strval($i)],
                'answer4' => $request['cevap4'.strval($i)],
                'second' => $request['second'.strval($i)],
                'istext' => $request['istext'.strval($i)]
            ];
            array_push($arr, $data);
        }
        $questions = json_encode($arr);

        $body = [
            'body' => $questions,
            'passive' => 1,
        ];

        examList::select('*')->where('id', $id)->update($body);

        return view('dashboard');
    }

    public function editexam($id) {
        if(Auth::user()->roles == 0) {
            $examData = examList::select('*')->where('id', $id)->first();

            $questions = json_decode($examData->body);
    
            return view('system/editexam', compact('examData', 'questions'));
        }else {
            return view('dashboard');
        }
    }

    public function solveexam($id) {
        $examData = examList::select('*')->where('id', $id)->first();
        $second = 0;

        $questions = json_decode($examData->body);

        foreach ($questions as $key => $value) {
            $second = $second + $value->second;
        }

        return view('system/solveexam', compact('examData', 'questions', 'second'));
    }

    public function examsolvesave(Request $request, $id, $user) {

        $examData = examList::select('*')->where('id', $id)->first();

        $data = json_encode($request->request->all());

        $insert = [
            'quizname' => $examData->name,
            'quizId' => $id,
            'student' => $user,
            'point' => 0,
            'status' => 'Açıklanmadı'
        ];

        $exams = examResult::create($insert);   
        $exams->save();

        $examUpdate = examResult::select('*')->where('id', $exams->id)->update(['body' => $data]);

        return view('dashboard');
    }

    public function examlist() {
        
        $data = examList::select('*')->get();

        $status = examResult::select('quizId')->where('student', Auth::user()->id)->get();

        $statusdata = [];

        foreach ($status as $key => $value) {
            array_push($statusdata, $value->quizId);
        }

        return view('system/examlist', compact('data', 'statusdata'));
    }

    public function result() {
        if(Auth::user()->roles == 0) {
            $data = DB::table('exam_result')
            ->join('users', 'exam_result.student', '=', 'users.id')
            ->select('exam_result.*', 'users.name as userName')
            ->get();

            return view('system/examresult', compact('data'));
        }else {
            $data = DB::table('exam_result')
            ->join('users', 'exam_result.student', '=', 'users.id')
            ->select('exam_result.*', 'users.name as userName')
            ->where('exam_result.student', Auth::user()->id)
            ->get();

            return view('system/examresult', compact('data'));
        }
       
    }

    public function pointexam(Request $request, $id, $user) {
        $point = 0;
        $exam = examList::select('*')->where('id', $id)->first();
        $pointStat = 100 / $exam->question;

        foreach ($request->all() as $key => $value) {
            if($key != "_token" && $value == 1){
                $point = $point + $pointStat;
            }
        }

        $examResult = floor($point);

        examResult::select('*')->where([['quizId', $id], ['student', $user]])->update(['point' => $examResult, 'status' => 'Açıklandı']);

        return view('dashboard');
    }

    public function resultexam($id) {

        $result = examResult::select('*')->where('id', $id)->first();
        $exam = examList::select('*')->where('id', $result->quizId)->first();
        $questions = json_decode($exam->body);
        $answer = json_decode($result->body, TRUE);
        
        return view('system/resultexam', compact('result', 'exam', 'questions', 'answer'));
    }

    public function examdelete($id, $use) {
        if(Auth::user()->roles == 0) {
            $data = examList::select('*')->where('id', $id)->first();

            if($use == 0) {
                examList::select('*')->where('id', $id)->update(['deleted' => 1]);

                return response()->json([
                    'status' => true, 
                    'data' => $data->name.' Adlı sınav başarılı bir şekilde silindi.',
                ], 200);
            }else {
                if($data->passive == 1) {
                    examList::select('*')->where('id', $id)->update(['passive' => 0]);

                    return response()->json([
                        'status' => true, 
                        'data' => $data->name.' Adlı sınav başarılı bir şekilde pasif edildi.',
                    ], 200);
                }else {
                    examList::select('*')->where('id', $id)->update(['passive' => 1]);

                    return response()->json([
                        'status' => true, 
                        'data' => $data->name.' Adlı sınav başarılı bir şekilde aktif edildi.',
                    ], 200);
                }
            }
        }else {
            return view('dashboard');
        }
    }
}
