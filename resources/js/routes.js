const routes = {
    "debugbar.openhandler": {
        "uri": "_debugbar\/open"
    },
    "debugbar.clockwork": {
        "uri": "_debugbar\/clockwork\/{id}"
    },
    "debugbar.telescope": {
        "uri": "_debugbar\/telescope\/{id}"
    },
    "debugbar.assets.css": {
        "uri": "_debugbar\/assets\/stylesheets"
    },
    "debugbar.assets.js": {
        "uri": "_debugbar\/assets\/javascript"
    },
    "debugbar.cache.delete": {
        "uri": "_debugbar\/cache\/{key}\/{tags?}"
    },
    "generated::AB9FIt6JHEA58qLL": {
        "uri": "api\/user"
    },
    "home.index": {
        "uri": "\/"
    },
    "examGetlist": {
        "uri": "\/{name}\/{question}"
    },
    "examDelete": {
        "uri": "\/delete\/exam\/{id}\/{use}"
    },
    "examlist": {
        "uri": "\/exam-list"
    },
    "examEdit": {
        "uri": "\/edit\/exam\/{id}"
    },
    "examSolve": {
        "uri": "\/solve\/exam\/{id}"
    },
    "examResultwith": {
        "uri": "\/exam\/exam-result\/{id}"
    }
};

const route = (routeName, params = [], absolute = true) => {
  const _route = routes[routeName];
  if (_route == null) throw "Requested route doesn't exist";

  let uri = _route.uri;

  const matches = uri.match(/{[\w]+}/g) || [];
  const requiredParametersCount = matches.length;

  if (params instanceof Array) {
    if (params.length < requiredParametersCount) throw "Missing parameters";

    for (let i = 0; i < requiredParametersCount; i++)
      uri = uri.replace(/{[\w]+}/, params.shift());

    for (let i = 0; i < params.length; i++)
      uri += (i ? "&" : "?") + params[i] + "=" + params[i];
  } else if (params instanceof Object) {
    let extraParams = matches.reduce((ac, match) => {
      let key = match.substring(1, match.length - 1);
      if (params.hasOwnProperty(key)) {
        uri = uri.replace(new RegExp(match, "g"), params[key]);
        delete ac[key];
      }
      return ac;
    }, params);

    Object.keys(extraParams).forEach((key, i) => {
      uri += (i ? "&" : "?") + key + "=" + extraParams[key];
    });
  }

  if (uri.includes("}")) throw "Missing parameters";

    return "http://localhost:8000" + uri;
};

export { route };
