// 4.2.1 (2015-06-29)
! function(e, t) {
    "use strict";

    function n(e, t) {
        for (var n, r = [], i = 0; i < e.length; ++i) {
            if (n = s[e[i]] || o(e[i]), !n) throw "module definition dependecy not found: " + e[i];
            r.push(n)
        }
        t.apply(null, r)
    }

    function r(e, r, i) {
        if ("string" != typeof e) throw "invalid module definition, module id must be defined and be a string";
        if (r === t) throw "invalid module definition, dependencies must be specified";
        if (i === t) throw "invalid module definition, definition function must be specified";
        n(r, function() {
            s[e] = i.apply(null, arguments)
        })
    }

    function i(e) {
        return !!s[e]
    }

    function o(t) {
        for (var n = e, r = t.split(/[.\/]/), i = 0; i < r.length; ++i) {
            if (!n[r[i]]) return;
            n = n[r[i]]
        }
        return n
    }

    function a(n) {
        for (var r = 0; r < n.length; r++) {
            for (var i = e, o = n[r], a = o.split(/[.\/]/), l = 0; l < a.length - 1; ++l) i[a[l]] === t && (i[a[l]] = {}), i = i[a[l]];
            i[a[a.length - 1]] = s[o]
        }
    }
    var s = {},
        l = "tinymce/dom/EventUtils",
        c = "tinymce/dom/Sizzle",
        u = "tinymce/Env",
        d = "tinymce/util/Tools",
        f = "tinymce/dom/DomQuery",
        h = "tinymce/html/Styles",
        p = "tinymce/dom/TreeWalker",
        m = "tinymce/dom/Range",
        g = "tinymce/html/Entities",
        v = "tinymce/dom/StyleSheetLoader",
        y = "tinymce/dom/DOMUtils",
        b = "tinymce/dom/ScriptLoader",
        x = "tinymce/AddOnManager",
        C = "tinymce/dom/RangeUtils",
        w = "tinymce/NodeChange",
        _ = "tinymce/html/Node",
        E = "tinymce/html/Schema",
        N = "tinymce/html/SaxParser",
        S = "tinymce/html/DomParser",
        k = "tinymce/html/Writer",
        T = "tinymce/html/Serializer",
        R = "tinymce/dom/Serializer",
        A = "tinymce/dom/TridentSelection",
        B = "tinymce/util/VK",
        D = "tinymce/dom/ControlSelection",
        L = "tinymce/dom/BookmarkManager",
        M = "tinymce/dom/Selection",
        H = "tinymce/dom/ElementUtils",
        P = "tinymce/fmt/Preview",
        O = "tinymce/Formatter",
        I = "tinymce/UndoManager",
        F = "tinymce/EnterKey",
        z = "tinymce/ForceBlocks",
        W = "tinymce/EditorCommands",
        V = "tinymce/util/URI",
        U = "tinymce/util/Class",
        $ = "tinymce/util/EventDispatcher",
        q = "tinymce/data/Binding",
        j = "tinymce/util/Observable",
        K = "tinymce/data/ObservableObject",
        Y = "tinymce/ui/Selector",
        G = "tinymce/ui/Collection",
        X = "tinymce/ui/DomUtils",
        J = "tinymce/ui/BoxUtils",
        Q = "tinymce/ui/ClassList",
        Z = "tinymce/ui/ReflowQueue",
        ee = "tinymce/ui/Control",
        te = "tinymce/ui/Factory",
        ne = "tinymce/ui/KeyboardNavigation",
        re = "tinymce/ui/Container",
        ie = "tinymce/ui/DragHelper",
        oe = "tinymce/ui/Scrollable",
        ae = "tinymce/ui/Panel",
        se = "tinymce/ui/Movable",
        le = "tinymce/ui/Resizable",
        ce = "tinymce/ui/FloatPanel",
        ue = "tinymce/ui/Window",
        de = "tinymce/ui/MessageBox",
        fe = "tinymce/WindowManager",
        he = "tinymce/util/Quirks",
        pe = "tinymce/EditorObservable",
        me = "tinymce/Shortcuts",
        ge = "tinymce/util/Promise",
        ve = "tinymce/file/Uploader",
        ye = "tinymce/file/Conversions",
        be = "tinymce/file/ImageScanner",
        xe = "tinymce/file/BlobCache",
        Ce = "tinymce/EditorUpload",
        we = "tinymce/Editor",
        _e = "tinymce/util/I18n",
        Ee = "tinymce/FocusManager",
        Ne = "tinymce/EditorManager",
        Se = "tinymce/LegacyInput",
        ke = "tinymce/util/XHR",
        Te = "tinymce/util/JSON",
        Re = "tinymce/util/JSONRequest",
        Ae = "tinymce/util/JSONP",
        Be = "tinymce/util/LocalStorage",
        De = "tinymce/Compat",
        Le = "tinymce/ui/Layout",
        Me = "tinymce/ui/AbsoluteLayout",
        He = "tinymce/ui/Tooltip",
        Pe = "tinymce/ui/Widget",
        Oe = "tinymce/ui/Button",
        Ie = "tinymce/ui/ButtonGroup",
        Fe = "tinymce/ui/Checkbox",
        ze = "tinymce/ui/ComboBox",
        We = "tinymce/ui/ColorBox",
        Ve = "tinymce/ui/PanelButton",
        Ue = "tinymce/ui/ColorButton",
        $e = "tinymce/util/Color",
        qe = "tinymce/ui/ColorPicker",
        je = "tinymce/ui/Path",
        Ke = "tinymce/ui/ElementPath",
        Ye = "tinymce/ui/FormItem",
        Ge = "tinymce/ui/Form",
        Xe = "tinymce/ui/FieldSet",
        Je = "tinymce/ui/FilePicker",
        Qe = "tinymce/ui/FitLayout",
        Ze = "tinymce/ui/FlexLayout",
        et = "tinymce/ui/FlowLayout",
        tt = "tinymce/ui/FormatControls",
        nt = "tinymce/ui/GridLayout",
        rt = "tinymce/ui/Iframe",
        it = "tinymce/ui/Label",
        ot = "tinymce/ui/Toolbar",
        at = "tinymce/ui/MenuBar",
        st = "tinymce/ui/MenuButton",
        lt = "tinymce/ui/MenuItem",
        ct = "tinymce/ui/Menu",
        ut = "tinymce/ui/ListBox",
        dt = "tinymce/ui/Radio",
        ft = "tinymce/ui/Rect",
        ht = "tinymce/ui/ResizeHandle",
        pt = "tinymce/ui/Slider",
        mt = "tinymce/ui/Spacer",
        gt = "tinymce/ui/SplitButton",
        vt = "tinymce/ui/StackLayout",
        yt = "tinymce/ui/TabPanel",
        bt = "tinymce/ui/TextBox",
        xt = "tinymce/ui/Throbber";
    r(l, [], function() {
        function e(e, t, n, r) {
            e.addEventListener ? e.addEventListener(t, n, r || !1) : e.attachEvent && e.attachEvent("on" + t, n)
        }

        function t(e, t, n, r) {
            e.removeEventListener ? e.removeEventListener(t, n, r || !1) : e.detachEvent && e.detachEvent("on" + t, n)
        }

        function n(e, t) {
            function n() {
                return !1
            }

            function r() {
                return !0
            }
            var i, o = t || {},
                l;
            for (i in e) s[i] || (o[i] = e[i]);
            if (o.target || (o.target = o.srcElement || document), e && a.test(e.type) && e.pageX === l && e.clientX !== l) {
                var c = o.target.ownerDocument || document,
                    u = c.documentElement,
                    d = c.body;
                o.pageX = e.clientX + (u && u.scrollLeft || d && d.scrollLeft || 0) - (u && u.clientLeft || d && d.clientLeft || 0), o.pageY = e.clientY + (u && u.scrollTop || d && d.scrollTop || 0) - (u && u.clientTop || d && d.clientTop || 0)
            }
            return o.preventDefault = function() {
                o.isDefaultPrevented = r, e && (e.preventDefault ? e.preventDefault() : e.returnValue = !1)
            }, o.stopPropagation = function() {
                o.isPropagationStopped = r, e && (e.stopPropagation ? e.stopPropagation() : e.cancelBubble = !0)
            }, o.stopImmediatePropagation = function() {
                o.isImmediatePropagationStopped = r, o.stopPropagation()
            }, o.isDefaultPrevented || (o.isDefaultPrevented = n, o.isPropagationStopped = n, o.isImmediatePropagationStopped = n), o
        }

        function r(n, r, i) {
            function o() {
                i.domLoaded || (i.domLoaded = !0, r(c))
            }

            function a() {
                ("complete" === l.readyState || "interactive" === l.readyState && l.body) && (t(l, "readystatechange", a), o())
            }

            function s() {
                try {
                    l.documentElement.doScroll("left")
                } catch (e) {
                    return void setTimeout(s, 0)
                }
                o()
            }
            var l = n.document,
                c = {
                    type: "ready"
                };
            return i.domLoaded ? void r(c) : (l.addEventListener ? "complete" === l.readyState ? o() : e(n, "DOMContentLoaded", o) : (e(l, "readystatechange", a), l.documentElement.doScroll && n.self === n.top && s()), void e(n, "load", o))
        }

        function i() {
            function i(e, t) {
                var n, r, i, o, a = s[t];
                if (n = a && a[e.type])
                    for (r = 0, i = n.length; i > r; r++)
                        if (o = n[r], o && o.func.call(o.scope, e) === !1 && e.preventDefault(), e.isImmediatePropagationStopped()) return
            }
            var a = this,
                s = {},
                l, c, u, d, f;
            c = o + (+new Date).toString(32), d = "onmouseenter" in document.documentElement, u = "onfocusin" in document.documentElement, f = {
                mouseenter: "mouseover",
                mouseleave: "mouseout"
            }, l = 1, a.domLoaded = !1, a.events = s, a.bind = function(t, o, h, p) {
                function m(e) {
                    i(n(e || _.event), g)
                }
                var g, v, y, b, x, C, w, _ = window;
                if (t && 3 !== t.nodeType && 8 !== t.nodeType) {
                    for (t[c] ? g = t[c] : (g = l++, t[c] = g, s[g] = {}), p = p || t, o = o.split(" "), y = o.length; y--;) b = o[y], C = m, x = w = !1, "DOMContentLoaded" === b && (b = "ready"), a.domLoaded && "ready" === b && "complete" == t.readyState ? h.call(p, n({
                        type: b
                    })) : (d || (x = f[b], x && (C = function(e) {
                        var t, r;
                        if (t = e.currentTarget, r = e.relatedTarget, r && t.contains) r = t.contains(r);
                        else
                            for (; r && r !== t;) r = r.parentNode;
                        r || (e = n(e || _.event), e.type = "mouseout" === e.type ? "mouseleave" : "mouseenter", e.target = t, i(e, g))
                    })), u || "focusin" !== b && "focusout" !== b || (w = !0, x = "focusin" === b ? "focus" : "blur", C = function(e) {
                        e = n(e || _.event), e.type = "focus" === e.type ? "focusin" : "focusout", i(e, g)
                    }), v = s[g][b], v ? "ready" === b && a.domLoaded ? h({
                        type: b
                    }) : v.push({
                        func: h,
                        scope: p
                    }) : (s[g][b] = v = [{
                        func: h,
                        scope: p
                    }], v.fakeName = x, v.capture = w, v.nativeHandler = C, "ready" === b ? r(t, C, a) : e(t, x || b, C, w)));
                    return t = v = 0, h
                }
            }, a.unbind = function(e, n, r) {
                var i, o, l, u, d, f;
                if (!e || 3 === e.nodeType || 8 === e.nodeType) return a;
                if (i = e[c]) {
                    if (f = s[i], n) {
                        for (n = n.split(" "), l = n.length; l--;)
                            if (d = n[l], o = f[d]) {
                                if (r)
                                    for (u = o.length; u--;)
                                        if (o[u].func === r) {
                                            var h = o.nativeHandler,
                                                p = o.fakeName,
                                                m = o.capture;
                                            o = o.slice(0, u).concat(o.slice(u + 1)), o.nativeHandler = h, o.fakeName = p, o.capture = m, f[d] = o
                                        }
                                r && 0 !== o.length || (delete f[d], t(e, o.fakeName || d, o.nativeHandler, o.capture))
                            }
                    } else {
                        for (d in f) o = f[d], t(e, o.fakeName || d, o.nativeHandler, o.capture);
                        f = {}
                    }
                    for (d in f) return a;
                    delete s[i];
                    try {
                        delete e[c]
                    } catch (g) {
                        e[c] = null
                    }
                }
                return a
            }, a.fire = function(e, t, r) {
                var o;
                if (!e || 3 === e.nodeType || 8 === e.nodeType) return a;
                r = n(null, r), r.type = t, r.target = e;
                do o = e[c], o && i(r, o), e = e.parentNode || e.ownerDocument || e.defaultView || e.parentWindow; while (e && !r.isPropagationStopped());
                return a
            }, a.clean = function(e) {
                var t, n, r = a.unbind;
                if (!e || 3 === e.nodeType || 8 === e.nodeType) return a;
                if (e[c] && r(e), e.getElementsByTagName || (e = e.document), e && e.getElementsByTagName)
                    for (r(e), n = e.getElementsByTagName("*"), t = n.length; t--;) e = n[t], e[c] && r(e);
                return a
            }, a.destroy = function() {
                s = {}
            }, a.cancel = function(e) {
                return e && (e.preventDefault(), e.stopImmediatePropagation()), !1
            }
        }
        var o = "mce-data-",
            a = /^(?:mouse|contextmenu)|click/,
            s = {
                keyLocation: 1,
                layerX: 1,
                layerY: 1,
                returnValue: 1,
                webkitMovementX: 1,
                webkitMovementY: 1
            };
        return i.Event = new i, i.Event.bind(window, "ready", function() {}), i
    }), r(c, [], function() {
        function e(e, t, n, r) {
            var i, o, a, s, l, c, d, h, p, m;
            if ((t ? t.ownerDocument || t : z) !== D && B(t), t = t || D, n = n || [], !e || "string" != typeof e) return n;
            if (1 !== (s = t.nodeType) && 9 !== s) return [];
            if (M && !r) {
                if (i = ve.exec(e))
                    if (a = i[1]) {
                        if (9 === s) {
                            if (o = t.getElementById(a), !o || !o.parentNode) return n;
                            if (o.id === a) return n.push(o), n
                        } else if (t.ownerDocument && (o = t.ownerDocument.getElementById(a)) && I(t, o) && o.id === a) return n.push(o), n
                    } else {
                        if (i[2]) return Z.apply(n, t.getElementsByTagName(e)), n;
                        if ((a = i[3]) && C.getElementsByClassName) return Z.apply(n, t.getElementsByClassName(a)), n
                    }
                if (C.qsa && (!H || !H.test(e))) {
                    if (h = d = F, p = t, m = 9 === s && e, 1 === s && "object" !== t.nodeName.toLowerCase()) {
                        for (c = N(e), (d = t.getAttribute("id")) ? h = d.replace(be, "\\$&") : t.setAttribute("id", h), h = "[id='" + h + "'] ", l = c.length; l--;) c[l] = h + f(c[l]);
                        p = ye.test(e) && u(t.parentNode) || t, m = c.join(",")
                    }
                    if (m) try {
                        return Z.apply(n, p.querySelectorAll(m)), n
                    } catch (g) {} finally {
                        d || t.removeAttribute("id")
                    }
                }
            }
            return k(e.replace(se, "$1"), t, n, r)
        }

        function n() {
            function e(n, r) {
                return t.push(n + " ") > w.cacheLength && delete e[t.shift()], e[n + " "] = r
            }
            var t = [];
            return e
        }

        function r(e) {
            return e[F] = !0, e
        }

        function i(e) {
            var t = D.createElement("div");
            try {
                return !!e(t)
            } catch (n) {
                return !1
            } finally {
                t.parentNode && t.parentNode.removeChild(t), t = null
            }
        }

        function o(e, t) {
            for (var n = e.split("|"), r = e.length; r--;) w.attrHandle[n[r]] = t
        }

        function a(e, t) {
            var n = t && e,
                r = n && 1 === e.nodeType && 1 === t.nodeType && (~t.sourceIndex || Y) - (~e.sourceIndex || Y);
            if (r) return r;
            if (n)
                for (; n = n.nextSibling;)
                    if (n === t) return -1;
            return e ? 1 : -1
        }

        function s(e) {
            return function(t) {
                var n = t.nodeName.toLowerCase();
                return "input" === n && t.type === e
            }
        }

        function l(e) {
            return function(t) {
                var n = t.nodeName.toLowerCase();
                return ("input" === n || "button" === n) && t.type === e
            }
        }

        function c(e) {
            return r(function(t) {
                return t = +t, r(function(n, r) {
                    for (var i, o = e([], n.length, t), a = o.length; a--;) n[i = o[a]] && (n[i] = !(r[i] = n[i]))
                })
            })
        }

        function u(e) {
            return e && typeof e.getElementsByTagName !== K && e
        }

        function d() {}

        function f(e) {
            for (var t = 0, n = e.length, r = ""; n > t; t++) r += e[t].value;
            return r
        }

        function h(e, t, n) {
            var r = t.dir,
                i = n && "parentNode" === r,
                o = V++;
            return t.first ? function(t, n, o) {
                for (; t = t[r];)
                    if (1 === t.nodeType || i) return e(t, n, o)
            } : function(t, n, a) {
                var s, l, c = [W, o];
                if (a) {
                    for (; t = t[r];)
                        if ((1 === t.nodeType || i) && e(t, n, a)) return !0
                } else
                    for (; t = t[r];)
                        if (1 === t.nodeType || i) {
                            if (l = t[F] || (t[F] = {}), (s = l[r]) && s[0] === W && s[1] === o) return c[2] = s[2];
                            if (l[r] = c, c[2] = e(t, n, a)) return !0
                        }
            }
        }

        function p(e) {
            return e.length > 1 ? function(t, n, r) {
                for (var i = e.length; i--;)
                    if (!e[i](t, n, r)) return !1;
                return !0
            } : e[0]
        }

        function m(t, n, r) {
            for (var i = 0, o = n.length; o > i; i++) e(t, n[i], r);
            return r
        }

        function g(e, t, n, r, i) {
            for (var o, a = [], s = 0, l = e.length, c = null != t; l > s; s++)(o = e[s]) && (!n || n(o, r, i)) && (a.push(o), c && t.push(s));
            return a
        }

        function v(e, t, n, i, o, a) {
            return i && !i[F] && (i = v(i)), o && !o[F] && (o = v(o, a)), r(function(r, a, s, l) {
                var c, u, d, f = [],
                    h = [],
                    p = a.length,
                    v = r || m(t || "*", s.nodeType ? [s] : s, []),
                    y = !e || !r && t ? v : g(v, f, e, s, l),
                    b = n ? o || (r ? e : p || i) ? [] : a : y;
                if (n && n(y, b, s, l), i)
                    for (c = g(b, h), i(c, [], s, l), u = c.length; u--;)(d = c[u]) && (b[h[u]] = !(y[h[u]] = d));
                if (r) {
                    if (o || e) {
                        if (o) {
                            for (c = [], u = b.length; u--;)(d = b[u]) && c.push(y[u] = d);
                            o(null, b = [], c, l)
                        }
                        for (u = b.length; u--;)(d = b[u]) && (c = o ? te.call(r, d) : f[u]) > -1 && (r[c] = !(a[c] = d))
                    }
                } else b = g(b === a ? b.splice(p, b.length) : b), o ? o(null, a, b, l) : Z.apply(a, b)
            })
        }

        function y(e) {
            for (var t, n, r, i = e.length, o = w.relative[e[0].type], a = o || w.relative[" "], s = o ? 1 : 0, l = h(function(e) {
                return e === t
            }, a, !0), c = h(function(e) {
                return te.call(t, e) > -1
            }, a, !0), u = [function(e, n, r) {
                return !o && (r || n !== T) || ((t = n).nodeType ? l(e, n, r) : c(e, n, r))
            }]; i > s; s++)
                if (n = w.relative[e[s].type]) u = [h(p(u), n)];
                else {
                    if (n = w.filter[e[s].type].apply(null, e[s].matches), n[F]) {
                        for (r = ++s; i > r && !w.relative[e[r].type]; r++);
                        return v(s > 1 && p(u), s > 1 && f(e.slice(0, s - 1).concat({
                            value: " " === e[s - 2].type ? "*" : ""
                        })).replace(se, "$1"), n, r > s && y(e.slice(s, r)), i > r && y(e = e.slice(r)), i > r && f(e))
                    }
                    u.push(n)
                }
            return p(u)
        }

        function b(t, n) {
            var i = n.length > 0,
                o = t.length > 0,
                a = function(r, a, s, l, c) {
                    var u, d, f, h = 0,
                        p = "0",
                        m = r && [],
                        v = [],
                        y = T,
                        b = r || o && w.find.TAG("*", c),
                        x = W += null == y ? 1 : Math.random() || .1,
                        C = b.length;
                    for (c && (T = a !== D && a); p !== C && null != (u = b[p]); p++) {
                        if (o && u) {
                            for (d = 0; f = t[d++];)
                                if (f(u, a, s)) {
                                    l.push(u);
                                    break
                                }
                            c && (W = x)
                        }
                        i && ((u = !f && u) && h--, r && m.push(u))
                    }
                    if (h += p, i && p !== h) {
                        for (d = 0; f = n[d++];) f(m, v, a, s);
                        if (r) {
                            if (h > 0)
                                for (; p--;) m[p] || v[p] || (v[p] = J.call(l));
                            v = g(v)
                        }
                        Z.apply(l, v), c && !r && v.length > 0 && h + n.length > 1 && e.uniqueSort(l)
                    }
                    return c && (W = x, T = y), m
                };
            return i ? r(a) : a
        }
        var x, C, w, _, E, N, S, k, T, R, A, B, D, L, M, H, P, O, I, F = "sizzle" + -new Date,
            z = window.document,
            W = 0,
            V = 0,
            U = n(),
            $ = n(),
            q = n(),
            j = function(e, t) {
                return e === t && (A = !0), 0
            },
            K = typeof t,
            Y = 1 << 31,
            G = {}.hasOwnProperty,
            X = [],
            J = X.pop,
            Q = X.push,
            Z = X.push,
            ee = X.slice,
            te = X.indexOf || function(e) {
                for (var t = 0, n = this.length; n > t; t++)
                    if (this[t] === e) return t;
                return -1
            },
            ne = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
            re = "[\\x20\\t\\r\\n\\f]",
            ie = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
            oe = "\\[" + re + "*(" + ie + ")(?:" + re + "*([*^$|!~]?=)" + re + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + ie + "))|)" + re + "*\\]",
            ae = ":(" + ie + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + oe + ")*)|.*)\\)|)",
            se = new RegExp("^" + re + "+|((?:^|[^\\\\])(?:\\\\.)*)" + re + "+$", "g"),
            le = new RegExp("^" + re + "*," + re + "*"),
            ce = new RegExp("^" + re + "*([>+~]|" + re + ")" + re + "*"),
            ue = new RegExp("=" + re + "*([^\\]'\"]*?)" + re + "*\\]", "g"),
            de = new RegExp(ae),
            fe = new RegExp("^" + ie + "$"),
            he = {
                ID: new RegExp("^#(" + ie + ")"),
                CLASS: new RegExp("^\\.(" + ie + ")"),
                TAG: new RegExp("^(" + ie + "|[*])"),
                ATTR: new RegExp("^" + oe),
                PSEUDO: new RegExp("^" + ae),
                CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + re + "*(even|odd|(([+-]|)(\\d*)n|)" + re + "*(?:([+-]|)" + re + "*(\\d+)|))" + re + "*\\)|)", "i"),
                bool: new RegExp("^(?:" + ne + ")$", "i"),
                needsContext: new RegExp("^" + re + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + re + "*((?:-\\d)?\\d*)" + re + "*\\)|)(?=[^-]|$)", "i")
            },
            pe = /^(?:input|select|textarea|button)$/i,
            me = /^h\d$/i,
            ge = /^[^{]+\{\s*\[native \w/,
            ve = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
            ye = /[+~]/,
            be = /'|\\/g,
            xe = new RegExp("\\\\([\\da-f]{1,6}" + re + "?|(" + re + ")|.)", "ig"),
            Ce = function(e, t, n) {
                var r = "0x" + t - 65536;
                return r !== r || n ? t : 0 > r ? String.fromCharCode(r + 65536) : String.fromCharCode(r >> 10 | 55296, 1023 & r | 56320)
            };
        try {
            Z.apply(X = ee.call(z.childNodes), z.childNodes), X[z.childNodes.length].nodeType
        } catch (we) {
            Z = {
                apply: X.length ? function(e, t) {
                    Q.apply(e, ee.call(t))
                } : function(e, t) {
                    for (var n = e.length, r = 0; e[n++] = t[r++];);
                    e.length = n - 1
                }
            }
        }
        C = e.support = {}, E = e.isXML = function(e) {
            var t = e && (e.ownerDocument || e).documentElement;
            return t ? "HTML" !== t.nodeName : !1
        }, B = e.setDocument = function(e) {
            var t, n = e ? e.ownerDocument || e : z,
                r = n.defaultView;
            return n !== D && 9 === n.nodeType && n.documentElement ? (D = n, L = n.documentElement, M = !E(n), r && r !== r.top && (r.addEventListener ? r.addEventListener("unload", function() {
                B()
            }, !1) : r.attachEvent && r.attachEvent("onunload", function() {
                B()
            })), C.attributes = i(function(e) {
                return e.className = "i", !e.getAttribute("className")
            }), C.getElementsByTagName = i(function(e) {
                return e.appendChild(n.createComment("")), !e.getElementsByTagName("*").length
            }), C.getElementsByClassName = ge.test(n.getElementsByClassName), C.getById = i(function(e) {
                return L.appendChild(e).id = F, !n.getElementsByName || !n.getElementsByName(F).length
            }), C.getById ? (w.find.ID = function(e, t) {
                if (typeof t.getElementById !== K && M) {
                    var n = t.getElementById(e);
                    return n && n.parentNode ? [n] : []
                }
            }, w.filter.ID = function(e) {
                var t = e.replace(xe, Ce);
                return function(e) {
                    return e.getAttribute("id") === t
                }
            }) : (delete w.find.ID, w.filter.ID = function(e) {
                var t = e.replace(xe, Ce);
                return function(e) {
                    var n = typeof e.getAttributeNode !== K && e.getAttributeNode("id");
                    return n && n.value === t
                }
            }), w.find.TAG = C.getElementsByTagName ? function(e, t) {
                return typeof t.getElementsByTagName !== K ? t.getElementsByTagName(e) : void 0
            } : function(e, t) {
                var n, r = [],
                    i = 0,
                    o = t.getElementsByTagName(e);
                if ("*" === e) {
                    for (; n = o[i++];) 1 === n.nodeType && r.push(n);
                    return r
                }
                return o
            }, w.find.CLASS = C.getElementsByClassName && function(e, t) {
                return M ? t.getElementsByClassName(e) : void 0
            }, P = [], H = [], (C.qsa = ge.test(n.querySelectorAll)) && (i(function(e) {
                e.innerHTML = "<select msallowcapture=''><option selected=''></option></select>", e.querySelectorAll("[msallowcapture^='']").length && H.push("[*^$]=" + re + "*(?:''|\"\")"), e.querySelectorAll("[selected]").length || H.push("\\[" + re + "*(?:value|" + ne + ")"), e.querySelectorAll(":checked").length || H.push(":checked")
            }), i(function(e) {
                var t = n.createElement("input");
                t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("name", "D"), e.querySelectorAll("[name=d]").length && H.push("name" + re + "*[*^$|!~]?="), e.querySelectorAll(":enabled").length || H.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), H.push(",.*:")
            })), (C.matchesSelector = ge.test(O = L.matches || L.webkitMatchesSelector || L.mozMatchesSelector || L.oMatchesSelector || L.msMatchesSelector)) && i(function(e) {
                C.disconnectedMatch = O.call(e, "div"), O.call(e, "[s!='']:x"), P.push("!=", ae)
            }), H = H.length && new RegExp(H.join("|")), P = P.length && new RegExp(P.join("|")), t = ge.test(L.compareDocumentPosition), I = t || ge.test(L.contains) ? function(e, t) {
                var n = 9 === e.nodeType ? e.documentElement : e,
                    r = t && t.parentNode;
                return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r)))
            } : function(e, t) {
                if (t)
                    for (; t = t.parentNode;)
                        if (t === e) return !0;
                return !1
            }, j = t ? function(e, t) {
                if (e === t) return A = !0, 0;
                var r = !e.compareDocumentPosition - !t.compareDocumentPosition;
                return r ? r : (r = (e.ownerDocument || e) === (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1, 1 & r || !C.sortDetached && t.compareDocumentPosition(e) === r ? e === n || e.ownerDocument === z && I(z, e) ? -1 : t === n || t.ownerDocument === z && I(z, t) ? 1 : R ? te.call(R, e) - te.call(R, t) : 0 : 4 & r ? -1 : 1)
            } : function(e, t) {
                if (e === t) return A = !0, 0;
                var r, i = 0,
                    o = e.parentNode,
                    s = t.parentNode,
                    l = [e],
                    c = [t];
                if (!o || !s) return e === n ? -1 : t === n ? 1 : o ? -1 : s ? 1 : R ? te.call(R, e) - te.call(R, t) : 0;
                if (o === s) return a(e, t);
                for (r = e; r = r.parentNode;) l.unshift(r);
                for (r = t; r = r.parentNode;) c.unshift(r);
                for (; l[i] === c[i];) i++;
                return i ? a(l[i], c[i]) : l[i] === z ? -1 : c[i] === z ? 1 : 0
            }, n) : D
        }, e.matches = function(t, n) {
            return e(t, null, null, n)
        }, e.matchesSelector = function(t, n) {
            if ((t.ownerDocument || t) !== D && B(t), n = n.replace(ue, "='$1']"), !(!C.matchesSelector || !M || P && P.test(n) || H && H.test(n))) try {
                var r = O.call(t, n);
                if (r || C.disconnectedMatch || t.document && 11 !== t.document.nodeType) return r
            } catch (i) {}
            return e(n, D, null, [t]).length > 0
        }, e.contains = function(e, t) {
            return (e.ownerDocument || e) !== D && B(e), I(e, t)
        }, e.attr = function(e, n) {
            (e.ownerDocument || e) !== D && B(e);
            var r = w.attrHandle[n.toLowerCase()],
                i = r && G.call(w.attrHandle, n.toLowerCase()) ? r(e, n, !M) : t;
            return i !== t ? i : C.attributes || !M ? e.getAttribute(n) : (i = e.getAttributeNode(n)) && i.specified ? i.value : null
        }, e.error = function(e) {
            throw new Error("Syntax error, unrecognized expression: " + e)
        }, e.uniqueSort = function(e) {
            var t, n = [],
                r = 0,
                i = 0;
            if (A = !C.detectDuplicates, R = !C.sortStable && e.slice(0), e.sort(j), A) {
                for (; t = e[i++];) t === e[i] && (r = n.push(i));
                for (; r--;) e.splice(n[r], 1)
            }
            return R = null, e
        }, _ = e.getText = function(e) {
            var t, n = "",
                r = 0,
                i = e.nodeType;
            if (i) {
                if (1 === i || 9 === i || 11 === i) {
                    if ("string" == typeof e.textContent) return e.textContent;
                    for (e = e.firstChild; e; e = e.nextSibling) n += _(e)
                } else if (3 === i || 4 === i) return e.nodeValue
            } else
                for (; t = e[r++];) n += _(t);
            return n
        }, w = e.selectors = {
            cacheLength: 50,
            createPseudo: r,
            match: he,
            attrHandle: {},
            find: {},
            relative: {
                ">": {
                    dir: "parentNode",
                    first: !0
                },
                " ": {
                    dir: "parentNode"
                },
                "+": {
                    dir: "previousSibling",
                    first: !0
                },
                "~": {
                    dir: "previousSibling"
                }
            },
            preFilter: {
                ATTR: function(e) {
                    return e[1] = e[1].replace(xe, Ce), e[3] = (e[3] || e[4] || e[5] || "").replace(xe, Ce), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                },
                CHILD: function(t) {
                    return t[1] = t[1].toLowerCase(), "nth" === t[1].slice(0, 3) ? (t[3] || e.error(t[0]), t[4] = +(t[4] ? t[5] + (t[6] || 1) : 2 * ("even" === t[3] || "odd" === t[3])), t[5] = +(t[7] + t[8] || "odd" === t[3])) : t[3] && e.error(t[0]), t
                },
                PSEUDO: function(e) {
                    var t, n = !e[6] && e[2];
                    return he.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n && de.test(n) && (t = N(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3))
                }
            },
            filter: {
                TAG: function(e) {
                    var t = e.replace(xe, Ce).toLowerCase();
                    return "*" === e ? function() {
                        return !0
                    } : function(e) {
                        return e.nodeName && e.nodeName.toLowerCase() === t
                    }
                },
                CLASS: function(e) {
                    var t = U[e + " "];
                    return t || (t = new RegExp("(^|" + re + ")" + e + "(" + re + "|$)")) && U(e, function(e) {
                        return t.test("string" == typeof e.className && e.className || typeof e.getAttribute !== K && e.getAttribute("class") || "")
                    })
                },
                ATTR: function(t, n, r) {
                    return function(i) {
                        var o = e.attr(i, t);
                        return null == o ? "!=" === n : n ? (o += "", "=" === n ? o === r : "!=" === n ? o !== r : "^=" === n ? r && 0 === o.indexOf(r) : "*=" === n ? r && o.indexOf(r) > -1 : "$=" === n ? r && o.slice(-r.length) === r : "~=" === n ? (" " + o + " ").indexOf(r) > -1 : "|=" === n ? o === r || o.slice(0, r.length + 1) === r + "-" : !1) : !0
                    }
                },
                CHILD: function(e, t, n, r, i) {
                    var o = "nth" !== e.slice(0, 3),
                        a = "last" !== e.slice(-4),
                        s = "of-type" === t;
                    return 1 === r && 0 === i ? function(e) {
                        return !!e.parentNode
                    } : function(t, n, l) {
                        var c, u, d, f, h, p, m = o !== a ? "nextSibling" : "previousSibling",
                            g = t.parentNode,
                            v = s && t.nodeName.toLowerCase(),
                            y = !l && !s;
                        if (g) {
                            if (o) {
                                for (; m;) {
                                    for (d = t; d = d[m];)
                                        if (s ? d.nodeName.toLowerCase() === v : 1 === d.nodeType) return !1;
                                    p = m = "only" === e && !p && "nextSibling"
                                }
                                return !0
                            }
                            if (p = [a ? g.firstChild : g.lastChild], a && y) {
                                for (u = g[F] || (g[F] = {}), c = u[e] || [], h = c[0] === W && c[1], f = c[0] === W && c[2], d = h && g.childNodes[h]; d = ++h && d && d[m] || (f = h = 0) || p.pop();)
                                    if (1 === d.nodeType && ++f && d === t) {
                                        u[e] = [W, h, f];
                                        break
                                    }
                            } else if (y && (c = (t[F] || (t[F] = {}))[e]) && c[0] === W) f = c[1];
                            else
                                for (;
                                    (d = ++h && d && d[m] || (f = h = 0) || p.pop()) && ((s ? d.nodeName.toLowerCase() !== v : 1 !== d.nodeType) || !++f || (y && ((d[F] || (d[F] = {}))[e] = [W, f]), d !== t)););
                            return f -= i, f === r || f % r === 0 && f / r >= 0
                        }
                    }
                },
                PSEUDO: function(t, n) {
                    var i, o = w.pseudos[t] || w.setFilters[t.toLowerCase()] || e.error("unsupported pseudo: " + t);
                    return o[F] ? o(n) : o.length > 1 ? (i = [t, t, "", n], w.setFilters.hasOwnProperty(t.toLowerCase()) ? r(function(e, t) {
                        for (var r, i = o(e, n), a = i.length; a--;) r = te.call(e, i[a]), e[r] = !(t[r] = i[a])
                    }) : function(e) {
                        return o(e, 0, i)
                    }) : o
                }
            },
            pseudos: {
                not: r(function(e) {
                    var t = [],
                        n = [],
                        i = S(e.replace(se, "$1"));
                    return i[F] ? r(function(e, t, n, r) {
                        for (var o, a = i(e, null, r, []), s = e.length; s--;)(o = a[s]) && (e[s] = !(t[s] = o))
                    }) : function(e, r, o) {
                        return t[0] = e, i(t, null, o, n), !n.pop()
                    }
                }),
                has: r(function(t) {
                    return function(n) {
                        return e(t, n).length > 0
                    }
                }),
                contains: r(function(e) {
                    return e = e.replace(xe, Ce),
                        function(t) {
                            return (t.textContent || t.innerText || _(t)).indexOf(e) > -1
                        }
                }),
                lang: r(function(t) {
                    return fe.test(t || "") || e.error("unsupported lang: " + t), t = t.replace(xe, Ce).toLowerCase(),
                        function(e) {
                            var n;
                            do
                                if (n = M ? e.lang : e.getAttribute("xml:lang") || e.getAttribute("lang")) return n = n.toLowerCase(), n === t || 0 === n.indexOf(t + "-");
                            while ((e = e.parentNode) && 1 === e.nodeType);
                            return !1
                        }
                }),
                target: function(e) {
                    var t = window.location && window.location.hash;
                    return t && t.slice(1) === e.id
                },
                root: function(e) {
                    return e === L
                },
                focus: function(e) {
                    return e === D.activeElement && (!D.hasFocus || D.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                },
                enabled: function(e) {
                    return e.disabled === !1
                },
                disabled: function(e) {
                    return e.disabled === !0
                },
                checked: function(e) {
                    var t = e.nodeName.toLowerCase();
                    return "input" === t && !!e.checked || "option" === t && !!e.selected
                },
                selected: function(e) {
                    return e.parentNode && e.parentNode.selectedIndex, e.selected === !0
                },
                empty: function(e) {
                    for (e = e.firstChild; e; e = e.nextSibling)
                        if (e.nodeType < 6) return !1;
                    return !0
                },
                parent: function(e) {
                    return !w.pseudos.empty(e)
                },
                header: function(e) {
                    return me.test(e.nodeName)
                },
                input: function(e) {
                    return pe.test(e.nodeName)
                },
                button: function(e) {
                    var t = e.nodeName.toLowerCase();
                    return "input" === t && "button" === e.type || "button" === t
                },
                text: function(e) {
                    var t;
                    return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase())
                },
                first: c(function() {
                    return [0]
                }),
                last: c(function(e, t) {
                    return [t - 1]
                }),
                eq: c(function(e, t, n) {
                    return [0 > n ? n + t : n]
                }),
                even: c(function(e, t) {
                    for (var n = 0; t > n; n += 2) e.push(n);
                    return e
                }),
                odd: c(function(e, t) {
                    for (var n = 1; t > n; n += 2) e.push(n);
                    return e
                }),
                lt: c(function(e, t, n) {
                    for (var r = 0 > n ? n + t : n; --r >= 0;) e.push(r);
                    return e
                }),
                gt: c(function(e, t, n) {
                    for (var r = 0 > n ? n + t : n; ++r < t;) e.push(r);
                    return e
                })
            }
        }, w.pseudos.nth = w.pseudos.eq;
        for (x in {
            radio: !0,
            checkbox: !0,
            file: !0,
            password: !0,
            image: !0
        }) w.pseudos[x] = s(x);
        for (x in {
            submit: !0,
            reset: !0
        }) w.pseudos[x] = l(x);
        return d.prototype = w.filters = w.pseudos, w.setFilters = new d, N = e.tokenize = function(t, n) {
            var r, i, o, a, s, l, c, u = $[t + " "];
            if (u) return n ? 0 : u.slice(0);
            for (s = t, l = [], c = w.preFilter; s;) {
                (!r || (i = le.exec(s))) && (i && (s = s.slice(i[0].length) || s), l.push(o = [])), r = !1, (i = ce.exec(s)) && (r = i.shift(), o.push({
                    value: r,
                    type: i[0].replace(se, " ")
                }), s = s.slice(r.length));
                for (a in w.filter) !(i = he[a].exec(s)) || c[a] && !(i = c[a](i)) || (r = i.shift(), o.push({
                    value: r,
                    type: a,
                    matches: i
                }), s = s.slice(r.length));
                if (!r) break
            }
            return n ? s.length : s ? e.error(t) : $(t, l).slice(0)
        }, S = e.compile = function(e, t) {
            var n, r = [],
                i = [],
                o = q[e + " "];
            if (!o) {
                for (t || (t = N(e)), n = t.length; n--;) o = y(t[n]), o[F] ? r.push(o) : i.push(o);
                o = q(e, b(i, r)), o.selector = e
            }
            return o
        }, k = e.select = function(e, t, n, r) {
            var i, o, a, s, l, c = "function" == typeof e && e,
                d = !r && N(e = c.selector || e);
            if (n = n || [], 1 === d.length) {
                if (o = d[0] = d[0].slice(0), o.length > 2 && "ID" === (a = o[0]).type && C.getById && 9 === t.nodeType && M && w.relative[o[1].type]) {
                    if (t = (w.find.ID(a.matches[0].replace(xe, Ce), t) || [])[0], !t) return n;
                    c && (t = t.parentNode), e = e.slice(o.shift().value.length)
                }
                for (i = he.needsContext.test(e) ? 0 : o.length; i-- && (a = o[i], !w.relative[s = a.type]);)
                    if ((l = w.find[s]) && (r = l(a.matches[0].replace(xe, Ce), ye.test(o[0].type) && u(t.parentNode) || t))) {
                        if (o.splice(i, 1), e = r.length && f(o), !e) return Z.apply(n, r), n;
                        break
                    }
            }
            return (c || S(e, d))(r, t, !M, n, ye.test(e) && u(t.parentNode) || t), n
        }, C.sortStable = F.split("").sort(j).join("") === F, C.detectDuplicates = !!A, B(), C.sortDetached = i(function(e) {
            return 1 & e.compareDocumentPosition(D.createElement("div"))
        }), i(function(e) {
            return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href")
        }) || o("type|href|height|width", function(e, t, n) {
            return n ? void 0 : e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
        }), C.attributes && i(function(e) {
            return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value")
        }) || o("value", function(e, t, n) {
            return n || "input" !== e.nodeName.toLowerCase() ? void 0 : e.defaultValue
        }), i(function(e) {
            return null == e.getAttribute("disabled")
        }) || o(ne, function(e, t, n) {
            var r;
            return n ? void 0 : e[t] === !0 ? t.toLowerCase() : (r = e.getAttributeNode(t)) && r.specified ? r.value : null
        }), e
    }), r(u, [], function() {
        var e = navigator,
            t = e.userAgent,
            n, r, i, o, a, s, l, c, u, d;
        n = window.opera && window.opera.buildNumber, u = /Android/.test(t), r = /WebKit/.test(t), i = !r && !n && /MSIE/gi.test(t) && /Explorer/gi.test(e.appName), i = i && /MSIE (\w+)\./.exec(t)[1], o = -1 == t.indexOf("Trident/") || -1 == t.indexOf("rv:") && -1 == e.appName.indexOf("Netscape") ? !1 : 11, a = !document.msElementsFromPoint || i || o ? !1 : 12, i = i || o || a, s = !r && !o && /Gecko/.test(t), l = -1 != t.indexOf("Mac"), c = /(iPad|iPhone)/.test(t), d = "FormData" in window && "FileReader" in window && "URL" in window && !!URL.createObjectURL, a && (r = !1);
        var f = !c || d || t.match(/AppleWebKit\/(\d*)/)[1] >= 534;
        return {
            opera: n,
            webkit: r,
            ie: i,
            gecko: s,
            mac: l,
            iOS: c,
            android: u,
            contentEditable: f,
            transparentSrc: "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7",
            caretAfter: 8 != i,
            range: window.getSelection && "Range" in window,
            documentMode: i && !a ? document.documentMode || 7 : 10,
            fileApi: d
        }
    }), r(d, [u], function(e) {
        function n(e) {
            return null === e || e === t ? "" : ("" + e).replace(y, "")
        }

        function r(e, n) {
            return n ? "array" == n && b(e) ? !0 : typeof e == n : e !== t
        }

        function i(e) {
            var t = e,
                n, r;
            if (!b(e))
                for (t = [], n = 0, r = e.length; r > n; n++) t[n] = e[n];
            return t
        }

        function o(e, t, n) {
            var r;
            for (e = e || [], t = t || ",", "string" == typeof e && (e = e.split(t)), n = n || {}, r = e.length; r--;) n[e[r]] = {};
            return n
        }

        function a(e, n, r) {
            var i, o;
            if (!e) return 0;
            if (r = r || e, e.length !== t) {
                for (i = 0, o = e.length; o > i; i++)
                    if (n.call(r, e[i], i, e) === !1) return 0
            } else
                for (i in e)
                    if (e.hasOwnProperty(i) && n.call(r, e[i], i, e) === !1) return 0; return 1
        }

        function s(e, t) {
            var n = [];
            return a(e, function(e) {
                n.push(t(e))
            }), n
        }

        function l(e, t) {
            var n = [];
            return a(e, function(e) {
                (!t || t(e)) && n.push(e)
            }), n
        }

        function c(e, t, n) {
            var r = this,
                i, o, a, s, l, c = 0;
            if (e = /^((static) )?([\w.]+)(:([\w.]+))?/.exec(e), a = e[3].match(/(^|\.)(\w+)$/i)[2], o = r.createNS(e[3].replace(/\.\w+$/, ""), n), !o[a]) {
                if ("static" == e[2]) return o[a] = t, void(this.onCreate && this.onCreate(e[2], e[3], o[a]));
                t[a] || (t[a] = function() {}, c = 1), o[a] = t[a], r.extend(o[a].prototype, t), e[5] && (i = r.resolve(e[5]).prototype, s = e[5].match(/\.(\w+)$/i)[1], l = o[a], c ? o[a] = function() {
                    return i[s].apply(this, arguments)
                } : o[a] = function() {
                    return this.parent = i[s], l.apply(this, arguments)
                }, o[a].prototype[a] = o[a], r.each(i, function(e, t) {
                    o[a].prototype[t] = i[t]
                }), r.each(t, function(e, t) {
                    i[t] ? o[a].prototype[t] = function() {
                        return this.parent = i[t], e.apply(this, arguments)
                    } : t != a && (o[a].prototype[t] = e)
                })), r.each(t["static"], function(e, t) {
                    o[a][t] = e
                })
            }
        }

        function u(e, t) {
            var n, r;
            if (e)
                for (n = 0, r = e.length; r > n; n++)
                    if (e[n] === t) return n;
            return -1
        }

        function d(e, n) {
            var r, i, o, a = arguments,
                s;
            for (r = 1, i = a.length; i > r; r++) {
                n = a[r];
                for (o in n) n.hasOwnProperty(o) && (s = n[o], s !== t && (e[o] = s))
            }
            return e
        }

        function f(e, t, n, r) {
            r = r || this, e && (n && (e = e[n]), a(e, function(e, i) {
                return t.call(r, e, i, n) === !1 ? !1 : void f(e, t, n, r)
            }))
        }

        function h(e, t) {
            var n, r;
            for (t = t || window, e = e.split("."), n = 0; n < e.length; n++) r = e[n], t[r] || (t[r] = {}), t = t[r];
            return t
        }

        function p(e, t) {
            var n, r;
            for (t = t || window, e = e.split("."), n = 0, r = e.length; r > n && (t = t[e[n]], t); n++);
            return t
        }

        function m(e, t) {
            return !e || r(e, "array") ? e : s(e.split(t || ","), n)
        }

        function g(e) {
            return function() {
                return e
            }
        }

        function v(t) {
            var n = e.cacheSuffix;
            return n && (t += (-1 === t.indexOf("?") ? "?" : "&") + n), t
        }
        var y = /^\s*|\s*$/g,
            b = Array.isArray || function(e) {
                return "[object Array]" === Object.prototype.toString.call(e)
            };
        return {
            trim: n,
            isArray: b,
            is: r,
            toArray: i,
            makeMap: o,
            each: a,
            map: s,
            grep: l,
            filter: l,
            inArray: u,
            extend: d,
            create: c,
            walk: f,
            createNS: h,
            resolve: p,
            explode: m,
            constant: g,
            _addCacheSuffix: v
        }
    }), r(f, [l, c, d, u], function(e, n, r, i) {
        function o(e) {
            return "undefined" != typeof e
        }

        function a(e) {
            return "string" == typeof e
        }

        function s(e) {
            return e && e == e.window
        }

        function l(e, t) {
            var n, r, i;
            for (t = t || w, i = t.createElement("div"), n = t.createDocumentFragment(), i.innerHTML = e; r = i.firstChild;) n.appendChild(r);
            return n
        }

        function c(e, t, n, r) {
            var i;
            if (a(t)) t = l(t, v(e[0]));
            else if (t.length && !t.nodeType) {
                if (t = f.makeArray(t), r)
                    for (i = t.length - 1; i >= 0; i--) c(e, t[i], n, r);
                else
                    for (i = 0; i < t.length; i++) c(e, t[i], n, r);
                return e
            }
            if (t.nodeType)
                for (i = e.length; i--;) n.call(e[i], t);
            return e
        }

        function u(e, t) {
            return e && t && -1 !== (" " + e.className + " ").indexOf(" " + t + " ")
        }

        function d(e, t, n) {
            var r, i;
            return t = f(t)[0], e.each(function() {
                var e = this;
                n && r == e.parentNode ? i.appendChild(e) : (r = e.parentNode, i = t.cloneNode(!1), e.parentNode.insertBefore(i, e), i.appendChild(e))
            }), e
        }

        function f(e, t) {
            return new f.fn.init(e, t)
        }

        function h(e, t) {
            var n;
            if (t.indexOf) return t.indexOf(e);
            for (n = t.length; n--;)
                if (t[n] === e) return n;
            return -1
        }

        function p(e) {
            return null === e || e === k ? "" : ("" + e).replace(M, "")
        }

        function m(e, t) {
            var n, r, i, o, a;
            if (e)
                if (n = e.length, n === o) {
                    for (r in e)
                        if (e.hasOwnProperty(r) && (a = e[r], t.call(a, r, a) === !1)) break
                } else
                    for (i = 0; n > i && (a = e[i], t.call(a, i, a) !== !1); i++);
            return e
        }

        function g(e, t) {
            var n = [];
            return m(e, function(e, r) {
                t(r, e) && n.push(r)
            }), n
        }

        function v(e) {
            return e ? 9 == e.nodeType ? e : e.ownerDocument : w
        }

        function y(e, n, r) {
            var i = [],
                o = e[n];
            for ("string" != typeof r && r instanceof f && (r = r[0]); o && 9 !== o.nodeType;) {
                if (r !== t) {
                    if (o === r) break;
                    if ("string" == typeof r && f(o).is(r)) break
                }
                1 === o.nodeType && i.push(o), o = o[n]
            }
            return i
        }

        function b(e, n, r, i) {
            var o = [];
            for (i instanceof f && (i = i[0]); e; e = e[n])
                if (!r || e.nodeType === r) {
                    if (i !== t) {
                        if (e === i) break;
                        if ("string" == typeof i && f(e).is(i)) break
                    }
                    o.push(e)
                }
            return o
        }

        function x(e, t, n) {
            for (e = e[t]; e; e = e[t])
                if (e.nodeType == n) return e;
            return null
        }

        function C(e, t, n) {
            m(n, function(n, r) {
                e[n] = e[n] || {}, e[n][t] = r
            })
        }
        var w = document,
            _ = Array.prototype.push,
            E = Array.prototype.slice,
            N = /^(?:[^#<]*(<[\w\W]+>)[^>]*$|#([\w\-]*)$)/,
            S = e.Event,
            k, T = r.makeMap("fillOpacity fontWeight lineHeight opacity orphans widows zIndex zoom", " "),
            R = r.makeMap("checked compact declare defer disabled ismap multiple nohref noshade nowrap readonly selected", " "),
            A = {
                "for": "htmlFor",
                "class": "className",
                readonly: "readOnly"
            },
            B = {
                "float": "cssFloat"
            },
            D = {},
            L = {},
            M = /^\s*|\s*$/g;
        return f.fn = f.prototype = {
            constructor: f,
            selector: "",
            context: null,
            length: 0,
            init: function(e, t) {
                var n = this,
                    r, i;
                if (!e) return n;
                if (e.nodeType) return n.context = n[0] = e, n.length = 1, n;
                if (t && t.nodeType) n.context = t;
                else {
                    if (t) return f(e).attr(t);
                    n.context = t = document
                }
                if (a(e)) {
                    if (n.selector = e, r = "<" === e.charAt(0) && ">" === e.charAt(e.length - 1) && e.length >= 3 ? [null, e, null] : N.exec(e), !r) return f(t).find(e);
                    if (r[1])
                        for (i = l(e, v(t)).firstChild; i;) _.call(n, i), i = i.nextSibling;
                    else {
                        if (i = v(t).getElementById(r[2]), !i) return n;
                        if (i.id !== r[2]) return n.find(e);
                        n.length = 1, n[0] = i
                    }
                } else this.add(e, !1);
                return n
            },
            toArray: function() {
                return r.toArray(this)
            },
            add: function(e, t) {
                var n = this,
                    r, i;
                if (a(e)) return n.add(f(e));
                if (t !== !1)
                    for (r = f.unique(n.toArray().concat(f.makeArray(e))), n.length = r.length, i = 0; i < r.length; i++) n[i] = r[i];
                else _.apply(n, f.makeArray(e));
                return n
            },
            attr: function(e, t) {
                var n = this,
                    r;
                if ("object" == typeof e) m(e, function(e, t) {
                    n.attr(e, t)
                });
                else {
                    if (!o(t)) {
                        if (n[0] && 1 === n[0].nodeType) {
                            if (r = D[e], r && r.get) return r.get(n[0], e);
                            if (R[e]) return n.prop(e) ? e : k;
                            t = n[0].getAttribute(e, 2), null === t && (t = k)
                        }
                        return t
                    }
                    this.each(function() {
                        var n;
                        if (1 === this.nodeType) {
                            if (n = D[e], n && n.set) return void n.set(this, t);
                            null === t ? this.removeAttribute(e, 2) : this.setAttribute(e, t, 2)
                        }
                    })
                }
                return n
            },
            removeAttr: function(e) {
                return this.attr(e, null)
            },
            prop: function(e, t) {
                var n = this;
                if (e = A[e] || e, "object" == typeof e) m(e, function(e, t) {
                    n.prop(e, t)
                });
                else {
                    if (!o(t)) return n[0] && n[0].nodeType && e in n[0] ? n[0][e] : t;
                    this.each(function() {
                        1 == this.nodeType && (this[e] = t)
                    })
                }
                return n
            },
            css: function(e, t) {
                function n(e) {
                    return e.replace(/-(\D)/g, function(e, t) {
                        return t.toUpperCase()
                    })
                }

                function r(e) {
                    return e.replace(/[A-Z]/g, function(e) {
                        return "-" + e
                    })
                }
                var i = this,
                    a, s;
                if ("object" == typeof e) m(e, function(e, t) {
                    i.css(e, t)
                });
                else if (o(t)) e = n(e), "number" != typeof t || T[e] || (t += "px"), i.each(function() {
                    var n = this.style;
                    if (s = L[e], s && s.set) return void s.set(this, t);
                    try {
                        this.style[B[e] || e] = t
                    } catch (i) {}(null === t || "" === t) && (n.removeProperty ? n.removeProperty(r(e)) : n.removeAttribute(e))
                });
                else {
                    if (a = i[0], s = L[e], s && s.get) return s.get(a);
                    if (a.ownerDocument.defaultView) try {
                        return a.ownerDocument.defaultView.getComputedStyle(a, null).getPropertyValue(r(e))
                    } catch (l) {
                        return k
                    } else if (a.currentStyle) return a.currentStyle[n(e)]
                }
                return i
            },
            remove: function() {
                for (var e = this, t, n = this.length; n--;) t = e[n], S.clean(t), t.parentNode && t.parentNode.removeChild(t);
                return this
            },
            empty: function() {
                for (var e = this, t, n = this.length; n--;)
                    for (t = e[n]; t.firstChild;) t.removeChild(t.firstChild);
                return this
            },
            html: function(e) {
                var t = this,
                    n;
                if (o(e)) {
                    n = t.length;
                    try {
                        for (; n--;) t[n].innerHTML = e
                    } catch (r) {
                        f(t[n]).empty().append(e)
                    }
                    return t
                }
                return t[0] ? t[0].innerHTML : ""
            },
            text: function(e) {
                var t = this,
                    n;
                if (o(e)) {
                    for (n = t.length; n--;) "innerText" in t[n] ? t[n].innerText = e : t[0].textContent = e;
                    return t
                }
                return t[0] ? t[0].innerText || t[0].textContent : ""
            },
            append: function() {
                return c(this, arguments, function(e) {
                    1 === this.nodeType && this.appendChild(e)
                })
            },
            prepend: function() {
                return c(this, arguments, function(e) {
                    1 === this.nodeType && this.insertBefore(e, this.firstChild)
                }, !0)
            },
            before: function() {
                var e = this;
                return e[0] && e[0].parentNode ? c(e, arguments, function(e) {
                    this.parentNode.insertBefore(e, this)
                }) : e
            },
            after: function() {
                var e = this;
                return e[0] && e[0].parentNode ? c(e, arguments, function(e) {
                    this.parentNode.insertBefore(e, this.nextSibling)
                }, !0) : e
            },
            appendTo: function(e) {
                return f(e).append(this), this
            },
            prependTo: function(e) {
                return f(e).prepend(this), this
            },
            replaceWith: function(e) {
                return this.before(e).remove()
            },
            wrap: function(e) {
                return d(this, e)
            },
            wrapAll: function(e) {
                return d(this, e, !0)
            },
            wrapInner: function(e) {
                return this.each(function() {
                    f(this).contents().wrapAll(e)
                }), this
            },
            unwrap: function() {
                return this.parent().each(function() {
                    f(this).replaceWith(this.childNodes)
                })
            },
            clone: function() {
                var e = [];
                return this.each(function() {
                    e.push(this.cloneNode(!0))
                }), f(e)
            },
            addClass: function(e) {
                return this.toggleClass(e, !0)
            },
            removeClass: function(e) {
                return this.toggleClass(e, !1)
            },
            toggleClass: function(e, t) {
                var n = this;
                return "string" != typeof e ? n : (-1 !== e.indexOf(" ") ? m(e.split(" "), function() {
                    n.toggleClass(this, t)
                }) : n.each(function(n, r) {
                    var i, o;
                    o = u(r, e), o !== t && (i = r.className, o ? r.className = p((" " + i + " ").replace(" " + e + " ", " ")) : r.className += i ? " " + e : e)
                }), n)
            },
            hasClass: function(e) {
                return u(this[0], e)
            },
            each: function(e) {
                return m(this, e)
            },
            on: function(e, t) {
                return this.each(function() {
                    S.bind(this, e, t)
                })
            },
            off: function(e, t) {
                return this.each(function() {
                    S.unbind(this, e, t)
                })
            },
            trigger: function(e) {
                return this.each(function() {
                    "object" == typeof e ? S.fire(this, e.type, e) : S.fire(this, e)
                })
            },
            show: function() {
                return this.css("display", "")
            },
            hide: function() {
                return this.css("display", "none")
            },
            slice: function() {
                return new f(E.apply(this, arguments))
            },
            eq: function(e) {
                return -1 === e ? this.slice(e) : this.slice(e, +e + 1)
            },
            first: function() {
                return this.eq(0)
            },
            last: function() {
                return this.eq(-1)
            },
            find: function(e) {
                var t, n, r = [];
                for (t = 0, n = this.length; n > t; t++) f.find(e, this[t], r);
                return f(r)
            },
            filter: function(e) {
                return f("function" == typeof e ? g(this.toArray(), function(t, n) {
                    return e(n, t)
                }) : f.filter(e, this.toArray()))
            },
            closest: function(e) {
                var t = [];
                return e instanceof f && (e = e[0]), this.each(function(n, r) {
                    for (; r;) {
                        if ("string" == typeof e && f(r).is(e)) {
                            t.push(r);
                            break
                        }
                        if (r == e) {
                            t.push(r);
                            break
                        }
                        r = r.parentNode
                    }
                }), f(t)
            },
            offset: function(e) {
                var t, n, r, i = 0,
                    o = 0,
                    a;
                return e ? this.css(e) : (t = this[0], t && (n = t.ownerDocument, r = n.documentElement, t.getBoundingClientRect && (a = t.getBoundingClientRect(), i = a.left + (r.scrollLeft || n.body.scrollLeft) - r.clientLeft, o = a.top + (r.scrollTop || n.body.scrollTop) - r.clientTop)), {
                    left: i,
                    top: o
                })
            },
            push: _,
            sort: [].sort,
            splice: [].splice
        }, r.extend(f, {
            extend: r.extend,
            makeArray: function(e) {
                return s(e) || e.nodeType ? [e] : r.toArray(e)
            },
            inArray: h,
            isArray: r.isArray,
            each: m,
            trim: p,
            grep: g,
            find: n,
            expr: n.selectors,
            unique: n.uniqueSort,
            text: n.getText,
            contains: n.contains,
            filter: function(e, t, n) {
                var r = t.length;
                for (n && (e = ":not(" + e + ")"); r--;) 1 != t[r].nodeType && t.splice(r, 1);
                return t = 1 === t.length ? f.find.matchesSelector(t[0], e) ? [t[0]] : [] : f.find.matches(e, t)
            }
        }), m({
            parent: function(e) {
                var t = e.parentNode;
                return t && 11 !== t.nodeType ? t : null
            },
            parents: function(e) {
                return y(e, "parentNode")
            },
            next: function(e) {
                return x(e, "nextSibling", 1)
            },
            prev: function(e) {
                return x(e, "previousSibling", 1)
            },
            children: function(e) {
                return b(e.firstChild, "nextSibling", 1)
            },
            contents: function(e) {
                return r.toArray(("iframe" === e.nodeName ? e.contentDocument || e.contentWindow.document : e).childNodes)
            }
        }, function(e, t) {
            f.fn[e] = function(n) {
                var r = this,
                    i = [];
                return r.each(function() {
                    var e = t.call(i, this, n, i);
                    e && (f.isArray(e) ? i.push.apply(i, e) : i.push(e))
                }), this.length > 1 && (i = f.unique(i), 0 === e.indexOf("parents") && (i = i.reverse())), i = f(i), n ? i.filter(n) : i
            }
        }), m({
            parentsUntil: function(e, t) {
                return y(e, "parentNode", t)
            },
            nextUntil: function(e, t) {
                return b(e, "nextSibling", 1, t).slice(1)
            },
            prevUntil: function(e, t) {
                return b(e, "previousSibling", 1, t).slice(1)
            }
        }, function(e, t) {
            f.fn[e] = function(n, r) {
                var i = this,
                    o = [];
                return i.each(function() {
                    var e = t.call(o, this, n, o);
                    e && (f.isArray(e) ? o.push.apply(o, e) : o.push(e))
                }), this.length > 1 && (o = f.unique(o), (0 === e.indexOf("parents") || "prevUntil" === e) && (o = o.reverse())), o = f(o), r ? o.filter(r) : o
            }
        }), f.fn.is = function(e) {
            return !!e && this.filter(e).length > 0
        }, f.fn.init.prototype = f.fn, f.overrideDefaults = function(e) {
            function t(r, i) {
                return n = n || e(), 0 === arguments.length && (r = n.element), i || (i = n.context), new t.fn.init(r, i)
            }
            var n;
            return f.extend(t, this), t
        }, i.ie && i.ie < 8 && (C(D, "get", {
            maxlength: function(e) {
                var t = e.maxLength;
                return 2147483647 === t ? k : t
            },
            size: function(e) {
                var t = e.size;
                return 20 === t ? k : t
            },
            "class": function(e) {
                return e.className
            },
            style: function(e) {
                var t = e.style.cssText;
                return 0 === t.length ? k : t
            }
        }), C(D, "set", {
            "class": function(e, t) {
                e.className = t
            },
            style: function(e, t) {
                e.style.cssText = t
            }
        })), i.ie && i.ie < 9 && (B["float"] = "styleFloat", C(L, "set", {
            opacity: function(e, t) {
                var n = e.style;
                null === t || "" === t ? n.removeAttribute("filter") : (n.zoom = 1, n.filter = "alpha(opacity=" + 100 * t + ")")
            }
        })), f.attrHooks = D, f.cssHooks = L, f
    }), r(h, [], function() {
        return function(e, t) {
            function n(e, t, n, r) {
                function i(e) {
                    return e = parseInt(e, 10).toString(16), e.length > 1 ? e : "0" + e
                }
                return "#" + i(t) + i(n) + i(r)
            }
            var r = /rgb\s*\(\s*([0-9]+)\s*,\s*([0-9]+)\s*,\s*([0-9]+)\s*\)/gi,
                i = /(?:url(?:(?:\(\s*\"([^\"]+)\"\s*\))|(?:\(\s*\'([^\']+)\'\s*\))|(?:\(\s*([^)\s]+)\s*\))))|(?:\'([^\']+)\')|(?:\"([^\"]+)\")/gi,
                o = /\s*([^:]+):\s*([^;]+);?/g,
                a = /\s+$/,
                s, l, c = {},
                u, d, f, h = "\ufeff";
            for (e = e || {}, t && (d = t.getValidStyles(), f = t.getInvalidStyles()), u = ("\\\" \\' \\; \\: ; : " + h).split(" "), l = 0; l < u.length; l++) c[u[l]] = h + l, c[h + l] = u[l];
            return {
                toHex: function(e) {
                    return e.replace(r, n)
                },
                parse: function(t) {
                    function s(e, t, n) {
                        var r, i, o, a;
                        if (r = m[e + "-top" + t], r && (i = m[e + "-right" + t], i && (o = m[e + "-bottom" + t], o && (a = m[e + "-left" + t])))) {
                            var s = [r, i, o, a];
                            for (l = s.length - 1; l-- && s[l] === s[l + 1];);
                            l > -1 && n || (m[e + t] = -1 == l ? s[0] : s.join(" "), delete m[e + "-top" + t], delete m[e + "-right" + t], delete m[e + "-bottom" + t], delete m[e + "-left" + t])
                        }
                    }

                    function u(e) {
                        var t = m[e],
                            n;
                        if (t) {
                            for (t = t.split(" "), n = t.length; n--;)
                                if (t[n] !== t[0]) return !1;
                            return m[e] = t[0], !0
                        }
                    }

                    function d(e, t, n, r) {
                        u(t) && u(n) && u(r) && (m[e] = m[t] + " " + m[n] + " " + m[r], delete m[t], delete m[n], delete m[r])
                    }

                    function f(e) {
                        return b = !0, c[e]
                    }

                    function h(e, t) {
                        return b && (e = e.replace(/\uFEFF[0-9]/g, function(e) {
                            return c[e]
                        })), t || (e = e.replace(/\\([\'\";:])/g, "$1")), e
                    }

                    function p(t, n, r, i, o, a) {
                        if (o = o || a) return o = h(o), "'" + o.replace(/\'/g, "\\'") + "'";
                        if (n = h(n || r || i), !e.allow_script_urls) {
                            var s = n.replace(/[\s\r\n]+/, "");
                            if (/(java|vb)script:/i.test(s)) return "";
                            if (!e.allow_svg_data_urls && /^data:image\/svg/i.test(s)) return ""
                        }
                        return x && (n = x.call(C, n, "style")), "url('" + n.replace(/\'/g, "\\'") + "')"
                    }
                    var m = {},
                        g, v, y, b, x = e.url_converter,
                        C = e.url_converter_scope || this;
                    if (t) {
                        for (t = t.replace(/[\u0000-\u001F]/g, ""), t = t.replace(/\\[\"\';:\uFEFF]/g, f).replace(/\"[^\"]+\"|\'[^\']+\'/g, function(e) {
                            return e.replace(/[;:]/g, f)
                        }); g = o.exec(t);) {
                            if (v = g[1].replace(a, "").toLowerCase(), y = g[2].replace(a, ""), y = y.replace(/\\[0-9a-f]+/g, function(e) {
                                    return String.fromCharCode(parseInt(e.substr(1), 16))
                                }), v && y.length > 0) {
                                if (!e.allow_script_urls && ("behavior" == v || /expression\s*\(|\/\*|\*\//.test(y))) continue;
                                "font-weight" === v && "700" === y ? y = "bold" : ("color" === v || "background-color" === v) && (y = y.toLowerCase()), y = y.replace(r, n), y = y.replace(i, p), m[v] = b ? h(y, !0) : y
                            }
                            o.lastIndex = g.index + g[0].length
                        }
                        s("border", "", !0), s("border", "-width"), s("border", "-color"), s("border", "-style"), s("padding", ""), s("margin", ""), d("border", "border-width", "border-style", "border-color"), "medium none" === m.border && delete m.border, "none" === m["border-image"] && delete m["border-image"]
                    }
                    return m
                },
                serialize: function(e, t) {
                    function n(t) {
                        var n, r, o, a;
                        if (n = d[t])
                            for (r = 0, o = n.length; o > r; r++) t = n[r], a = e[t], a !== s && a.length > 0 && (i += (i.length > 0 ? " " : "") + t + ": " + a + ";")
                    }

                    function r(e, t) {
                        var n;
                        return n = f["*"], n && n[e] ? !1 : (n = f[t], n && n[e] ? !1 : !0)
                    }
                    var i = "",
                        o, a;
                    if (t && d) n("*"), n(t);
                    else
                        for (o in e) a = e[o], a !== s && a.length > 0 && (!f || r(o, t)) && (i += (i.length > 0 ? " " : "") + o + ": " + a + ";");
                    return i
                }
            }
        }
    }), r(p, [], function() {
        return function(e, t) {
            function n(e, n, r, i) {
                var o, a;
                if (e) {
                    if (!i && e[n]) return e[n];
                    if (e != t) {
                        if (o = e[r]) return o;
                        for (a = e.parentNode; a && a != t; a = a.parentNode)
                            if (o = a[r]) return o
                    }
                }
            }
            var r = e;
            this.current = function() {
                return r
            }, this.next = function(e) {
                return r = n(r, "firstChild", "nextSibling", e)
            }, this.prev = function(e) {
                return r = n(r, "lastChild", "previousSibling", e)
            }
        }
    }), r(m, [d], function(e) {
        function t(n) {
            function r() {
                return H.createDocumentFragment()
            }

            function i(e, t) {
                _(F, e, t)
            }

            function o(e, t) {
                _(z, e, t)
            }

            function a(e) {
                i(e.parentNode, j(e))
            }

            function s(e) {
                i(e.parentNode, j(e) + 1)
            }

            function l(e) {
                o(e.parentNode, j(e))
            }

            function c(e) {
                o(e.parentNode, j(e) + 1)
            }

            function u(e) {
                e ? (M[U] = M[V], M[$] = M[W]) : (M[V] = M[U], M[W] = M[$]), M.collapsed = F
            }

            function d(e) {
                a(e), c(e)
            }

            function f(e) {
                i(e, 0), o(e, 1 === e.nodeType ? e.childNodes.length : e.nodeValue.length)
            }

            function h(e, t) {
                var n = M[V],
                    r = M[W],
                    i = M[U],
                    o = M[$],
                    a = t.startContainer,
                    s = t.startOffset,
                    l = t.endContainer,
                    c = t.endOffset;
                return 0 === e ? w(n, r, a, s) : 1 === e ? w(i, o, a, s) : 2 === e ? w(i, o, l, c) : 3 === e ? w(n, r, l, c) : void 0
            }

            function p() {
                E(I)
            }

            function m() {
                return E(P)
            }

            function g() {
                return E(O)
            }

            function v(e) {
                var t = this[V],
                    r = this[W],
                    i, o;
                3 !== t.nodeType && 4 !== t.nodeType || !t.nodeValue ? (t.childNodes.length > 0 && (o = t.childNodes[r]), o ? t.insertBefore(e, o) : 3 == t.nodeType ? n.insertAfter(e, t) : t.appendChild(e)) : r ? r >= t.nodeValue.length ? n.insertAfter(e, t) : (i = t.splitText(r), t.parentNode.insertBefore(e, i)) : t.parentNode.insertBefore(e, t)
            }

            function y(e) {
                var t = M.extractContents();
                M.insertNode(e), e.appendChild(t), M.selectNode(e)
            }

            function b() {
                return q(new t(n), {
                    startContainer: M[V],
                    startOffset: M[W],
                    endContainer: M[U],
                    endOffset: M[$],
                    collapsed: M.collapsed,
                    commonAncestorContainer: M.commonAncestorContainer
                })
            }

            function x(e, t) {
                var n;
                if (3 == e.nodeType) return e;
                if (0 > t) return e;
                for (n = e.firstChild; n && t > 0;) --t, n = n.nextSibling;
                return n ? n : e
            }

            function C() {
                return M[V] == M[U] && M[W] == M[$]
            }

            function w(e, t, r, i) {
                var o, a, s, l, c, u;
                if (e == r) return t == i ? 0 : i > t ? -1 : 1;
                for (o = r; o && o.parentNode != e;) o = o.parentNode;
                if (o) {
                    for (a = 0, s = e.firstChild; s != o && t > a;) a++, s = s.nextSibling;
                    return a >= t ? -1 : 1
                }
                for (o = e; o && o.parentNode != r;) o = o.parentNode;
                if (o) {
                    for (a = 0, s = r.firstChild; s != o && i > a;) a++, s = s.nextSibling;
                    return i > a ? -1 : 1
                }
                for (l = n.findCommonAncestor(e, r), c = e; c && c.parentNode != l;) c = c.parentNode;
                for (c || (c = l), u = r; u && u.parentNode != l;) u = u.parentNode;
                if (u || (u = l), c == u) return 0;
                for (s = l.firstChild; s;) {
                    if (s == c) return -1;
                    if (s == u) return 1;
                    s = s.nextSibling
                }
            }

            function _(e, t, r) {
                var i, o;
                for (e ? (M[V] = t, M[W] = r) : (M[U] = t, M[$] = r), i = M[U]; i.parentNode;) i = i.parentNode;
                for (o = M[V]; o.parentNode;) o = o.parentNode;
                o == i ? w(M[V], M[W], M[U], M[$]) > 0 && M.collapse(e) : M.collapse(e), M.collapsed = C(), M.commonAncestorContainer = n.findCommonAncestor(M[V], M[U])
            }

            function E(e) {
                var t, n = 0,
                    r = 0,
                    i, o, a, s, l, c;
                if (M[V] == M[U]) return N(e);
                for (t = M[U], i = t.parentNode; i; t = i, i = i.parentNode) {
                    if (i == M[V]) return S(t, e);
                    ++n
                }
                for (t = M[V], i = t.parentNode; i; t = i, i = i.parentNode) {
                    if (i == M[U]) return k(t, e);
                    ++r
                }
                for (o = r - n, a = M[V]; o > 0;) a = a.parentNode, o--;
                for (s = M[U]; 0 > o;) s = s.parentNode, o++;
                for (l = a.parentNode, c = s.parentNode; l != c; l = l.parentNode, c = c.parentNode) a = l, s = c;
                return T(a, s, e)
            }

            function N(e) {
                var t, n, i, o, a, s, l, c, u;
                if (e != I && (t = r()), M[W] == M[$]) return t;
                if (3 == M[V].nodeType) {
                    if (n = M[V].nodeValue, i = n.substring(M[W], M[$]), e != O && (o = M[V], c = M[W], u = M[$] - M[W], 0 === c && u >= o.nodeValue.length - 1 ? o.parentNode.removeChild(o) : o.deleteData(c, u), M.collapse(F)), e == I) return;
                    return i.length > 0 && t.appendChild(H.createTextNode(i)), t
                }
                for (o = x(M[V], M[W]), a = M[$] - M[W]; o && a > 0;) s = o.nextSibling, l = D(o, e), t && t.appendChild(l), --a, o = s;
                return e != O && M.collapse(F), t
            }

            function S(e, t) {
                var n, i, o, a, s, l;
                if (t != I && (n = r()), i = R(e, t), n && n.appendChild(i), o = j(e), a = o - M[W], 0 >= a) return t != O && (M.setEndBefore(e), M.collapse(z)), n;
                for (i = e.previousSibling; a > 0;) s = i.previousSibling, l = D(i, t), n && n.insertBefore(l, n.firstChild), --a, i = s;
                return t != O && (M.setEndBefore(e), M.collapse(z)), n
            }

            function k(e, t) {
                var n, i, o, a, s, l;
                for (t != I && (n = r()), o = A(e, t), n && n.appendChild(o), i = j(e), ++i, a = M[$] - i, o = e.nextSibling; o && a > 0;) s = o.nextSibling, l = D(o, t), n && n.appendChild(l), --a, o = s;
                return t != O && (M.setStartAfter(e), M.collapse(F)), n
            }

            function T(e, t, n) {
                var i, o, a, s, l, c, u;
                for (n != I && (o = r()), i = A(e, n), o && o.appendChild(i), a = j(e), s = j(t), ++a, l = s - a, c = e.nextSibling; l > 0;) u = c.nextSibling, i = D(c, n), o && o.appendChild(i), c = u, --l;
                return i = R(t, n), o && o.appendChild(i), n != O && (M.setStartAfter(e), M.collapse(F)), o
            }

            function R(e, t) {
                var n = x(M[U], M[$] - 1),
                    r, i, o, a, s, l = n != M[U];
                if (n == e) return B(n, l, z, t);
                for (r = n.parentNode, i = B(r, z, z, t); r;) {
                    for (; n;) o = n.previousSibling, a = B(n, l, z, t), t != I && i.insertBefore(a, i.firstChild), l = F, n = o;
                    if (r == e) return i;
                    n = r.previousSibling, r = r.parentNode, s = B(r, z, z, t), t != I && s.appendChild(i), i = s
                }
            }

            function A(e, t) {
                var n = x(M[V], M[W]),
                    r = n != M[V],
                    i, o, a, s, l;
                if (n == e) return B(n, r, F, t);
                for (i = n.parentNode, o = B(i, z, F, t); i;) {
                    for (; n;) a = n.nextSibling, s = B(n, r, F, t), t != I && o.appendChild(s), r = F, n = a;
                    if (i == e) return o;
                    n = i.nextSibling, i = i.parentNode, l = B(i, z, F, t), t != I && l.appendChild(o), o = l
                }
            }

            function B(e, t, r, i) {
                var o, a, s, l, c;
                if (t) return D(e, i);
                if (3 == e.nodeType) {
                    if (o = e.nodeValue, r ? (l = M[W], a = o.substring(l), s = o.substring(0, l)) : (l = M[$], a = o.substring(0, l), s = o.substring(l)), i != O && (e.nodeValue = s), i == I) return;
                    return c = n.clone(e, z), c.nodeValue = a, c
                }
                if (i != I) return n.clone(e, z)
            }

            function D(e, t) {
                return t != I ? t == O ? n.clone(e, F) : e : void e.parentNode.removeChild(e)
            }

            function L() {
                return n.create("body", null, g()).outerText
            }
            var M = this,
                H = n.doc,
                P = 0,
                O = 1,
                I = 2,
                F = !0,
                z = !1,
                W = "startOffset",
                V = "startContainer",
                U = "endContainer",
                $ = "endOffset",
                q = e.extend,
                j = n.nodeIndex;
            return q(M, {
                startContainer: H,
                startOffset: 0,
                endContainer: H,
                endOffset: 0,
                collapsed: F,
                commonAncestorContainer: H,
                START_TO_START: 0,
                START_TO_END: 1,
                END_TO_END: 2,
                END_TO_START: 3,
                setStart: i,
                setEnd: o,
                setStartBefore: a,
                setStartAfter: s,
                setEndBefore: l,
                setEndAfter: c,
                collapse: u,
                selectNode: d,
                selectNodeContents: f,
                compareBoundaryPoints: h,
                deleteContents: p,
                extractContents: m,
                cloneContents: g,
                insertNode: v,
                surroundContents: y,
                cloneRange: b,
                toStringIE: L
            }), M
        }
        return t.prototype.toString = function() {
            return this.toStringIE()
        }, t
    }), r(g, [d], function(e) {
        function t(e) {
            var t;
            return t = document.createElement("div"), t.innerHTML = e, t.textContent || t.innerText || e
        }

        function n(e, t) {
            var n, r, i, a = {};
            if (e) {
                for (e = e.split(","), t = t || 10, n = 0; n < e.length; n += 2) r = String.fromCharCode(parseInt(e[n], t)), o[r] || (i = "&" + e[n + 1] + ";", a[r] = i, a[i] = r);
                return a
            }
        }
        var r = e.makeMap,
            i, o, a, s = /[&<>\"\u0060\u007E-\uD7FF\uE000-\uFFEF]|[\uD800-\uDBFF][\uDC00-\uDFFF]/g,
            l = /[<>&\u007E-\uD7FF\uE000-\uFFEF]|[\uD800-\uDBFF][\uDC00-\uDFFF]/g,
            c = /[<>&\"\']/g,
            u = /&#([a-z0-9]+);?|&([a-z0-9]+);/gi,
            d = {
                128: "\u20ac",
                130: "\u201a",
                131: "\u0192",
                132: "\u201e",
                133: "\u2026",
                134: "\u2020",
                135: "\u2021",
                136: "\u02c6",
                137: "\u2030",
                138: "\u0160",
                139: "\u2039",
                140: "\u0152",
                142: "\u017d",
                145: "\u2018",
                146: "\u2019",
                147: "\u201c",
                148: "\u201d",
                149: "\u2022",
                150: "\u2013",
                151: "\u2014",
                152: "\u02dc",
                153: "\u2122",
                154: "\u0161",
                155: "\u203a",
                156: "\u0153",
                158: "\u017e",
                159: "\u0178"
            };
        o = {
            '"': "&quot;",
            "'": "&#39;",
            "<": "&lt;",
            ">": "&gt;",
            "&": "&amp;",
            "`": "&#96;"
        }, a = {
            "&lt;": "<",
            "&gt;": ">",
            "&amp;": "&",
            "&quot;": '"',
            "&apos;": "'"
        }, i = n("50,nbsp,51,iexcl,52,cent,53,pound,54,curren,55,yen,56,brvbar,57,sect,58,uml,59,copy,5a,ordf,5b,laquo,5c,not,5d,shy,5e,reg,5f,macr,5g,deg,5h,plusmn,5i,sup2,5j,sup3,5k,acute,5l,micro,5m,para,5n,middot,5o,cedil,5p,sup1,5q,ordm,5r,raquo,5s,frac14,5t,frac12,5u,frac34,5v,iquest,60,Agrave,61,Aacute,62,Acirc,63,Atilde,64,Auml,65,Aring,66,AElig,67,Ccedil,68,Egrave,69,Eacute,6a,Ecirc,6b,Euml,6c,Igrave,6d,Iacute,6e,Icirc,6f,Iuml,6g,ETH,6h,Ntilde,6i,Ograve,6j,Oacute,6k,Ocirc,6l,Otilde,6m,Ouml,6n,times,6o,Oslash,6p,Ugrave,6q,Uacute,6r,Ucirc,6s,Uuml,6t,Yacute,6u,THORN,6v,szlig,70,agrave,71,aacute,72,acirc,73,atilde,74,auml,75,aring,76,aelig,77,ccedil,78,egrave,79,eacute,7a,ecirc,7b,euml,7c,igrave,7d,iacute,7e,icirc,7f,iuml,7g,eth,7h,ntilde,7i,ograve,7j,oacute,7k,ocirc,7l,otilde,7m,ouml,7n,divide,7o,oslash,7p,ugrave,7q,uacute,7r,ucirc,7s,uuml,7t,yacute,7u,thorn,7v,yuml,ci,fnof,sh,Alpha,si,Beta,sj,Gamma,sk,Delta,sl,Epsilon,sm,Zeta,sn,Eta,so,Theta,sp,Iota,sq,Kappa,sr,Lambda,ss,Mu,st,Nu,su,Xi,sv,Omicron,t0,Pi,t1,Rho,t3,Sigma,t4,Tau,t5,Upsilon,t6,Phi,t7,Chi,t8,Psi,t9,Omega,th,alpha,ti,beta,tj,gamma,tk,delta,tl,epsilon,tm,zeta,tn,eta,to,theta,tp,iota,tq,kappa,tr,lambda,ts,mu,tt,nu,tu,xi,tv,omicron,u0,pi,u1,rho,u2,sigmaf,u3,sigma,u4,tau,u5,upsilon,u6,phi,u7,chi,u8,psi,u9,omega,uh,thetasym,ui,upsih,um,piv,812,bull,816,hellip,81i,prime,81j,Prime,81u,oline,824,frasl,88o,weierp,88h,image,88s,real,892,trade,89l,alefsym,8cg,larr,8ch,uarr,8ci,rarr,8cj,darr,8ck,harr,8dl,crarr,8eg,lArr,8eh,uArr,8ei,rArr,8ej,dArr,8ek,hArr,8g0,forall,8g2,part,8g3,exist,8g5,empty,8g7,nabla,8g8,isin,8g9,notin,8gb,ni,8gf,prod,8gh,sum,8gi,minus,8gn,lowast,8gq,radic,8gt,prop,8gu,infin,8h0,ang,8h7,and,8h8,or,8h9,cap,8ha,cup,8hb,int,8hk,there4,8hs,sim,8i5,cong,8i8,asymp,8j0,ne,8j1,equiv,8j4,le,8j5,ge,8k2,sub,8k3,sup,8k4,nsub,8k6,sube,8k7,supe,8kl,oplus,8kn,otimes,8l5,perp,8m5,sdot,8o8,lceil,8o9,rceil,8oa,lfloor,8ob,rfloor,8p9,lang,8pa,rang,9ea,loz,9j0,spades,9j3,clubs,9j5,hearts,9j6,diams,ai,OElig,aj,oelig,b0,Scaron,b1,scaron,bo,Yuml,m6,circ,ms,tilde,802,ensp,803,emsp,809,thinsp,80c,zwnj,80d,zwj,80e,lrm,80f,rlm,80j,ndash,80k,mdash,80o,lsquo,80p,rsquo,80q,sbquo,80s,ldquo,80t,rdquo,80u,bdquo,810,dagger,811,Dagger,81g,permil,81p,lsaquo,81q,rsaquo,85c,euro", 32);
        var f = {
            encodeRaw: function(e, t) {
                return e.replace(t ? s : l, function(e) {
                    return o[e] || e
                })
            },
            encodeAllRaw: function(e) {
                return ("" + e).replace(c, function(e) {
                    return o[e] || e
                })
            },
            encodeNumeric: function(e, t) {
                return e.replace(t ? s : l, function(e) {
                    return e.length > 1 ? "&#" + (1024 * (e.charCodeAt(0) - 55296) + (e.charCodeAt(1) - 56320) + 65536) + ";" : o[e] || "&#" + e.charCodeAt(0) + ";"
                })
            },
            encodeNamed: function(e, t, n) {
                return n = n || i, e.replace(t ? s : l, function(e) {
                    return o[e] || n[e] || e
                })
            },
            getEncodeFunc: function(e, t) {
                function a(e, n) {
                    return e.replace(n ? s : l, function(e) {
                        return o[e] || t[e] || "&#" + e.charCodeAt(0) + ";" || e
                    })
                }

                function c(e, n) {
                    return f.encodeNamed(e, n, t)
                }
                return t = n(t) || i, e = r(e.replace(/\+/g, ",")), e.named && e.numeric ? a : e.named ? t ? c : f.encodeNamed : e.numeric ? f.encodeNumeric : f.encodeRaw
            },
            decode: function(e) {
                return e.replace(u, function(e, n) {
                    return n ? (n = "x" === n.charAt(0).toLowerCase() ? parseInt(n.substr(1), 16) : parseInt(n, 10), n > 65535 ? (n -= 65536, String.fromCharCode(55296 + (n >> 10), 56320 + (1023 & n))) : d[n] || String.fromCharCode(n)) : a[e] || i[e] || t(e)
                })
            }
        };
        return f
    }), r(v, [d], function(e) {
        return function(t, n) {
            function r(e) {
                t.getElementsByTagName("head")[0].appendChild(e)
            }

            function i(n, i, l) {
                function c() {
                    for (var e = y.passed, t = e.length; t--;) e[t]();
                    y.status = 2, y.passed = [], y.failed = []
                }

                function u() {
                    for (var e = y.failed, t = e.length; t--;) e[t]();
                    y.status = 3, y.passed = [], y.failed = []
                }

                function d() {
                    var e = navigator.userAgent.match(/WebKit\/(\d*)/);
                    return !!(e && e[1] < 536)
                }

                function f(e, t) {
                    e() || ((new Date).getTime() - v < s ? window.setTimeout(t, 0) : u())
                }

                function h() {
                    f(function() {
                        for (var e = t.styleSheets, n, r = e.length, i; r--;)
                            if (n = e[r], i = n.ownerNode ? n.ownerNode : n.owningElement, i && i.id === m.id) return c(), !0
                    }, h)
                }

                function p() {
                    f(function() {
                        try {
                            var e = g.sheet.cssRules;
                            return c(), !!e
                        } catch (t) {}
                    }, p)
                }
                var m, g, v, y;
                if (n = e._addCacheSuffix(n), a[n] ? y = a[n] : (y = {
                        passed: [],
                        failed: []
                    }, a[n] = y), i && y.passed.push(i), l && y.failed.push(l), 1 != y.status) {
                    if (2 == y.status) return void c();
                    if (3 == y.status) return void u();
                    if (y.status = 1, m = t.createElement("link"), m.rel = "stylesheet", m.type = "text/css", m.id = "u" + o++, m.async = !1, m.defer = !1, v = (new Date).getTime(), "onload" in m && !d()) m.onload = h, m.onerror = u;
                    else {
                        if (navigator.userAgent.indexOf("Firefox") > 0) return g = t.createElement("style"), g.textContent = '@import "' + n + '"', p(), void r(g);
                        h()
                    }
                    r(m), m.href = n
                }
            }
            var o = 0,
                a = {},
                s;
            n = n || {}, s = n.maxLoadTime || 5e3, this.load = i
        }
    }), r(y, [c, f, h, l, p, m, g, u, d, v], function(e, n, r, i, o, a, s, l, c, u) {
        function d(e, t) {
            var n = {},
                r = t.keep_values,
                i;
            return i = {
                set: function(n, r, i) {
                    t.url_converter && (r = t.url_converter.call(t.url_converter_scope || e, r, i, n[0])), n.attr("data-mce-" + i, r).attr(i, r)
                },
                get: function(e, t) {
                    return e.attr("data-mce-" + t) || e.attr(t)
                }
            }, n = {
                style: {
                    set: function(e, t) {
                        return null !== t && "object" == typeof t ? void e.css(t) : (r && e.attr("data-mce-style", t), void e.attr("style", t))
                    },
                    get: function(t) {
                        var n = t.attr("data-mce-style") || t.attr("style");
                        return n = e.serializeStyle(e.parseStyle(n), t[0].nodeName)
                    }
                }
            }, r && (n.href = n.src = i), n
        }

        function f(e, t) {
            var o = this,
                a;
            o.doc = e, o.win = window, o.files = {}, o.counter = 0, o.stdMode = !v || e.documentMode >= 8, o.boxModel = !v || "CSS1Compat" == e.compatMode || o.stdMode, o.styleSheetLoader = new u(e), o.boundEvents = [], o.settings = t = t || {}, o.schema = t.schema, o.styles = new r({
                url_converter: t.url_converter,
                url_converter_scope: t.url_converter_scope
            }, t.schema), o.fixDoc(e), o.events = t.ownEvents ? new i(t.proxy) : i.Event, o.attrHooks = d(o, t), a = t.schema ? t.schema.getBlockElements() : {}, o.$ = n.overrideDefaults(function() {
                return {
                    context: e,
                    element: o.getRoot()
                }
            }), o.isBlock = function(e) {
                if (!e) return !1;
                var t = e.nodeType;
                return t ? !(1 !== t || !a[e.nodeName]) : !!a[e]
            }
        }
        var h = c.each,
            p = c.is,
            m = c.grep,
            g = c.trim,
            v = l.ie,
            y = /^([a-z0-9],?)+$/i,
            b = /^[ \t\r\n]*$/;
        return f.prototype = {
            $$: function(e) {
                return "string" == typeof e && (e = this.get(e)), this.$(e)
            },
            root: null,
            fixDoc: function(e) {
                var t = this.settings,
                    n;
                if (v && t.schema) {
                    "abbr article aside audio canvas details figcaption figure footer header hgroup mark menu meter nav output progress section summary time video".replace(/\w+/g, function(t) {
                        e.createElement(t)
                    });
                    for (n in t.schema.getCustomElements()) e.createElement(n)
                }
            },
            clone: function(e, t) {
                var n = this,
                    r, i;
                return !v || 1 !== e.nodeType || t ? e.cloneNode(t) : (i = n.doc, t ? r.firstChild : (r = i.createElement(e.nodeName), h(n.getAttribs(e), function(t) {
                    n.setAttrib(r, t.nodeName, n.getAttrib(e, t.nodeName))
                }), r))
            },
            getRoot: function() {
                var e = this;
                return e.settings.root_element || e.doc.body
            },
            getViewPort: function(e) {
                var t, n;
                return e = e ? e : this.win, t = e.document, n = this.boxModel ? t.documentElement : t.body, {
                    x: e.pageXOffset || n.scrollLeft,
                    y: e.pageYOffset || n.scrollTop,
                    w: e.innerWidth || n.clientWidth,
                    h: e.innerHeight || n.clientHeight
                }
            },
            getRect: function(e) {
                var t = this,
                    n, r;
                return e = t.get(e), n = t.getPos(e), r = t.getSize(e), {
                    x: n.x,
                    y: n.y,
                    w: r.w,
                    h: r.h
                }
            },
            getSize: function(e) {
                var t = this,
                    n, r;
                return e = t.get(e), n = t.getStyle(e, "width"), r = t.getStyle(e, "height"), -1 === n.indexOf("px") && (n = 0), -1 === r.indexOf("px") && (r = 0), {
                    w: parseInt(n, 10) || e.offsetWidth || e.clientWidth,
                    h: parseInt(r, 10) || e.offsetHeight || e.clientHeight
                }
            },
            getParent: function(e, t, n) {
                return this.getParents(e, t, n, !1)
            },
            getParents: function(e, n, r, i) {
                var o = this,
                    a, s = [];
                for (e = o.get(e), i = i === t, r = r || ("BODY" != o.getRoot().nodeName ? o.getRoot().parentNode : null), p(n, "string") && (a = n, n = "*" === n ? function(e) {
                    return 1 == e.nodeType
                } : function(e) {
                    return o.is(e, a)
                }); e && e != r && e.nodeType && 9 !== e.nodeType;) {
                    if (!n || n(e)) {
                        if (!i) return e;
                        s.push(e)
                    }
                    e = e.parentNode
                }
                return i ? s : null
            },
            get: function(e) {
                var t;
                return e && this.doc && "string" == typeof e && (t = e, e = this.doc.getElementById(e), e && e.id !== t) ? this.doc.getElementsByName(t)[1] : e
            },
            getNext: function(e, t) {
                return this._findSib(e, t, "nextSibling")
            },
            getPrev: function(e, t) {
                return this._findSib(e, t, "previousSibling")
            },
            select: function(t, n) {
                var r = this;
                return e(t, r.get(n) || r.settings.root_element || r.doc, [])
            },
            is: function(n, r) {
                var i;
                if (n.length === t) {
                    if ("*" === r) return 1 == n.nodeType;
                    if (y.test(r)) {
                        for (r = r.toLowerCase().split(/,/), n = n.nodeName.toLowerCase(), i = r.length - 1; i >= 0; i--)
                            if (r[i] == n) return !0;
                        return !1
                    }
                }
                if (n.nodeType && 1 != n.nodeType) return !1;
                var o = n.nodeType ? [n] : n;
                return e(r, o[0].ownerDocument || o[0], null, o).length > 0
            },
            add: function(e, t, n, r, i) {
                var o = this;
                return this.run(e, function(e) {
                    var a;
                    return a = p(t, "string") ? o.doc.createElement(t) : t, o.setAttribs(a, n), r && (r.nodeType ? a.appendChild(r) : o.setHTML(a, r)), i ? a : e.appendChild(a)
                })
            },
            create: function(e, t, n) {
                return this.add(this.doc.createElement(e), e, t, n, 1)
            },
            createHTML: function(e, t, n) {
                var r = "",
                    i;
                r += "<" + e;
                for (i in t) t.hasOwnProperty(i) && null !== t[i] && "undefined" != typeof t[i] && (r += " " + i + '="' + this.encode(t[i]) + '"');
                return "undefined" != typeof n ? r + ">" + n + "</" + e + ">" : r + " />"
            },
            createFragment: function(e) {
                var t, n, r = this.doc,
                    i;
                for (i = r.createElement("div"), t = r.createDocumentFragment(), e && (i.innerHTML = e); n = i.firstChild;) t.appendChild(n);
                return t
            },
            remove: function(e, t) {
                return e = this.$$(e), t ? e.each(function() {
                    for (var e; e = this.firstChild;) 3 == e.nodeType && 0 === e.data.length ? this.removeChild(e) : this.parentNode.insertBefore(e, this)
                }).remove() : e.remove(), e.length > 1 ? e.toArray() : e[0]
            },
            setStyle: function(e, t, n) {
                e = this.$$(e).css(t, n), this.settings.update_styles && e.attr("data-mce-style", null)
            },
            getStyle: function(e, n, r) {
                return e = this.$$(e), r ? e.css(n) : (n = n.replace(/-(\D)/g, function(e, t) {
                    return t.toUpperCase()
                }), "float" == n && (n = v ? "styleFloat" : "cssFloat"), e[0] && e[0].style ? e[0].style[n] : t)
            },
            setStyles: function(e, t) {
                e = this.$$(e).css(t), this.settings.update_styles && e.attr("data-mce-style", null)
            },
            removeAllAttribs: function(e) {
                return this.run(e, function(e) {
                    var t, n = e.attributes;
                    for (t = n.length - 1; t >= 0; t--) e.removeAttributeNode(n.item(t))
                })
            },
            setAttrib: function(e, t, n) {
                var r = this,
                    i, o, a = r.settings;
                "" === n && (n = null), e = r.$$(e), i = e.attr(t), e.length && (o = r.attrHooks[t], o && o.set ? o.set(e, n, t) : e.attr(t, n), i != n && a.onSetAttrib && a.onSetAttrib({
                    attrElm: e,
                    attrName: t,
                    attrValue: n
                }))
            },
            setAttribs: function(e, t) {
                var n = this;
                n.$$(e).each(function(e, r) {
                    h(t, function(e, t) {
                        n.setAttrib(r, t, e)
                    })
                })
            },
            getAttrib: function(e, t, n) {
                var r = this,
                    i, o;
                return e = r.$$(e), e.length && (i = r.attrHooks[t], o = i && i.get ? i.get(e, t) : e.attr(t)), "undefined" == typeof o && (o = n || ""), o
            },
            getPos: function(e, t) {
                var r = this,
                    i = 0,
                    o = 0,
                    a, s = r.doc,
                    l = s.body,
                    c;
                if (e = r.get(e), t = t || l, e) {
                    if (t === l && e.getBoundingClientRect && "static" === n(l).css("position")) return c = e.getBoundingClientRect(), t = r.boxModel ? s.documentElement : l, i = c.left + (s.documentElement.scrollLeft || l.scrollLeft) - t.clientLeft, o = c.top + (s.documentElement.scrollTop || l.scrollTop) - t.clientTop, {
                        x: i,
                        y: o
                    };
                    for (a = e; a && a != t && a.nodeType;) i += a.offsetLeft || 0, o += a.offsetTop || 0, a = a.offsetParent;
                    for (a = e.parentNode; a && a != t && a.nodeType;) i -= a.scrollLeft || 0, o -= a.scrollTop || 0, a = a.parentNode
                }
                return {
                    x: i,
                    y: o
                }
            },
            parseStyle: function(e) {
                return this.styles.parse(e)
            },
            serializeStyle: function(e, t) {
                return this.styles.serialize(e, t)
            },
            addStyle: function(e) {
                var t = this,
                    n = t.doc,
                    r, i;
                if (t !== f.DOM && n === document) {
                    var o = f.DOM.addedStyles;
                    if (o = o || [], o[e]) return;
                    o[e] = !0, f.DOM.addedStyles = o
                }
                i = n.getElementById("mceDefaultStyles"), i || (i = n.createElement("style"), i.id = "mceDefaultStyles", i.type = "text/css", r = n.getElementsByTagName("head")[0], r.firstChild ? r.insertBefore(i, r.firstChild) : r.appendChild(i)), i.styleSheet ? i.styleSheet.cssText += e : i.appendChild(n.createTextNode(e))
            },
            loadCSS: function(e) {
                var t = this,
                    n = t.doc,
                    r;
                return t !== f.DOM && n === document ? void f.DOM.loadCSS(e) : (e || (e = ""), r = n.getElementsByTagName("head")[0], void h(e.split(","), function(e) {
                    var i;
                    e = c._addCacheSuffix(e), t.files[e] || (t.files[e] = !0, i = t.create("link", {
                        rel: "stylesheet",
                        href: e
                    }), v && n.documentMode && n.recalc && (i.onload = function() {
                        n.recalc && n.recalc(), i.onload = null
                    }), r.appendChild(i))
                }))
            },
            addClass: function(e, t) {
                this.$$(e).addClass(t)
            },
            removeClass: function(e, t) {
                this.toggleClass(e, t, !1)
            },
            hasClass: function(e, t) {
                return this.$$(e).hasClass(t)
            },
            toggleClass: function(e, t, r) {
                this.$$(e).toggleClass(t, r).each(function() {
                    "" === this.className && n(this).attr("class", null)
                })
            },
            show: function(e) {
                this.$$(e).show()
            },
            hide: function(e) {
                this.$$(e).hide()
            },
            isHidden: function(e) {
                return "none" == this.$$(e).css("display")
            },
            uniqueId: function(e) {
                return (e ? e : "mce_") + this.counter++
            },
            setHTML: function(e, t) {
                e = this.$$(e), v ? e.each(function(e, r) {
                    if (r.canHaveHTML !== !1) {
                        for (; r.firstChild;) r.removeChild(r.firstChild);
                        try {
                            r.innerHTML = "<br>" + t, r.removeChild(r.firstChild)
                        } catch (i) {
                            n("<div>").html("<br>" + t).contents().slice(1).appendTo(r)
                        }
                        return t
                    }
                }) : e.html(t)
            },
            getOuterHTML: function(e) {
                return e = this.get(e), 1 == e.nodeType && "outerHTML" in e ? e.outerHTML : n("<div>").append(n(e).clone()).html()
            },
            setOuterHTML: function(e, t) {
                var r = this;
                r.$$(e).each(function() {
                    try {
                        if ("outerHTML" in this) return void(this.outerHTML = t)
                    } catch (e) {}
                    r.remove(n(this).html(t), !0)
                })
            },
            decode: s.decode,
            encode: s.encodeAllRaw,
            insertAfter: function(e, t) {
                return t = this.get(t), this.run(e, function(e) {
                    var n, r;
                    return n = t.parentNode, r = t.nextSibling, r ? n.insertBefore(e, r) : n.appendChild(e), e
                })
            },
            replace: function(e, t, n) {
                var r = this;
                return r.run(t, function(t) {
                    return p(t, "array") && (e = e.cloneNode(!0)), n && h(m(t.childNodes), function(t) {
                        e.appendChild(t)
                    }), t.parentNode.replaceChild(e, t)
                })
            },
            rename: function(e, t) {
                var n = this,
                    r;
                return e.nodeName != t.toUpperCase() && (r = n.create(t), h(n.getAttribs(e), function(t) {
                    n.setAttrib(r, t.nodeName, n.getAttrib(e, t.nodeName))
                }), n.replace(r, e, 1)), r || e
            },
            findCommonAncestor: function(e, t) {
                for (var n = e, r; n;) {
                    for (r = t; r && n != r;) r = r.parentNode;
                    if (n == r) break;
                    n = n.parentNode
                }
                return !n && e.ownerDocument ? e.ownerDocument.documentElement : n
            },
            toHex: function(e) {
                return this.styles.toHex(c.trim(e))
            },
            run: function(e, t, n) {
                var r = this,
                    i;
                return "string" == typeof e && (e = r.get(e)), e ? (n = n || this, e.nodeType || !e.length && 0 !== e.length ? t.call(n, e) : (i = [], h(e, function(e, o) {
                    e && ("string" == typeof e && (e = r.get(e)), i.push(t.call(n, e, o)))
                }), i)) : !1
            },
            getAttribs: function(e) {
                var t;
                if (e = this.get(e), !e) return [];
                if (v) {
                    if (t = [], "OBJECT" == e.nodeName) return e.attributes;
                    "OPTION" === e.nodeName && this.getAttrib(e, "selected") && t.push({
                        specified: 1,
                        nodeName: "selected"
                    });
                    var n = /<\/?[\w:\-]+ ?|=[\"][^\"]+\"|=\'[^\']+\'|=[\w\-]+|>/gi;
                    return e.cloneNode(!1).outerHTML.replace(n, "").replace(/[\w:\-]+/gi, function(e) {
                        t.push({
                            specified: 1,
                            nodeName: e
                        })
                    }), t
                }
                return e.attributes
            },
            isEmpty: function(e, t) {
                var n = this,
                    r, i, a, s, l, c = 0;
                if (e = e.firstChild) {
                    s = new o(e, e.parentNode), t = t || (n.schema ? n.schema.getNonEmptyElements() : null);
                    do {
                        if (a = e.nodeType, 1 === a) {
                            if (e.getAttribute("data-mce-bogus")) continue;
                            if (l = e.nodeName.toLowerCase(), t && t[l]) {
                                if ("br" === l) {
                                    c++;
                                    continue
                                }
                                return !1
                            }
                            for (i = n.getAttribs(e), r = i.length; r--;)
                                if (l = i[r].nodeName, "name" === l || "data-mce-bookmark" === l) return !1
                        }
                        if (8 == a) return !1;
                        if (3 === a && !b.test(e.nodeValue)) return !1
                    } while (e = s.next())
                }
                return 1 >= c
            },
            createRng: function() {
                var e = this.doc;
                return e.createRange ? e.createRange() : new a(this)
            },
            nodeIndex: function(e, t) {
                var n = 0,
                    r, i;
                if (e)
                    for (r = e.nodeType, e = e.previousSibling; e; e = e.previousSibling) i = e.nodeType, (!t || 3 != i || i != r && e.nodeValue.length) && (n++, r = i);
                return n
            },
            split: function(e, t, n) {
                function r(e) {
                    function t(e) {
                        var t = e.previousSibling && "SPAN" == e.previousSibling.nodeName,
                            n = e.nextSibling && "SPAN" == e.nextSibling.nodeName;
                        return t && n
                    }
                    var n, o = e.childNodes,
                        a = e.nodeType;
                    if (1 != a || "bookmark" != e.getAttribute("data-mce-type")) {
                        for (n = o.length - 1; n >= 0; n--) r(o[n]);
                        if (9 != a) {
                            if (3 == a && e.nodeValue.length > 0) {
                                var s = g(e.nodeValue).length;
                                if (!i.isBlock(e.parentNode) || s > 0 || 0 === s && t(e)) return
                            } else if (1 == a && (o = e.childNodes, 1 == o.length && o[0] && 1 == o[0].nodeType && "bookmark" == o[0].getAttribute("data-mce-type") && e.parentNode.insertBefore(o[0], e), o.length || /^(br|hr|input|img)$/i.test(e.nodeName))) return;
                            i.remove(e)
                        }
                        return e
                    }
                }
                var i = this,
                    o = i.createRng(),
                    a, s, l;
                return e && t ? (o.setStart(e.parentNode, i.nodeIndex(e)), o.setEnd(t.parentNode, i.nodeIndex(t)), a = o.extractContents(), o = i.createRng(), o.setStart(t.parentNode, i.nodeIndex(t) + 1), o.setEnd(e.parentNode, i.nodeIndex(e) + 1), s = o.extractContents(), l = e.parentNode, l.insertBefore(r(a), e), n ? l.replaceChild(n, t) : l.insertBefore(t, e), l.insertBefore(r(s), e), i.remove(e), n || t) : void 0
            },
            bind: function(e, t, n, r) {
                var i = this;
                if (c.isArray(e)) {
                    for (var o = e.length; o--;) e[o] = i.bind(e[o], t, n, r);
                    return e
                }
                return !i.settings.collect || e !== i.doc && e !== i.win || i.boundEvents.push([e, t, n, r]), i.events.bind(e, t, n, r || i)
            },
            unbind: function(e, t, n) {
                var r = this,
                    i;
                if (c.isArray(e)) {
                    for (i = e.length; i--;) e[i] = r.unbind(e[i], t, n);
                    return e
                }
                if (r.boundEvents && (e === r.doc || e === r.win))
                    for (i = r.boundEvents.length; i--;) {
                        var o = r.boundEvents[i];
                        e != o[0] || t && t != o[1] || n && n != o[2] || this.events.unbind(o[0], o[1], o[2])
                    }
                return this.events.unbind(e, t, n)
            },
            fire: function(e, t, n) {
                return this.events.fire(e, t, n)
            },
            getContentEditable: function(e) {
                var t;
                return e && 1 == e.nodeType ? (t = e.getAttribute("data-mce-contenteditable"), t && "inherit" !== t ? t : "inherit" !== e.contentEditable ? e.contentEditable : null) : null
            },
            getContentEditableParent: function(e) {
                for (var t = this.getRoot(), n = null; e && e !== t && (n = this.getContentEditable(e), null === n); e = e.parentNode);
                return n
            },
            destroy: function() {
                var t = this;
                if (t.boundEvents) {
                    for (var n = t.boundEvents.length; n--;) {
                        var r = t.boundEvents[n];
                        this.events.unbind(r[0], r[1], r[2])
                    }
                    t.boundEvents = null
                }
                e.setDocument && e.setDocument(), t.win = t.doc = t.root = t.events = t.frag = null
            },
            isChildOf: function(e, t) {
                for (; e;) {
                    if (t === e) return !0;
                    e = e.parentNode
                }
                return !1
            },
            dumpRng: function(e) {
                return "startContainer: " + e.startContainer.nodeName + ", startOffset: " + e.startOffset + ", endContainer: " + e.endContainer.nodeName + ", endOffset: " + e.endOffset
            },
            _findSib: function(e, t, n) {
                var r = this,
                    i = t;
                if (e)
                    for ("string" == typeof i && (i = function(e) {
                        return r.is(e, t)
                    }), e = e[n]; e; e = e[n])
                        if (i(e)) return e;
                return null
            }
        }, f.DOM = new f(document), f
    }), r(b, [y, d], function(e, t) {
        function n() {
            function e(e, n) {
                function i() {
                    a.remove(l), s && (s.onreadystatechange = s.onload = s = null), n()
                }

                function o() {
                    "undefined" != typeof console && console.log && console.log("Failed to load: " + e)
                }
                var a = r,
                    s, l;
                l = a.uniqueId(), s = document.createElement("script"), s.id = l, s.type = "text/javascript", s.src = t._addCacheSuffix(e), "onreadystatechange" in s ? s.onreadystatechange = function() {
                    /loaded|complete/.test(s.readyState) && i()
                } : s.onload = i, s.onerror = o, (document.getElementsByTagName("head")[0] || document.body).appendChild(s)
            }
            var n = 0,
                a = 1,
                s = 2,
                l = {},
                c = [],
                u = {},
                d = [],
                f = 0,
                h;
            this.isDone = function(e) {
                return l[e] == s
            }, this.markDone = function(e) {
                l[e] = s
            }, this.add = this.load = function(e, t, r) {
                var i = l[e];
                i == h && (c.push(e), l[e] = n), t && (u[e] || (u[e] = []), u[e].push({
                    func: t,
                    scope: r || this
                }))
            }, this.loadQueue = function(e, t) {
                this.loadScripts(c, e, t)
            }, this.loadScripts = function(t, n, r) {
                function c(e) {
                    i(u[e], function(e) {
                        e.func.call(e.scope)
                    }), u[e] = h
                }
                var p;
                d.push({
                    func: n,
                    scope: r || this
                }), (p = function() {
                    var n = o(t);
                    t.length = 0, i(n, function(t) {
                        return l[t] == s ? void c(t) : void(l[t] != a && (l[t] = a, f++, e(t, function() {
                            l[t] = s, f--, c(t), p()
                        })))
                    }), f || (i(d, function(e) {
                        e.func.call(e.scope)
                    }), d.length = 0)
                })()
            }
        }
        var r = e.DOM,
            i = t.each,
            o = t.grep;
        return n.ScriptLoader = new n, n
    }), r(x, [b, d], function(e, n) {
        function r() {
            var e = this;
            e.items = [], e.urls = {}, e.lookup = {}
        }
        var i = n.each;
        return r.prototype = {
            get: function(e) {
                return this.lookup[e] ? this.lookup[e].instance : t
            },
            dependencies: function(e) {
                var t;
                return this.lookup[e] && (t = this.lookup[e].dependencies), t || []
            },
            requireLangPack: function(t, n) {
                var i = r.language;
                if (i && r.languageLoad !== !1) {
                    if (n)
                        if (n = "," + n + ",", -1 != n.indexOf("," + i.substr(0, 2) + ",")) i = i.substr(0, 2);
                        else if (-1 == n.indexOf("," + i + ",")) return;
                    e.ScriptLoader.add(this.urls[t] + "/langs/" + i + ".js")
                }
            },
            add: function(e, t, n) {
                return this.items.push(t), this.lookup[e] = {
                    instance: t,
                    dependencies: n
                }, t
            },
            createUrl: function(e, t) {
                return "object" == typeof t ? t : {
                    prefix: e.prefix,
                    resource: t,
                    suffix: e.suffix
                }
            },
            addComponents: function(t, n) {
                var r = this.urls[t];
                i(n, function(t) {
                    e.ScriptLoader.add(r + "/" + t)
                })
            },
            load: function(n, o, a, s) {
                function l() {
                    var r = c.dependencies(n);
                    i(r, function(e) {
                        var n = c.createUrl(o, e);
                        c.load(n.resource, n, t, t)
                    }), a && a.call(s ? s : e)
                }
                var c = this,
                    u = o;
                c.urls[n] || ("object" == typeof o && (u = o.prefix + o.resource + o.suffix), 0 !== u.indexOf("/") && -1 == u.indexOf("://") && (u = r.baseURL + "/" + u), c.urls[n] = u.substring(0, u.lastIndexOf("/")), c.lookup[n] ? l() : e.ScriptLoader.add(u, l, s))
            }
        }, r.PluginManager = new r, r.ThemeManager = new r, r
    }), r(C, [d, p], function(e, t) {
        function n(e, t) {
            var n = e.childNodes;
            return t--, t > n.length - 1 ? t = n.length - 1 : 0 > t && (t = 0), n[t] || e
        }

        function r(e) {
            this.walk = function(t, r) {
                function o(e) {
                    var t;
                    return t = e[0], 3 === t.nodeType && t === c && u >= t.nodeValue.length && e.splice(0, 1), t = e[e.length - 1], 0 === f && e.length > 0 && t === d && 3 === t.nodeType && e.splice(e.length - 1, 1), e
                }

                function a(e, t, n) {
                    for (var r = []; e && e != n; e = e[t]) r.push(e);
                    return r
                }

                function s(e, t) {
                    do {
                        if (e.parentNode == t) return e;
                        e = e.parentNode
                    } while (e)
                }

                function l(e, t, n) {
                    var i = n ? "nextSibling" : "previousSibling";
                    for (g = e, v = g.parentNode; g && g != t; g = v) v = g.parentNode, y = a(g == e ? g : g[i], i), y.length && (n || y.reverse(), r(o(y)))
                }
                var c = t.startContainer,
                    u = t.startOffset,
                    d = t.endContainer,
                    f = t.endOffset,
                    h, p, m, g, v, y, b;
                if (b = e.select("td.mce-item-selected,th.mce-item-selected"), b.length > 0) return void i(b, function(e) {
                    r([e])
                });
                if (1 == c.nodeType && c.hasChildNodes() && (c = c.childNodes[u]), 1 == d.nodeType && d.hasChildNodes() && (d = n(d, f)), c == d) return r(o([c]));
                for (h = e.findCommonAncestor(c, d), g = c; g; g = g.parentNode) {
                    if (g === d) return l(c, h, !0);
                    if (g === h) break
                }
                for (g = d; g; g = g.parentNode) {
                    if (g === c) return l(d, h);
                    if (g === h) break
                }
                p = s(c, h) || c, m = s(d, h) || d, l(c, p, !0), y = a(p == c ? p : p.nextSibling, "nextSibling", m == d ? m.nextSibling : m), y.length && r(o(y)), l(d, m)
            }, this.split = function(e) {
                function t(e, t) {
                    return e.splitText(t)
                }
                var n = e.startContainer,
                    r = e.startOffset,
                    i = e.endContainer,
                    o = e.endOffset;
                return n == i && 3 == n.nodeType ? r > 0 && r < n.nodeValue.length && (i = t(n, r), n = i.previousSibling, o > r ? (o -= r, n = i = t(i, o).previousSibling, o = i.nodeValue.length, r = 0) : o = 0) : (3 == n.nodeType && r > 0 && r < n.nodeValue.length && (n = t(n, r), r = 0), 3 == i.nodeType && o > 0 && o < i.nodeValue.length && (i = t(i, o).previousSibling, o = i.nodeValue.length)), {
                    startContainer: n,
                    startOffset: r,
                    endContainer: i,
                    endOffset: o
                }
            }, this.normalize = function(n) {
                function r(r) {
                    function a(n, r) {
                        for (var i = new t(n, e.getParent(n.parentNode, e.isBlock) || f); n = i[r ? "prev" : "next"]();)
                            if ("BR" === n.nodeName) return !0
                    }

                    function s(e, t) {
                        return e.previousSibling && e.previousSibling.nodeName == t
                    }

                    function l(n, r) {
                        var a, s, l;
                        if (r = r || c, l = e.getParent(r.parentNode, e.isBlock) || f, n && "BR" == r.nodeName && g && e.isEmpty(l)) return c = r.parentNode, u = e.nodeIndex(r), void(i = !0);
                        for (a = new t(r, l); h = a[n ? "prev" : "next"]();) {
                            if ("false" === e.getContentEditableParent(h)) return;
                            if (3 === h.nodeType && h.nodeValue.length > 0) return c = h, u = n ? h.nodeValue.length : 0, void(i = !0);
                            if (e.isBlock(h) || p[h.nodeName.toLowerCase()]) return;
                            s = h
                        }
                        o && s && (c = s, i = !0, u = 0)
                    }
                    var c, u, d, f = e.getRoot(),
                        h, p, m, g;
                    if (c = n[(r ? "start" : "end") + "Container"], u = n[(r ? "start" : "end") + "Offset"], g = 1 == c.nodeType && u === c.childNodes.length, p = e.schema.getNonEmptyElements(), m = r, 1 == c.nodeType && u > c.childNodes.length - 1 && (m = !1), 9 === c.nodeType && (c = e.getRoot(), u = 0), c === f) {
                        if (m && (h = c.childNodes[u > 0 ? u - 1 : 0], h && (p[h.nodeName] || "TABLE" == h.nodeName))) return;
                        if (c.hasChildNodes() && (u = Math.min(!m && u > 0 ? u - 1 : u, c.childNodes.length - 1), c = c.childNodes[u], u = 0, c.hasChildNodes() && !/TABLE/.test(c.nodeName))) {
                            h = c, d = new t(c, f);
                            do {
                                if (3 === h.nodeType && h.nodeValue.length > 0) {
                                    u = m ? 0 : h.nodeValue.length, c = h, i = !0;
                                    break
                                }
                                if (p[h.nodeName.toLowerCase()]) {
                                    u = e.nodeIndex(h), c = h.parentNode, "IMG" != h.nodeName || m || u++, i = !0;
                                    break
                                }
                            } while (h = m ? d.next() : d.prev())
                        }
                    }
                    o && (3 === c.nodeType && 0 === u && l(!0), 1 === c.nodeType && (h = c.childNodes[u], h || (h = c.childNodes[u - 1]), !h || "BR" !== h.nodeName || s(h, "A") || a(h) || a(h, !0) || l(!0, h))), m && !o && 3 === c.nodeType && u === c.nodeValue.length && l(!1), i && n["set" + (r ? "Start" : "End")](c, u)
                }
                var i, o;
                return o = n.collapsed, r(!0), o || r(), i && o && n.collapse(!0), i
            }
        }
        var i = e.each;
        return r.compareRanges = function(e, t) {
            if (e && t) {
                if (!e.item && !e.duplicate) return e.startContainer == t.startContainer && e.startOffset == t.startOffset;
                if (e.item && t.item && e.item(0) === t.item(0)) return !0;
                if (e.isEqual && t.isEqual && t.isEqual(e)) return !0
            }
            return !1
        }, r.getCaretRangeFromPoint = function(e, t, n) {
            var r, i;
            if (n.caretPositionFromPoint) i = n.caretPositionFromPoint(e, t), r = n.createRange(), r.setStart(i.offsetNode, i.offset), r.collapse(!0);
            else if (n.caretRangeFromPoint) r = n.caretRangeFromPoint(e, t);
            else if (n.body.createTextRange) {
                r = n.body.createTextRange();
                try {
                    r.moveToPoint(e, t), r.collapse(!0)
                } catch (o) {
                    r.collapse(t < n.body.clientHeight)
                }
            }
            return r
        }, r.getNode = function(e, t) {
            return 1 == e.nodeType && e.hasChildNodes() && (t >= e.childNodes.length && (t = e.childNodes.length - 1), e = e.childNodes[t]), e
        }, r
    }), r(w, [C, u], function(e, t) {
        return function(n) {
            function r(e) {
                var t, r;
                if (r = n.$(e).parentsUntil(n.getBody()).add(e), r.length === o.length) {
                    for (t = r.length; t >= 0 && r[t] === o[t]; t--);
                    if (-1 === t) return o = r, !0
                }
                return o = r, !1
            }
            var i, o = [];
            "onselectionchange" in n.getDoc() || n.on("NodeChange Click MouseUp KeyUp Focus", function(t) {
                var r, o;
                r = n.selection.getRng(), o = {
                    startContainer: r.startContainer,
                    startOffset: r.startOffset,
                    endContainer: r.endContainer,
                    endOffset: r.endOffset
                }, "nodechange" != t.type && e.compareRanges(o, i) || n.fire("SelectionChange"), i = o
            }), n.on("contextmenu", function() {
                n.fire("SelectionChange")
            }), n.on("SelectionChange", function() {
                var e = n.selection.getStart(!0);
                (t.range || !n.selection.isCollapsed()) && !r(e) && n.dom.isChildOf(e, n.getBody()) && n.nodeChanged({
                    selectionChange: !0
                })
            }), n.on("MouseUp", function(e) {
                e.isDefaultPrevented() || ("IMG" == n.selection.getNode().nodeName ? setTimeout(function() {
                    n.nodeChanged()
                }, 0) : n.nodeChanged())
            }), this.nodeChanged = function(e) {
                var t = n.selection,
                    r, i, o;
                n.initialized && t && !n.settings.disable_nodechange && !n.settings.readonly && (o = n.getBody(), r = t.getStart() || o, r = r.ownerDocument != n.getDoc() ? n.getBody() : r, "IMG" == r.nodeName && t.isCollapsed() && (r = r.parentNode), i = [], n.dom.getParent(r, function(e) {
                    return e === o ? !0 : void i.push(e)
                }), e = e || {}, e.element = r, e.parents = i, n.fire("NodeChange", e))
            }
        }
    }), r(_, [], function() {
        function e(e, t, n) {
            var r, i, o = n ? "lastChild" : "firstChild",
                a = n ? "prev" : "next";
            if (e[o]) return e[o];
            if (e !== t) {
                if (r = e[a]) return r;
                for (i = e.parent; i && i !== t; i = i.parent)
                    if (r = i[a]) return r
            }
        }

        function t(e, t) {
            this.name = e, this.type = t, 1 === t && (this.attributes = [], this.attributes.map = {})
        }
        var n = /^[ \t\r\n]*$/,
            r = {
                "#text": 3,
                "#comment": 8,
                "#cdata": 4,
                "#pi": 7,
                "#doctype": 10,
                "#document-fragment": 11
            };
        return t.prototype = {
            replace: function(e) {
                var t = this;
                return e.parent && e.remove(), t.insert(e, t), t.remove(), t
            },
            attr: function(e, t) {
                var n = this,
                    r, i, o;
                if ("string" != typeof e) {
                    for (i in e) n.attr(i, e[i]);
                    return n
                }
                if (r = n.attributes) {
                    if (t !== o) {
                        if (null === t) {
                            if (e in r.map)
                                for (delete r.map[e], i = r.length; i--;)
                                    if (r[i].name === e) return r = r.splice(i, 1), n;
                            return n
                        }
                        if (e in r.map) {
                            for (i = r.length; i--;)
                                if (r[i].name === e) {
                                    r[i].value = t;
                                    break
                                }
                        } else r.push({
                            name: e,
                            value: t
                        });
                        return r.map[e] = t, n
                    }
                    return r.map[e]
                }
            },
            clone: function() {
                var e = this,
                    n = new t(e.name, e.type),
                    r, i, o, a, s;
                if (o = e.attributes) {
                    for (s = [], s.map = {}, r = 0, i = o.length; i > r; r++) a = o[r], "id" !== a.name && (s[s.length] = {
                        name: a.name,
                        value: a.value
                    }, s.map[a.name] = a.value);
                    n.attributes = s
                }
                return n.value = e.value, n.shortEnded = e.shortEnded, n
            },
            wrap: function(e) {
                var t = this;
                return t.parent.insert(e, t), e.append(t), t
            },
            unwrap: function() {
                var e = this,
                    t, n;
                for (t = e.firstChild; t;) n = t.next, e.insert(t, e, !0), t = n;
                e.remove()
            },
            remove: function() {
                var e = this,
                    t = e.parent,
                    n = e.next,
                    r = e.prev;
                return t && (t.firstChild === e ? (t.firstChild = n, n && (n.prev = null)) : r.next = n, t.lastChild === e ? (t.lastChild = r, r && (r.next = null)) : n.prev = r, e.parent = e.next = e.prev = null), e
            },
            append: function(e) {
                var t = this,
                    n;
                return e.parent && e.remove(), n = t.lastChild, n ? (n.next = e, e.prev = n, t.lastChild = e) : t.lastChild = t.firstChild = e, e.parent = t, e
            },
            insert: function(e, t, n) {
                var r;
                return e.parent && e.remove(), r = t.parent || this, n ? (t === r.firstChild ? r.firstChild = e : t.prev.next = e, e.prev = t.prev, e.next = t, t.prev = e) : (t === r.lastChild ? r.lastChild = e : t.next.prev = e, e.next = t.next, e.prev = t, t.next = e), e.parent = r, e
            },
            getAll: function(t) {
                var n = this,
                    r, i = [];
                for (r = n.firstChild; r; r = e(r, n)) r.name === t && i.push(r);
                return i
            },
            empty: function() {
                var t = this,
                    n, r, i;
                if (t.firstChild) {
                    for (n = [], i = t.firstChild; i; i = e(i, t)) n.push(i);
                    for (r = n.length; r--;) i = n[r], i.parent = i.firstChild = i.lastChild = i.next = i.prev = null
                }
                return t.firstChild = t.lastChild = null, t
            },
            isEmpty: function(t) {
                var r = this,
                    i = r.firstChild,
                    o, a;
                if (i)
                    do {
                        if (1 === i.type) {
                            if (i.attributes.map["data-mce-bogus"]) continue;
                            if (t[i.name]) return !1;
                            for (o = i.attributes.length; o--;)
                                if (a = i.attributes[o].name, "name" === a || 0 === a.indexOf("data-mce-bookmark")) return !1
                        }
                        if (8 === i.type) return !1;
                        if (3 === i.type && !n.test(i.value)) return !1
                    } while (i = e(i, r));
                return !0
            },
            walk: function(t) {
                return e(this, null, t)
            }
        }, t.create = function(e, n) {
            var i, o;
            if (i = new t(e, r[e] || 1), n)
                for (o in n) i.attr(o, n[o]);
            return i
        }, t
    }), r(E, [d], function(e) {
        function t(e, t) {
            return e ? e.split(t || " ") : []
        }

        function n(e) {
            function n(e, n, r) {
                function i(e, t) {
                    var n = {},
                        r, i;
                    for (r = 0, i = e.length; i > r; r++) n[e[r]] = t || {};
                    return n
                }
                var s, c, u, d = arguments;
                for (r = r || [], n = n || "", "string" == typeof r && (r = t(r)), c = 3; c < d.length; c++) "string" == typeof d[c] && (d[c] = t(d[c])), r.push.apply(r, d[c]);
                for (e = t(e), s = e.length; s--;) u = [].concat(l, t(n)), a[e[s]] = {
                    attributes: i(u),
                    attributesOrder: u,
                    children: i(r, o)
                }
            }

            function r(e, n) {
                var r, i, o, s;
                for (e = t(e), r = e.length, n = t(n); r--;)
                    for (i = a[e[r]], o = 0, s = n.length; s > o; o++) i.attributes[n[o]] = {}, i.attributesOrder.push(n[o])
            }
            var a = {},
                l, c, u, d, f, h;
            return i[e] ? i[e] : (l = t("id accesskey class dir lang style tabindex title"), c = t("address blockquote div dl fieldset form h1 h2 h3 h4 h5 h6 hr menu ol p pre table ul"), u = t("a abbr b bdo br button cite code del dfn em embed i iframe img input ins kbd label map noscript object q s samp script select small span strong sub sup textarea u var #text #comment"), "html4" != e && (l.push.apply(l, t("contenteditable contextmenu draggable dropzone hidden spellcheck translate")), c.push.apply(c, t("article aside details dialog figure header footer hgroup section nav")), u.push.apply(u, t("audio canvas command datalist mark meter output progress time wbr video ruby bdi keygen"))), "html5-strict" != e && (l.push("xml:lang"), h = t("acronym applet basefont big font strike tt"), u.push.apply(u, h), s(h, function(e) {
                n(e, "", u)
            }), f = t("center dir isindex noframes"), c.push.apply(c, f), d = [].concat(c, u), s(f, function(e) {
                n(e, "", d)
            })), d = d || [].concat(c, u), n("html", "manifest", "head body"), n("head", "", "base command link meta noscript script style title"), n("title hr noscript br"), n("base", "href target"), n("link", "href rel media hreflang type sizes hreflang"), n("meta", "name http-equiv content charset"), n("style", "media type scoped"), n("script", "src async defer type charset"), n("body", "onafterprint onbeforeprint onbeforeunload onblur onerror onfocus onhashchange onload onmessage onoffline ononline onpagehide onpageshow onpopstate onresize onscroll onstorage onunload", d), n("address dt dd div caption", "", d), n("h1 h2 h3 h4 h5 h6 pre p abbr code var samp kbd sub sup i b u bdo span legend em strong small s cite dfn", "", u), n("blockquote", "cite", d), n("ol", "reversed start type", "li"), n("ul", "", "li"), n("li", "value", d), n("dl", "", "dt dd"), n("a", "href target rel media hreflang type", u), n("q", "cite", u), n("ins del", "cite datetime", d), n("img", "src sizes srcset alt usemap ismap width height"), n("iframe", "src name width height", d), n("embed", "src type width height"), n("object", "data type typemustmatch name usemap form width height", d, "param"), n("param", "name value"), n("map", "name", d, "area"), n("area", "alt coords shape href target rel media hreflang type"), n("table", "border", "caption colgroup thead tfoot tbody tr" + ("html4" == e ? " col" : "")), n("colgroup", "span", "col"), n("col", "span"), n("tbody thead tfoot", "", "tr"), n("tr", "", "td th"), n("td", "colspan rowspan headers", d), n("th", "colspan rowspan headers scope abbr", d), n("form", "accept-charset action autocomplete enctype method name novalidate target", d), n("fieldset", "disabled form name", d, "legend"), n("label", "form for", u), n("input", "accept alt autocomplete checked dirname disabled form formaction formenctype formmethod formnovalidate formtarget height list max maxlength min multiple name pattern readonly required size src step type value width"), n("button", "disabled form formaction formenctype formmethod formnovalidate formtarget name type value", "html4" == e ? d : u), n("select", "disabled form multiple name required size", "option optgroup"), n("optgroup", "disabled label", "option"), n("option", "disabled label selected value"), n("textarea", "cols dirname disabled form maxlength name readonly required rows wrap"), n("menu", "type label", d, "li"), n("noscript", "", d), "html4" != e && (n("wbr"), n("ruby", "", u, "rt rp"), n("figcaption", "", d), n("mark rt rp summary bdi", "", u), n("canvas", "width height", d), n("video", "src crossorigin poster preload autoplay mediagroup loop muted controls width height buffered", d, "track source"), n("audio", "src crossorigin preload autoplay mediagroup loop muted controls buffered volume", d, "track source"), n("picture", "", "img source"), n("source", "src srcset type media sizes"), n("track", "kind src srclang label default"), n("datalist", "", u, "option"), n("article section nav aside header footer", "", d), n("hgroup", "", "h1 h2 h3 h4 h5 h6"), n("figure", "", d, "figcaption"), n("time", "datetime", u), n("dialog", "open", d), n("command", "type label icon disabled checked radiogroup command"), n("output", "for form name", u), n("progress", "value max", u), n("meter", "value min max low high optimum", u), n("details", "open", d, "summary"), n("keygen", "autofocus challenge disabled form keytype name")), "html5-strict" != e && (r("script", "language xml:space"), r("style", "xml:space"), r("object", "declare classid code codebase codetype archive standby align border hspace vspace"), r("embed", "align name hspace vspace"), r("param", "valuetype type"), r("a", "charset name rev shape coords"), r("br", "clear"), r("applet", "codebase archive code object alt name width height align hspace vspace"), r("img", "name longdesc align border hspace vspace"), r("iframe", "longdesc frameborder marginwidth marginheight scrolling align"), r("font basefont", "size color face"), r("input", "usemap align"), r("select", "onchange"), r("textarea"), r("h1 h2 h3 h4 h5 h6 div p legend caption", "align"), r("ul", "type compact"), r("li", "type"), r("ol dl menu dir", "compact"), r("pre", "width xml:space"), r("hr", "align noshade size width"), r("isindex", "prompt"), r("table", "summary width frame rules cellspacing cellpadding align bgcolor"), r("col", "width align char charoff valign"), r("colgroup", "width align char charoff valign"), r("thead", "align char charoff valign"), r("tr", "align char charoff valign bgcolor"), r("th", "axis align char charoff valign nowrap bgcolor width height"), r("form", "accept"), r("td", "abbr axis scope align char charoff valign nowrap bgcolor width height"), r("tfoot", "align char charoff valign"), r("tbody", "align char charoff valign"), r("area", "nohref"), r("body", "background bgcolor text link vlink alink")), "html4" != e && (r("input button select textarea", "autofocus"), r("input textarea", "placeholder"), r("a", "download"), r("link script img", "crossorigin"), r("iframe", "sandbox seamless allowfullscreen")), s(t("a form meter progress dfn"), function(e) {
                a[e] && delete a[e].children[e]
            }), delete a.caption.children.table, delete a.script, i[e] = a, a)
        }

        function r(e, t) {
            var n;
            return e && (n = {}, "string" == typeof e && (e = {
                "*": e
            }), s(e, function(e, r) {
                n[r] = n[r.toUpperCase()] = "map" == t ? a(e, /[, ]/) : c(e, /[, ]/)
            })), n
        }
        var i = {},
            o = {},
            a = e.makeMap,
            s = e.each,
            l = e.extend,
            c = e.explode,
            u = e.inArray;
        return function(e) {
            function o(t, n, r) {
                var o = e[t];
                return o ? o = a(o, /[, ]/, a(o.toUpperCase(), /[, ]/)) : (o = i[t], o || (o = a(n, " ", a(n.toUpperCase(), " ")), o = l(o, r), i[t] = o)), o
            }

            function d(e) {
                return new RegExp("^" + e.replace(/([?+*])/g, ".$1") + "$")
            }

            function f(e) {
                var n, r, i, o, s, l, c, f, h, p, m, g, v, b, C, w, _, E, N, S = /^([#+\-])?([^\[!\/]+)(?:\/([^\[!]+))?(?:(!?)\[([^\]]+)\])?$/,
                    k = /^([!\-])?(\w+::\w+|[^=:<]+)?(?:([=:<])(.*))?$/,
                    T = /[*?+]/;
                if (e)
                    for (e = t(e, ","), y["@"] && (w = y["@"].attributes, _ = y["@"].attributesOrder), n = 0, r = e.length; r > n; n++)
                        if (s = S.exec(e[n])) {
                            if (b = s[1], h = s[2], C = s[3], f = s[5], g = {}, v = [], l = {
                                    attributes: g,
                                    attributesOrder: v
                                }, "#" === b && (l.paddEmpty = !0), "-" === b && (l.removeEmpty = !0), "!" === s[4] && (l.removeEmptyAttrs = !0), w) {
                                for (E in w) g[E] = w[E];
                                v.push.apply(v, _)
                            }
                            if (f)
                                for (f = t(f, "|"), i = 0, o = f.length; o > i; i++)
                                    if (s = k.exec(f[i])) {
                                        if (c = {}, m = s[1], p = s[2].replace(/::/g, ":"), b = s[3], N = s[4], "!" === m && (l.attributesRequired = l.attributesRequired || [], l.attributesRequired.push(p), c.required = !0), "-" === m) {
                                            delete g[p], v.splice(u(v, p), 1);
                                            continue
                                        }
                                        b && ("=" === b && (l.attributesDefault = l.attributesDefault || [], l.attributesDefault.push({
                                            name: p,
                                            value: N
                                        }), c.defaultValue = N), ":" === b && (l.attributesForced = l.attributesForced || [], l.attributesForced.push({
                                            name: p,
                                            value: N
                                        }), c.forcedValue = N), "<" === b && (c.validValues = a(N, "?"))), T.test(p) ? (l.attributePatterns = l.attributePatterns || [], c.pattern = d(p), l.attributePatterns.push(c)) : (g[p] || v.push(p), g[p] = c)
                                    }
                            w || "@" != h || (w = g, _ = v), C && (l.outputName = h, y[C] = l), T.test(h) ? (l.pattern = d(h), x.push(l)) : y[h] = l
                        }
            }

            function h(e) {
                y = {}, x = [], f(e), s(_, function(e, t) {
                    b[t] = e.children
                })
            }

            function p(e) {
                var n = /^(~)?(.+)$/;
                e && (i.text_block_elements = i.block_elements = null, s(t(e, ","), function(e) {
                    var t = n.exec(e),
                        r = "~" === t[1],
                        i = r ? "span" : "div",
                        o = t[2];
                    if (b[o] = b[i], M[o] = i, r || (R[o.toUpperCase()] = {}, R[o] = {}), !y[o]) {
                        var a = y[i];
                        a = l({}, a), delete a.removeEmptyAttrs, delete a.removeEmpty, y[o] = a
                    }
                    s(b, function(e, t) {
                        e[i] && (b[t] = e = l({}, b[t]), e[o] = e[i])
                    })
                }))
            }

            function m(e) {
                var n = /^([+\-]?)(\w+)\[([^\]]+)\]$/;
                e && s(t(e, ","), function(e) {
                    var r = n.exec(e),
                        i, o;
                    r && (o = r[1], i = o ? b[r[2]] : b[r[2]] = {
                        "#comment": {}
                    }, i = b[r[2]], s(t(r[3], "|"), function(e) {
                        "-" === o ? (b[r[2]] = i = l({}, b[r[2]]), delete i[e]) : i[e] = {}
                    }))
                })
            }

            function g(e) {
                var t = y[e],
                    n;
                if (t) return t;
                for (n = x.length; n--;)
                    if (t = x[n], t.pattern.test(e)) return t
            }
            var v = this,
                y = {},
                b = {},
                x = [],
                C, w, _, E, N, S, k, T, R, A, B, D, L, M = {},
                H = {};
            e = e || {}, _ = n(e.schema), e.verify_html === !1 && (e.valid_elements = "*[*]"), C = r(e.valid_styles), w = r(e.invalid_styles, "map"), T = r(e.valid_classes, "map"), E = o("whitespace_elements", "pre script noscript style textarea video audio iframe object"), N = o("self_closing_elements", "colgroup dd dt li option p td tfoot th thead tr"), S = o("short_ended_elements", "area base basefont br col frame hr img input isindex link meta param embed source wbr track"), k = o("boolean_attributes", "checked compact declare defer disabled ismap multiple nohref noresize noshade nowrap readonly selected autoplay loop controls"), A = o("non_empty_elements", "td th iframe video audio object script", S), B = o("move_caret_before_on_enter_elements", "table", A), D = o("text_block_elements", "h1 h2 h3 h4 h5 h6 p div address pre form blockquote center dir fieldset header footer article section hgroup aside nav figure"), R = o("block_elements", "hr table tbody thead tfoot th tr td li ol ul caption dl dt dd noscript menu isindex option datalist select optgroup", D), L = o("text_inline_elements", "span strong b em i font strike u var cite dfn code mark q sup sub samp"), s((e.special || "script noscript style textarea").split(" "), function(e) {
                H[e] = new RegExp("</" + e + "[^>]*>", "gi")
            }), e.valid_elements ? h(e.valid_elements) : (s(_, function(e, t) {
                y[t] = {
                    attributes: e.attributes,
                    attributesOrder: e.attributesOrder
                }, b[t] = e.children
            }), "html5" != e.schema && s(t("strong/b em/i"), function(e) {
                e = t(e, "/"), y[e[1]].outputName = e[0]
            }), y.img.attributesDefault = [{
                name: "alt",
                value: ""
            }], s(t("ol ul sub sup blockquote span font a table tbody tr strong em b i"), function(e) {
                y[e] && (y[e].removeEmpty = !0)
            }), s(t("p h1 h2 h3 h4 h5 h6 th td pre div address caption"), function(e) {
                y[e].paddEmpty = !0
            }), s(t("span"), function(e) {
                y[e].removeEmptyAttrs = !0
            })), p(e.custom_elements), m(e.valid_children), f(e.extended_valid_elements), m("+ol[ul|ol],+ul[ul|ol]"), e.invalid_elements && s(c(e.invalid_elements), function(e) {
                y[e] && delete y[e]
            }), g("span") || f("span[!data-mce-type|*]"), v.children = b, v.getValidStyles = function() {
                return C
            }, v.getInvalidStyles = function() {
                return w
            }, v.getValidClasses = function() {
                return T
            }, v.getBoolAttrs = function() {
                return k
            }, v.getBlockElements = function() {
                return R
            }, v.getTextBlockElements = function() {
                return D
            }, v.getTextInlineElements = function() {
                return L
            }, v.getShortEndedElements = function() {
                return S
            }, v.getSelfClosingElements = function() {
                return N
            }, v.getNonEmptyElements = function() {
                return A
            }, v.getMoveCaretBeforeOnEnterElements = function() {
                return B
            }, v.getWhiteSpaceElements = function() {
                return E
            }, v.getSpecialElements = function() {
                return H
            }, v.isValidChild = function(e, t) {
                var n = b[e];
                return !(!n || !n[t])
            }, v.isValid = function(e, t) {
                var n, r, i = g(e);
                if (i) {
                    if (!t) return !0;
                    if (i.attributes[t]) return !0;
                    if (n = i.attributePatterns)
                        for (r = n.length; r--;)
                            if (n[r].pattern.test(e)) return !0
                }
                return !1
            }, v.getElementRule = g, v.getCustomElements = function() {
                return M
            }, v.addValidElements = f, v.setValidElements = h, v.addCustomElements = p, v.addValidChildren = m, v.elements = y
        }
    }), r(N, [E, g, d], function(e, t, n) {
        function r(e, t, n) {
            var r = 1,
                i, o, a, s;
            for (s = e.getShortEndedElements(), a = /<([!?\/])?([A-Za-z0-9\-_\:\.]+)((?:\s+[^"\'>]+(?:(?:"[^"]*")|(?:\'[^\']*\')|[^>]*))*|\/|\s+)>/g, a.lastIndex = i = n; o = a.exec(t);) {
                if (i = a.lastIndex, "/" === o[1]) r--;
                else if (!o[1]) {
                    if (o[2] in s) continue;
                    r++
                }
                if (0 === r) break
            }
            return i
        }

        function i(i, a) {
            function s() {}
            var l = this;
            i = i || {}, l.schema = a = a || new e, i.fix_self_closing !== !1 && (i.fix_self_closing = !0), o("comment cdata text start end pi doctype".split(" "), function(e) {
                e && (l[e] = i[e] || s)
            }), l.parse = function(e) {
                function o(e) {
                    var t, n;
                    for (t = h.length; t-- && h[t].name !== e;);
                    if (t >= 0) {
                        for (n = h.length - 1; n >= t; n--) e = h[n], e.valid && l.end(e.name);
                        h.length = t
                    }
                }

                function s(e, t, n, r, o) {
                    var a, s, l = /[\s\u0000-\u001F]+/g;
                    if (t = t.toLowerCase(), n = t in C ? t : z(n || r || o || ""), _ && !y && 0 !== t.indexOf("data-")) {
                        if (a = T[t], !a && R) {
                            for (s = R.length; s-- && (a = R[s], !a.pattern.test(t));); - 1 === s && (a = null)
                        }
                        if (!a) return;
                        if (a.validValues && !(n in a.validValues)) return
                    }
                    if (V[t] && !i.allow_script_urls) {
                        var c = n.replace(l, "");
                        try {
                            c = decodeURIComponent(c)
                        } catch (u) {
                            c = unescape(c)
                        }
                        if (U.test(c)) return;
                        if (!i.allow_html_data_urls && $.test(c) && !/^data:image\//i.test(c)) return
                    }
                    p.map[t] = n, p.push({
                        name: t,
                        value: n
                    })
                }
                var l = this,
                    c, u = 0,
                    d, f, h = [],
                    p, m, g, v, y, b, x, C, w, _, E, N, S, k, T, R, A, B, D, L, M, H, P, O, I, F = 0,
                    z = t.decode,
                    W, V = n.makeMap("src,href,data,background,formaction,poster"),
                    U = /((java|vb)script|mhtml):/i,
                    $ = /^data:/i;
                for (H = new RegExp("<(?:(?:!--([\\w\\W]*?)-->)|(?:!\\[CDATA\\[([\\w\\W]*?)\\]\\]>)|(?:!DOCTYPE([\\w\\W]*?)>)|(?:\\?([^\\s\\/<>]+) ?([\\w\\W]*?)[?/]>)|(?:\\/([^>]+)>)|(?:([A-Za-z0-9\\-_\\:\\.]+)((?:\\s+[^\"'>]+(?:(?:\"[^\"]*\")|(?:'[^']*')|[^>]*))*|\\/|\\s+)>))", "g"), P = /([\w:\-]+)(?:\s*=\s*(?:(?:\"((?:[^\"])*)\")|(?:\'((?:[^\'])*)\')|([^>\s]+)))?/g, x = a.getShortEndedElements(), M = i.self_closing_elements || a.getSelfClosingElements(), C = a.getBoolAttrs(), _ = i.validate, b = i.remove_internals, W = i.fix_self_closing, O = a.getSpecialElements(); c = H.exec(e);) {
                    if (u < c.index && l.text(z(e.substr(u, c.index - u))), d = c[6]) d = d.toLowerCase(), ":" === d.charAt(0) && (d = d.substr(1)), o(d);
                    else if (d = c[7]) {
                        if (d = d.toLowerCase(), ":" === d.charAt(0) && (d = d.substr(1)), w = d in x, W && M[d] && h.length > 0 && h[h.length - 1].name === d && o(d), !_ || (E = a.getElementRule(d))) {
                            if (N = !0, _ && (T = E.attributes, R = E.attributePatterns), (k = c[8]) ? (y = -1 !== k.indexOf("data-mce-type"), y && b && (N = !1), p = [], p.map = {}, k.replace(P, s)) : (p = [], p.map = {}), _ && !y) {
                                if (A = E.attributesRequired, B = E.attributesDefault, D = E.attributesForced, L = E.removeEmptyAttrs, L && !p.length && (N = !1), D)
                                    for (m = D.length; m--;) S = D[m], v = S.name, I = S.value, "{$uid}" === I && (I = "mce_" + F++), p.map[v] = I, p.push({
                                        name: v,
                                        value: I
                                    });
                                if (B)
                                    for (m = B.length; m--;) S = B[m], v = S.name, v in p.map || (I = S.value, "{$uid}" === I && (I = "mce_" + F++), p.map[v] = I, p.push({
                                        name: v,
                                        value: I
                                    }));
                                if (A) {
                                    for (m = A.length; m-- && !(A[m] in p.map);); - 1 === m && (N = !1)
                                }
                                if (S = p.map["data-mce-bogus"]) {
                                    if ("all" === S) {
                                        u = r(a, e, H.lastIndex), H.lastIndex = u;
                                        continue
                                    }
                                    N = !1
                                }
                            }
                            N && l.start(d, p, w)
                        } else N = !1;
                        if (f = O[d]) {
                            f.lastIndex = u = c.index + c[0].length, (c = f.exec(e)) ? (N && (g = e.substr(u, c.index - u)), u = c.index + c[0].length) : (g = e.substr(u), u = e.length), N && (g.length > 0 && l.text(g, !0), l.end(d)), H.lastIndex = u;
                            continue
                        }
                        w || (k && k.indexOf("/") == k.length - 1 ? N && l.end(d) : h.push({
                            name: d,
                            valid: N
                        }))
                    } else(d = c[1]) ? (">" === d.charAt(0) && (d = " " + d), i.allow_conditional_comments || "[if" !== d.substr(0, 3) || (d = " " + d), l.comment(d)) : (d = c[2]) ? l.cdata(d) : (d = c[3]) ? l.doctype(d) : (d = c[4]) && l.pi(d, c[5]);
                    u = c.index + c[0].length
                }
                for (u < e.length && l.text(z(e.substr(u))), m = h.length - 1; m >= 0; m--) d = h[m], d.valid && l.end(d.name)
            }
        }
        var o = n.each;
        return i.findEndTag = r, i
    }), r(S, [_, E, N, d], function(e, t, n, r) {
        var i = r.makeMap,
            o = r.each,
            a = r.explode,
            s = r.extend;
        return function(r, l) {
            function c(t) {
                var n, r, o, a, s, c, d, f, h, p, m, g, v, y;
                for (m = i("tr,td,th,tbody,thead,tfoot,table"), p = l.getNonEmptyElements(), g = l.getTextBlockElements(), n = 0; n < t.length; n++)
                    if (r = t[n], r.parent && !r.fixed)
                        if (g[r.name] && "li" == r.parent.name) {
                            for (v = r.next; v && g[v.name];) v.name = "li", v.fixed = !0, r.parent.insert(v, r.parent), v = v.next;
                            r.unwrap(r)
                        } else {
                            for (a = [r], o = r.parent; o && !l.isValidChild(o.name, r.name) && !m[o.name]; o = o.parent) a.push(o);
                            if (o && a.length > 1) {
                                for (a.reverse(), s = c = u.filterNode(a[0].clone()), h = 0; h < a.length - 1; h++) {
                                    for (l.isValidChild(c.name, a[h].name) ? (d = u.filterNode(a[h].clone()), c.append(d)) : d = c, f = a[h].firstChild; f && f != a[h + 1];) y = f.next, d.append(f), f = y;
                                    c = d
                                }
                                s.isEmpty(p) ? o.insert(r, a[0], !0) : (o.insert(s, a[0], !0), o.insert(r, s)), o = a[0], (o.isEmpty(p) || o.firstChild === o.lastChild && "br" === o.firstChild.name) && o.empty().remove()
                            } else if (r.parent) {
                                if ("li" === r.name) {
                                    if (v = r.prev, v && ("ul" === v.name || "ul" === v.name)) {
                                        v.append(r);
                                        continue
                                    }
                                    if (v = r.next, v && ("ul" === v.name || "ul" === v.name)) {
                                        v.insert(r, v.firstChild, !0);
                                        continue
                                    }
                                    r.wrap(u.filterNode(new e("ul", 1)));
                                    continue
                                }
                                l.isValidChild(r.parent.name, "div") && l.isValidChild("div", r.name) ? r.wrap(u.filterNode(new e("div", 1))) : "style" === r.name || "script" === r.name ? r.empty().remove() : r.unwrap()
                            }
                        }
            }
            var u = this,
                d = {},
                f = [],
                h = {},
                p = {};
            r = r || {}, r.validate = "validate" in r ? r.validate : !0, r.root_name = r.root_name || "body", u.schema = l = l || new t, u.filterNode = function(e) {
                var t, n, r;
                n in d && (r = h[n], r ? r.push(e) : h[n] = [e]), t = f.length;
                for (; t--;) n = f[t].name, n in e.attributes.map && (r = p[n], r ? r.push(e) : p[n] = [e]);
                return e
            }, u.addNodeFilter = function(e, t) {
                o(a(e), function(e) {
                    var n = d[e];
                    n || (d[e] = n = []), n.push(t)
                })
            }, u.addAttributeFilter = function(e, t) {
                o(a(e), function(e) {
                    var n;
                    for (n = 0; n < f.length; n++)
                        if (f[n].name === e) return void f[n].callbacks.push(t);
                    f.push({
                        name: e,
                        callbacks: [t]
                    })
                })
            }, u.parse = function(t, o) {
                function a() {
                    function e(e) {
                        e && (t = e.firstChild, t && 3 == t.type && (t.value = t.value.replace(R, "")), t = e.lastChild, t && 3 == t.type && (t.value = t.value.replace(D, "")))
                    }
                    var t = y.firstChild,
                        n, i;
                    if (l.isValidChild(y.name, I.toLowerCase())) {
                        for (; t;) n = t.next, 3 == t.type || 1 == t.type && "p" !== t.name && !T[t.name] && !t.attr("data-mce-type") ? i ? i.append(t) : (i = u(I, 1), i.attr(r.forced_root_block_attrs), y.insert(i, t), i.append(t)) : (e(i), i = null), t = n;
                        e(i)
                    }
                }

                function u(t, n) {
                    var r = new e(t, n),
                        i;
                    return t in d && (i = h[t], i ? i.push(r) : h[t] = [r]), r
                }

                function m(e) {
                    var t, n, r, i, o = l.getBlockElements();
                    for (t = e.prev; t && 3 === t.type;)
                        if (r = t.value.replace(D, ""), r.length > 0) t.value = r, t = t.prev;
                        else {
                            if (n = t.next) {
                                if (3 == n.type && n.value.length) {
                                    t = t.prev;
                                    continue
                                }
                                if (!o[n.name] && "script" != n.name && "style" != n.name) {
                                    t = t.prev;
                                    continue
                                }
                            }
                            i = t.prev, t.remove(), t = i
                        }
                }

                function g(e) {
                    var t, n = {};
                    for (t in e) "li" !== t && "p" != t && (n[t] = e[t]);
                    return n
                }
                var v, y, b, x, C, w, _, E, N, S, k, T, R, A = [],
                    B, D, L, M, H, P, O, I;
                if (o = o || {}, h = {}, p = {}, T = s(i("script,style,head,html,body,title,meta,param"), l.getBlockElements()),
                        O = l.getNonEmptyElements(), P = l.children, k = r.validate, I = "forced_root_block" in o ? o.forced_root_block : r.forced_root_block, H = l.getWhiteSpaceElements(), R = /^[ \t\r\n]+/, D = /[ \t\r\n]+$/, L = /[ \t\r\n]+/g, M = /^[ \t\r\n]+$/, v = new n({
                        validate: k,
                        allow_script_urls: r.allow_script_urls,
                        allow_conditional_comments: r.allow_conditional_comments,
                        self_closing_elements: g(l.getSelfClosingElements()),
                        cdata: function(e) {
                            b.append(u("#cdata", 4)).value = e
                        },
                        text: function(e, t) {
                            var n;
                            B || (e = e.replace(L, " "), b.lastChild && T[b.lastChild.name] && (e = e.replace(R, ""))), 0 !== e.length && (n = u("#text", 3), n.raw = !!t, b.append(n).value = e)
                        },
                        comment: function(e) {
                            b.append(u("#comment", 8)).value = e
                        },
                        pi: function(e, t) {
                            b.append(u(e, 7)).value = t, m(b)
                        },
                        doctype: function(e) {
                            var t;
                            t = b.append(u("#doctype", 10)), t.value = e, m(b)
                        },
                        start: function(e, t, n) {
                            var r, i, o, a, s;
                            if (o = k ? l.getElementRule(e) : {}) {
                                for (r = u(o.outputName || e, 1), r.attributes = t, r.shortEnded = n, b.append(r), s = P[b.name], s && P[r.name] && !s[r.name] && A.push(r), i = f.length; i--;) a = f[i].name, a in t.map && (N = p[a], N ? N.push(r) : p[a] = [r]);
                                T[e] && m(r), n || (b = r), !B && H[e] && (B = !0)
                            }
                        },
                        end: function(t) {
                            var n, r, i, o, a;
                            if (r = k ? l.getElementRule(t) : {}) {
                                if (T[t] && !B) {
                                    if (n = b.firstChild, n && 3 === n.type)
                                        if (i = n.value.replace(R, ""), i.length > 0) n.value = i, n = n.next;
                                        else
                                            for (o = n.next, n.remove(), n = o; n && 3 === n.type;) i = n.value, o = n.next, (0 === i.length || M.test(i)) && (n.remove(), n = o), n = o;
                                    if (n = b.lastChild, n && 3 === n.type)
                                        if (i = n.value.replace(D, ""), i.length > 0) n.value = i, n = n.prev;
                                        else
                                            for (o = n.prev, n.remove(), n = o; n && 3 === n.type;) i = n.value, o = n.prev, (0 === i.length || M.test(i)) && (n.remove(), n = o), n = o
                                }
                                if (B && H[t] && (B = !1), (r.removeEmpty || r.paddEmpty) && b.isEmpty(O))
                                    if (r.paddEmpty) b.empty().append(new e("#text", "3")).value = "\xa0";
                                    else if (!b.attributes.map.name && !b.attributes.map.id) return a = b.parent, T[b.name] ? b.empty().remove() : b.unwrap(), void(b = a);
                                b = b.parent
                            }
                        }
                    }, l), y = b = new e(o.context || r.root_name, 11), v.parse(t), k && A.length && (o.context ? o.invalid = !0 : c(A)), I && ("body" == y.name || o.isRootContent) && a(), !o.invalid) {
                    for (S in h) {
                        for (N = d[S], x = h[S], _ = x.length; _--;) x[_].parent || x.splice(_, 1);
                        for (C = 0, w = N.length; w > C; C++) N[C](x, S, o)
                    }
                    for (C = 0, w = f.length; w > C; C++)
                        if (N = f[C], N.name in p) {
                            for (x = p[N.name], _ = x.length; _--;) x[_].parent || x.splice(_, 1);
                            for (_ = 0, E = N.callbacks.length; E > _; _++) N.callbacks[_](x, N.name, o)
                        }
                }
                return y
            }, r.remove_trailing_brs && u.addNodeFilter("br", function(t) {
                var n, r = t.length,
                    i, o = s({}, l.getBlockElements()),
                    a = l.getNonEmptyElements(),
                    c, u, d, f, h, p;
                for (o.body = 1, n = 0; r > n; n++)
                    if (i = t[n], c = i.parent, o[i.parent.name] && i === c.lastChild) {
                        for (d = i.prev; d;) {
                            if (f = d.name, "span" !== f || "bookmark" !== d.attr("data-mce-type")) {
                                if ("br" !== f) break;
                                if ("br" === f) {
                                    i = null;
                                    break
                                }
                            }
                            d = d.prev
                        }
                        i && (i.remove(), c.isEmpty(a) && (h = l.getElementRule(c.name), h && (h.removeEmpty ? c.remove() : h.paddEmpty && (c.empty().append(new e("#text", 3)).value = "\xa0"))))
                    } else {
                        for (u = i; c && c.firstChild === u && c.lastChild === u && (u = c, !o[c.name]);) c = c.parent;
                        u === c && (p = new e("#text", 3), p.value = "\xa0", i.replace(p))
                    }
            }), r.allow_html_in_named_anchor || u.addAttributeFilter("id,name", function(e) {
                for (var t = e.length, n, r, i, o; t--;)
                    if (o = e[t], "a" === o.name && o.firstChild && !o.attr("href")) {
                        i = o.parent, n = o.lastChild;
                        do r = n.prev, i.insert(n, o), n = r; while (n)
                    }
            }), r.validate && l.getValidClasses() && u.addAttributeFilter("class", function(e) {
                for (var t = e.length, n, r, i, o, a, s = l.getValidClasses(), c, u; t--;) {
                    for (n = e[t], r = n.attr("class").split(" "), a = "", i = 0; i < r.length; i++) o = r[i], u = !1, c = s["*"], c && c[o] && (u = !0), c = s[n.name], !u && c && c[o] && (u = !0), u && (a && (a += " "), a += o);
                    a.length || (a = null), n.attr("class", a)
                }
            })
        }
    }), r(k, [g, d], function(e, t) {
        var n = t.makeMap;
        return function(t) {
            var r = [],
                i, o, a, s, l;
            return t = t || {}, i = t.indent, o = n(t.indent_before || ""), a = n(t.indent_after || ""), s = e.getEncodeFunc(t.entity_encoding || "raw", t.entities), l = "html" == t.element_format, {
                start: function(e, t, n) {
                    var c, u, d, f;
                    if (i && o[e] && r.length > 0 && (f = r[r.length - 1], f.length > 0 && "\n" !== f && r.push("\n")), r.push("<", e), t)
                        for (c = 0, u = t.length; u > c; c++) d = t[c], r.push(" ", d.name, '="', s(d.value, !0), '"');
                    !n || l ? r[r.length] = ">" : r[r.length] = " />", n && i && a[e] && r.length > 0 && (f = r[r.length - 1], f.length > 0 && "\n" !== f && r.push("\n"))
                },
                end: function(e) {
                    var t;
                    r.push("</", e, ">"), i && a[e] && r.length > 0 && (t = r[r.length - 1], t.length > 0 && "\n" !== t && r.push("\n"))
                },
                text: function(e, t) {
                    e.length > 0 && (r[r.length] = t ? e : s(e))
                },
                cdata: function(e) {
                    r.push("<![CDATA[", e, "]]>")
                },
                comment: function(e) {
                    r.push("<!--", e, "-->")
                },
                pi: function(e, t) {
                    t ? r.push("<?", e, " ", s(t), "?>") : r.push("<?", e, "?>"), i && r.push("\n")
                },
                doctype: function(e) {
                    r.push("<!DOCTYPE", e, ">", i ? "\n" : "")
                },
                reset: function() {
                    r.length = 0
                },
                getContent: function() {
                    return r.join("").replace(/\n$/, "")
                }
            }
        }
    }), r(T, [k, E], function(e, t) {
        return function(n, r) {
            var i = this,
                o = new e(n);
            n = n || {}, n.validate = "validate" in n ? n.validate : !0, i.schema = r = r || new t, i.writer = o, i.serialize = function(e) {
                function t(e) {
                    var n = i[e.type],
                        s, l, c, u, d, f, h, p, m;
                    if (n) n(e);
                    else {
                        if (s = e.name, l = e.shortEnded, c = e.attributes, a && c && c.length > 1) {
                            for (f = [], f.map = {}, m = r.getElementRule(e.name), h = 0, p = m.attributesOrder.length; p > h; h++) u = m.attributesOrder[h], u in c.map && (d = c.map[u], f.map[u] = d, f.push({
                                name: u,
                                value: d
                            }));
                            for (h = 0, p = c.length; p > h; h++) u = c[h].name, u in f.map || (d = c.map[u], f.map[u] = d, f.push({
                                name: u,
                                value: d
                            }));
                            c = f
                        }
                        if (o.start(e.name, c, l), !l) {
                            if (e = e.firstChild)
                                do t(e); while (e = e.next);
                            o.end(s)
                        }
                    }
                }
                var i, a;
                return a = n.validate, i = {
                    3: function(e) {
                        o.text(e.value, e.raw)
                    },
                    8: function(e) {
                        o.comment(e.value)
                    },
                    7: function(e) {
                        o.pi(e.name, e.value)
                    },
                    10: function(e) {
                        o.doctype(e.value)
                    },
                    4: function(e) {
                        o.cdata(e.value)
                    },
                    11: function(e) {
                        if (e = e.firstChild)
                            do t(e); while (e = e.next)
                    }
                }, o.reset(), 1 != e.type || n.inner ? i[11](e) : t(e), o.getContent()
            }
        }
    }), r(R, [y, S, g, T, _, E, u, d], function(e, t, n, r, i, o, a, s) {
        var l = s.each,
            c = s.trim,
            u = e.DOM;
        return function(e, i) {
            var s, d, f;
            return i && (s = i.dom, d = i.schema), s = s || u, d = d || new o(e), e.entity_encoding = e.entity_encoding || "named", e.remove_trailing_brs = "remove_trailing_brs" in e ? e.remove_trailing_brs : !0, f = new t(e, d), f.addAttributeFilter("data-mce-tabindex", function(e, t) {
                for (var n = e.length, r; n--;) r = e[n], r.attr("tabindex", r.attributes.map["data-mce-tabindex"]), r.attr(t, null)
            }), f.addAttributeFilter("src,href,style", function(t, n) {
                for (var r = t.length, i, o, a = "data-mce-" + n, l = e.url_converter, c = e.url_converter_scope, u; r--;) i = t[r], o = i.attributes.map[a], o !== u ? (i.attr(n, o.length > 0 ? o : null), i.attr(a, null)) : (o = i.attributes.map[n], "style" === n ? o = s.serializeStyle(s.parseStyle(o), i.name) : l && (o = l.call(c, o, n, i.name)), i.attr(n, o.length > 0 ? o : null))
            }), f.addAttributeFilter("class", function(e) {
                for (var t = e.length, n, r; t--;) n = e[t], r = n.attr("class"), r && (r = n.attr("class").replace(/(?:^|\s)mce-item-\w+(?!\S)/g, ""), n.attr("class", r.length > 0 ? r : null))
            }), f.addAttributeFilter("data-mce-type", function(e, t, n) {
                for (var r = e.length, i; r--;) i = e[r], "bookmark" !== i.attributes.map["data-mce-type"] || n.cleanup || i.remove()
            }), f.addNodeFilter("noscript", function(e) {
                for (var t = e.length, r; t--;) r = e[t].firstChild, r && (r.value = n.decode(r.value))
            }), f.addNodeFilter("script,style", function(e, t) {
                function n(e) {
                    return e.replace(/(<!--\[CDATA\[|\]\]-->)/g, "\n").replace(/^[\r\n]*|[\r\n]*$/g, "").replace(/^\s*((<!--)?(\s*\/\/)?\s*<!\[CDATA\[|(<!--\s*)?\/\*\s*<!\[CDATA\[\s*\*\/|(\/\/)?\s*<!--|\/\*\s*<!--\s*\*\/)\s*[\r\n]*/gi, "").replace(/\s*(\/\*\s*\]\]>\s*\*\/(-->)?|\s*\/\/\s*\]\]>(-->)?|\/\/\s*(-->)?|\]\]>|\/\*\s*-->\s*\*\/|\s*-->\s*)\s*$/g, "")
                }
                for (var r = e.length, i, o, a; r--;) i = e[r], o = i.firstChild ? i.firstChild.value : "", "script" === t ? (a = i.attr("type"), a && i.attr("type", "mce-no/type" == a ? null : a.replace(/^mce\-/, "")), o.length > 0 && (i.firstChild.value = "// <![CDATA[\n" + n(o) + "\n// ]]>")) : o.length > 0 && (i.firstChild.value = "<!--\n" + n(o) + "\n-->")
            }), f.addNodeFilter("#comment", function(e) {
                for (var t = e.length, n; t--;) n = e[t], 0 === n.value.indexOf("[CDATA[") ? (n.name = "#cdata", n.type = 4, n.value = n.value.replace(/^\[CDATA\[|\]\]$/g, "")) : 0 === n.value.indexOf("mce:protected ") && (n.name = "#text", n.type = 3, n.raw = !0, n.value = unescape(n.value).substr(14))
            }), f.addNodeFilter("xml:namespace,input", function(e, t) {
                for (var n = e.length, r; n--;) r = e[n], 7 === r.type ? r.remove() : 1 === r.type && ("input" !== t || "type" in r.attributes.map || r.attr("type", "text"))
            }), e.fix_list_elements && f.addNodeFilter("ul,ol", function(e) {
                for (var t = e.length, n, r; t--;) n = e[t], r = n.parent, ("ul" === r.name || "ol" === r.name) && n.prev && "li" === n.prev.name && n.prev.append(n)
            }), f.addAttributeFilter("data-mce-src,data-mce-href,data-mce-style,data-mce-selected,data-mce-expando,data-mce-type,data-mce-resize", function(e, t) {
                for (var n = e.length; n--;) e[n].attr(t, null)
            }), {
                schema: d,
                addNodeFilter: f.addNodeFilter,
                addAttributeFilter: f.addAttributeFilter,
                serialize: function(t, n) {
                    var i = this,
                        o, u, h, p, m;
                    return a.ie && s.select("script,style,select,map").length > 0 ? (m = t.innerHTML, t = t.cloneNode(!1), s.setHTML(t, m)) : t = t.cloneNode(!0), o = t.ownerDocument.implementation, o.createHTMLDocument && (u = o.createHTMLDocument(""), l("BODY" == t.nodeName ? t.childNodes : [t], function(e) {
                        u.body.appendChild(u.importNode(e, !0))
                    }), t = "BODY" != t.nodeName ? u.body.firstChild : u.body, h = s.doc, s.doc = u), n = n || {}, n.format = n.format || "html", n.selection && (n.forced_root_block = ""), n.no_events || (n.node = t, i.onPreProcess(n)), p = new r(e, d), n.content = p.serialize(f.parse(c(n.getInner ? t.innerHTML : s.getOuterHTML(t)), n)), n.cleanup || (n.content = n.content.replace(/\uFEFF/g, "")), n.no_events || i.onPostProcess(n), h && (s.doc = h), n.node = null, n.content
                },
                addRules: function(e) {
                    d.addValidElements(e)
                },
                setRules: function(e) {
                    d.setValidElements(e)
                },
                onPreProcess: function(e) {
                    i && i.fire("PreProcess", e)
                },
                onPostProcess: function(e) {
                    i && i.fire("PostProcess", e)
                }
            }
        }
    }), r(A, [], function() {
        function e(e) {
            function t(t, n) {
                var r, i = 0,
                    o, a, s, l, c, u, d = -1,
                    f;
                if (r = t.duplicate(), r.collapse(n), f = r.parentElement(), f.ownerDocument === e.dom.doc) {
                    for (;
                        "false" === f.contentEditable;) f = f.parentNode;
                    if (!f.hasChildNodes()) return {
                        node: f,
                        inside: 1
                    };
                    for (s = f.children, o = s.length - 1; o >= i;)
                        if (u = Math.floor((i + o) / 2), l = s[u], r.moveToElementText(l), d = r.compareEndPoints(n ? "StartToStart" : "EndToEnd", t), d > 0) o = u - 1;
                        else {
                            if (!(0 > d)) return {
                                node: l
                            };
                            i = u + 1
                        }
                    if (0 > d)
                        for (l ? r.collapse(!1) : (r.moveToElementText(f), r.collapse(!0), l = f, a = !0), c = 0; 0 !== r.compareEndPoints(n ? "StartToStart" : "StartToEnd", t) && 0 !== r.move("character", 1) && f == r.parentElement();) c++;
                    else
                        for (r.collapse(!0), c = 0; 0 !== r.compareEndPoints(n ? "StartToStart" : "StartToEnd", t) && 0 !== r.move("character", -1) && f == r.parentElement();) c++;
                    return {
                        node: l,
                        position: d,
                        offset: c,
                        inside: a
                    }
                }
            }

            function n() {
                function n(e) {
                    var n = t(o, e),
                        r, i, s = 0,
                        l, c, u;
                    if (r = n.node, i = n.offset, n.inside && !r.hasChildNodes()) return void a[e ? "setStart" : "setEnd"](r, 0);
                    if (i === c) return void a[e ? "setStartBefore" : "setEndAfter"](r);
                    if (n.position < 0) {
                        if (l = n.inside ? r.firstChild : r.nextSibling, !l) return void a[e ? "setStartAfter" : "setEndAfter"](r);
                        if (!i) return void(3 == l.nodeType ? a[e ? "setStart" : "setEnd"](l, 0) : a[e ? "setStartBefore" : "setEndBefore"](l));
                        for (; l;) {
                            if (3 == l.nodeType && (u = l.nodeValue, s += u.length, s >= i)) {
                                r = l, s -= i, s = u.length - s;
                                break
                            }
                            l = l.nextSibling
                        }
                    } else {
                        if (l = r.previousSibling, !l) return a[e ? "setStartBefore" : "setEndBefore"](r);
                        if (!i) return void(3 == r.nodeType ? a[e ? "setStart" : "setEnd"](l, r.nodeValue.length) : a[e ? "setStartAfter" : "setEndAfter"](l));
                        for (; l;) {
                            if (3 == l.nodeType && (s += l.nodeValue.length, s >= i)) {
                                r = l, s -= i;
                                break
                            }
                            l = l.previousSibling
                        }
                    }
                    a[e ? "setStart" : "setEnd"](r, s)
                }
                var o = e.getRng(),
                    a = i.createRng(),
                    s, l, c, u, d;
                if (s = o.item ? o.item(0) : o.parentElement(), s.ownerDocument != i.doc) return a;
                if (l = e.isCollapsed(), o.item) return a.setStart(s.parentNode, i.nodeIndex(s)), a.setEnd(a.startContainer, a.startOffset + 1), a;
                try {
                    n(!0), l || n()
                } catch (f) {
                    if (-2147024809 != f.number) throw f;
                    d = r.getBookmark(2), c = o.duplicate(), c.collapse(!0), s = c.parentElement(), l || (c = o.duplicate(), c.collapse(!1), u = c.parentElement(), u.innerHTML = u.innerHTML), s.innerHTML = s.innerHTML, r.moveToBookmark(d), o = e.getRng(), n(!0), l || n()
                }
                return a
            }
            var r = this,
                i = e.dom,
                o = !1;
            this.getBookmark = function(n) {
                function r(e) {
                    var t, n, r, o, a = [];
                    for (t = e.parentNode, n = i.getRoot().parentNode; t != n && 9 !== t.nodeType;) {
                        for (r = t.children, o = r.length; o--;)
                            if (e === r[o]) {
                                a.push(o);
                                break
                            }
                        e = t, t = t.parentNode
                    }
                    return a
                }

                function o(e) {
                    var n;
                    return n = t(a, e), n ? {
                        position: n.position,
                        offset: n.offset,
                        indexes: r(n.node),
                        inside: n.inside
                    } : void 0
                }
                var a = e.getRng(),
                    s = {};
                return 2 === n && (a.item ? s.start = {
                    ctrl: !0,
                    indexes: r(a.item(0))
                } : (s.start = o(!0), e.isCollapsed() || (s.end = o()))), s
            }, this.moveToBookmark = function(e) {
                function t(e) {
                    var t, n, r, o;
                    for (t = i.getRoot(), n = e.length - 1; n >= 0; n--) o = t.children, r = e[n], r <= o.length - 1 && (t = o[r]);
                    return t
                }

                function n(n) {
                    var i = e[n ? "start" : "end"],
                        a, s, l, c;
                    i && (a = i.position > 0, s = o.createTextRange(), s.moveToElementText(t(i.indexes)), c = i.offset, c !== l ? (s.collapse(i.inside || a), s.moveStart("character", a ? -c : c)) : s.collapse(n), r.setEndPoint(n ? "StartToStart" : "EndToStart", s), n && r.collapse(!0))
                }
                var r, o = i.doc.body;
                e.start && (e.start.ctrl ? (r = o.createControlRange(), r.addElement(t(e.start.indexes)), r.select()) : (r = o.createTextRange(), n(!0), n(), r.select()))
            }, this.addRange = function(t) {
                function n(e) {
                    var t, n, a, d, p;
                    a = i.create("a"), t = e ? s : c, n = e ? l : u, d = r.duplicate(), (t == f || t == f.documentElement) && (t = h, n = 0), 3 == t.nodeType ? (t.parentNode.insertBefore(a, t), d.moveToElementText(a), d.moveStart("character", n), i.remove(a), r.setEndPoint(e ? "StartToStart" : "EndToEnd", d)) : (p = t.childNodes, p.length ? (n >= p.length ? i.insertAfter(a, p[p.length - 1]) : t.insertBefore(a, p[n]), d.moveToElementText(a)) : t.canHaveHTML && (t.innerHTML = "<span>&#xFEFF;</span>", a = t.firstChild, d.moveToElementText(a), d.collapse(o)), r.setEndPoint(e ? "StartToStart" : "EndToEnd", d), i.remove(a))
                }
                var r, a, s, l, c, u, d, f = e.dom.doc,
                    h = f.body,
                    p, m;
                if (s = t.startContainer, l = t.startOffset, c = t.endContainer, u = t.endOffset, r = h.createTextRange(), s == c && 1 == s.nodeType) {
                    if (l == u && !s.hasChildNodes()) {
                        if (s.canHaveHTML) return d = s.previousSibling, d && !d.hasChildNodes() && i.isBlock(d) ? d.innerHTML = "&#xFEFF;" : d = null, s.innerHTML = "<span>&#xFEFF;</span><span>&#xFEFF;</span>", r.moveToElementText(s.lastChild), r.select(), i.doc.selection.clear(), s.innerHTML = "", void(d && (d.innerHTML = ""));
                        l = i.nodeIndex(s), s = s.parentNode
                    }
                    if (l == u - 1) try {
                        if (m = s.childNodes[l], a = h.createControlRange(), a.addElement(m), a.select(), p = e.getRng(), p.item && m === p.item(0)) return
                    } catch (g) {}
                }
                n(!0), n(), r.select()
            }, this.getRangeAt = n
        }
        return e
    }), r(B, [u], function(e) {
        return {
            BACKSPACE: 8,
            DELETE: 46,
            DOWN: 40,
            ENTER: 13,
            LEFT: 37,
            RIGHT: 39,
            SPACEBAR: 32,
            TAB: 9,
            UP: 38,
            modifierPressed: function(e) {
                return e.shiftKey || e.ctrlKey || e.altKey || this.metaKeyPressed(e)
            },
            metaKeyPressed: function(t) {
                return e.mac ? t.metaKey : t.ctrlKey && !t.altKey
            }
        }
    }), r(D, [B, d, u], function(e, t, n) {
        return function(r, i) {
            function o(e) {
                var t = i.settings.object_resizing;
                return t === !1 || n.iOS ? !1 : ("string" != typeof t && (t = "table,img,div"), "false" === e.getAttribute("data-mce-resize") ? !1 : i.dom.is(e, t))
            }

            function a(t) {
                var n, r, o, a, s;
                n = t.screenX - T, r = t.screenY - R, P = n * S[2] + D, O = r * S[3] + L, P = 5 > P ? 5 : P, O = 5 > O ? 5 : O, o = "IMG" == w.nodeName && i.settings.resize_img_proportional !== !1 ? !e.modifierPressed(t) : e.modifierPressed(t) || "IMG" == w.nodeName && S[2] * S[3] !== 0, o && (W(n) > W(r) ? (O = V(P * M), P = V(O / M)) : (P = V(O / M), O = V(P * M))), x.setStyles(_, {
                    width: P,
                    height: O
                }), a = S.startPos.x + n, s = S.startPos.y + r, a = a > 0 ? a : 0, s = s > 0 ? s : 0, x.setStyles(E, {
                    left: a,
                    top: s,
                    display: "block"
                }), E.innerHTML = P + " &times; " + O, S[2] < 0 && _.clientWidth <= P && x.setStyle(_, "left", A + (D - P)), S[3] < 0 && _.clientHeight <= O && x.setStyle(_, "top", B + (L - O)), n = U.scrollWidth - $, r = U.scrollHeight - q, n + r !== 0 && x.setStyles(E, {
                    left: a - n,
                    top: s - r
                }), H || (i.fire("ObjectResizeStart", {
                    target: w,
                    width: D,
                    height: L
                }), H = !0)
            }

            function s() {
                function e(e, t) {
                    t && (w.style[e] || !i.schema.isValid(w.nodeName.toLowerCase(), e) ? x.setStyle(w, e, t) : x.setAttrib(w, e, t))
                }
                H = !1, e("width", P), e("height", O), x.unbind(I, "mousemove", a), x.unbind(I, "mouseup", s), F != I && (x.unbind(F, "mousemove", a), x.unbind(F, "mouseup", s)), x.remove(_), x.remove(E), z && "TABLE" != w.nodeName || l(w), i.fire("ObjectResized", {
                    target: w,
                    width: P,
                    height: O
                }), x.setAttrib(w, "style", x.getAttrib(w, "style")), i.nodeChanged()
            }

            function l(e, t, r) {
                var l, u, d, f, h;
                g(), l = x.getPos(e, U), A = l.x, B = l.y, h = e.getBoundingClientRect(), u = h.width || h.right - h.left, d = h.height || h.bottom - h.top, w != e && (m(), w = e, P = O = 0), f = i.fire("ObjectSelected", {
                    target: e
                }), o(e) && !f.isDefaultPrevented() ? C(N, function(e, i) {
                    function o(t) {
                        T = t.screenX, R = t.screenY, D = w.clientWidth, L = w.clientHeight, M = L / D, S = e, e.startPos = {
                            x: u * e[0] + A,
                            y: d * e[1] + B
                        }, $ = U.scrollWidth, q = U.scrollHeight, _ = w.cloneNode(!0), x.addClass(_, "mce-clonedresizable"), x.setAttrib(_, "data-mce-bogus", "all"), _.contentEditable = !1, _.unSelectabe = !0, x.setStyles(_, {
                            left: A,
                            top: B,
                            margin: 0
                        }), _.removeAttribute("data-mce-selected"), U.appendChild(_), x.bind(I, "mousemove", a), x.bind(I, "mouseup", s), F != I && (x.bind(F, "mousemove", a), x.bind(F, "mouseup", s)), E = x.add(U, "div", {
                            "class": "mce-resize-helper",
                            "data-mce-bogus": "all"
                        }, D + " &times; " + L)
                    }
                    var l;
                    return t ? void(i == t && o(r)) : (l = x.get("mceResizeHandle" + i), l && x.remove(l), l = x.add(U, "div", {
                        id: "mceResizeHandle" + i,
                        "data-mce-bogus": "all",
                        "class": "mce-resizehandle",
                        unselectable: !0,
                        style: "cursor:" + i + "-resize; margin:0; padding:0"
                    }), n.ie && (l.contentEditable = !1), x.bind(l, "mousedown", function(e) {
                        e.stopImmediatePropagation(), e.preventDefault(), o(e)
                    }), e.elm = l, void x.setStyles(l, {
                        left: u * e[0] + A - l.offsetWidth / 2,
                        top: d * e[1] + B - l.offsetHeight / 2
                    }))
                }) : c(), w.setAttribute("data-mce-selected", "1")
            }

            function c() {
                var e, t;
                g(), w && w.removeAttribute("data-mce-selected");
                for (e in N) t = x.get("mceResizeHandle" + e), t && (x.unbind(t), x.remove(t))
            }

            function u(e) {
                function t(e, t) {
                    if (e)
                        do
                            if (e === t) return !0;
                        while (e = e.parentNode)
                }
                var n, o;
                if (!H && !i.removed) return C(x.select("img[data-mce-selected],hr[data-mce-selected]"), function(e) {
                    e.removeAttribute("data-mce-selected")
                }), o = "mousedown" == e.type ? e.target : r.getNode(), o = x.$(o).closest(z ? "table" : "table,img,hr")[0], t(o, U) && (v(), n = r.getStart(!0), t(n, o) && t(r.getEnd(!0), o) && (!z || o != n && "IMG" !== n.nodeName)) ? void l(o) : void c()
            }

            function d(e, t, n) {
                e && e.attachEvent && e.attachEvent("on" + t, n)
            }

            function f(e, t, n) {
                e && e.detachEvent && e.detachEvent("on" + t, n)
            }

            function h(e) {
                var t = e.srcElement,
                    n, r, o, a, s, c, u;
                n = t.getBoundingClientRect(), c = k.clientX - n.left, u = k.clientY - n.top;
                for (r in N)
                    if (o = N[r], a = t.offsetWidth * o[0], s = t.offsetHeight * o[1], W(a - c) < 8 && W(s - u) < 8) {
                        S = o;
                        break
                    }
                H = !0, i.fire("ObjectResizeStart", {
                    target: w,
                    width: w.clientWidth,
                    height: w.clientHeight
                }), i.getDoc().selection.empty(), l(t, r, k)
            }

            function p(e) {
                var t = e.srcElement;
                if (t != w) {
                    if (i.fire("ObjectSelected", {
                            target: t
                        }), m(), 0 === t.id.indexOf("mceResizeHandle")) return void(e.returnValue = !1);
                    ("IMG" == t.nodeName || "TABLE" == t.nodeName) && (c(), w = t, d(t, "resizestart", h))
                }
            }

            function m() {
                f(w, "resizestart", h)
            }

            function g() {
                for (var e in N) {
                    var t = N[e];
                    t.elm && (x.unbind(t.elm), delete t.elm)
                }
            }

            function v() {
                try {
                    i.getDoc().execCommand("enableObjectResizing", !1, !1)
                } catch (e) {}
            }

            function y(e) {
                var t;
                if (z) {
                    t = I.body.createControlRange();
                    try {
                        return t.addElement(e), t.select(), !0
                    } catch (n) {}
                }
            }

            function b() {
                w = _ = null, z && (m(), f(U, "controlselect", p))
            }
            var x = i.dom,
                C = t.each,
                w, _, E, N, S, k, T, R, A, B, D, L, M, H, P, O, I = i.getDoc(),
                F = document,
                z = n.ie && n.ie < 11,
                W = Math.abs,
                V = Math.round,
                U = i.getBody(),
                $, q;
            N = {
                nw: [0, 0, -1, -1],
                ne: [1, 0, 1, -1],
                se: [1, 1, 1, 1],
                sw: [0, 1, -1, 1]
            };
            var j = ".mce-content-body";
            return i.contentStyles.push(j + " div.mce-resizehandle {position: absolute;border: 1px solid black;background: #FFF;width: 7px;height: 7px;z-index: 10000}" + j + " .mce-resizehandle:hover {background: #000}" + j + " img[data-mce-selected], hr[data-mce-selected] {outline: 1px solid black;resize: none}" + j + " .mce-clonedresizable {position: absolute;" + (n.gecko ? "" : "outline: 1px dashed black;") + "opacity: .5;filter: alpha(opacity=50);z-index: 10000}" + j + " .mce-resize-helper {background: #555;background: rgba(0,0,0,0.75);border-radius: 3px;border: 1px;color: white;display: none;font-family: sans-serif;font-size: 12px;white-space: nowrap;line-height: 14px;margin: 5px 10px;padding: 5px;position: absolute;z-index: 10001}"), i.on("init", function() {
                z ? (i.on("ObjectResized", function(e) {
                    "TABLE" != e.target.nodeName && (c(), y(e.target))
                }), d(U, "controlselect", p), i.on("mousedown", function(e) {
                    k = e
                })) : (v(), n.ie >= 11 && (i.on("mouseup", function(e) {
                    var t = e.target.nodeName;
                    !H && /^(TABLE|IMG|HR)$/.test(t) && (i.selection.select(e.target, "TABLE" == t), i.nodeChanged())
                }), i.dom.bind(U, "mscontrolselect", function(e) {
                    /^(TABLE|IMG|HR)$/.test(e.target.nodeName) && (e.preventDefault(), "IMG" == e.target.tagName && window.setTimeout(function() {
                        i.selection.select(e.target)
                    }, 0))
                }))), i.on("nodechange ResizeEditor ResizeWindow", function(e) {
                    window.requestAnimationFrame ? window.requestAnimationFrame(function() {
                        u(e)
                    }) : u(e)
                }), i.on("keydown keyup", function(e) {
                    w && "TABLE" == w.nodeName && u(e)
                }), i.on("hide", c)
            }), i.on("remove", g), {
                isResizable: o,
                showResizeRect: l,
                hideResizeRect: c,
                updateResizeRect: u,
                controlSelect: y,
                destroy: b
            }
        }
    }), r(L, [u, d], function(e, t) {
        function n(n) {
            var r = n.dom;
            this.getBookmark = function(e, i) {
                function o(e, n) {
                    var i = 0;
                    return t.each(r.select(e), function(e, t) {
                        e == n && (i = t)
                    }), i
                }

                function a(e) {
                    function t(t) {
                        var n, r, i, o = t ? "start" : "end";
                        n = e[o + "Container"], r = e[o + "Offset"], 1 == n.nodeType && "TR" == n.nodeName && (i = n.childNodes, n = i[Math.min(t ? r : r - 1, i.length - 1)], n && (r = t ? 0 : n.childNodes.length, e["set" + (t ? "Start" : "End")](n, r)))
                    }
                    return t(!0), t(), e
                }

                function s() {
                    function e(e, t) {
                        var n = e[t ? "startContainer" : "endContainer"],
                            a = e[t ? "startOffset" : "endOffset"],
                            s = [],
                            l, c, u = 0;
                        if (3 == n.nodeType) {
                            if (i)
                                for (l = n.previousSibling; l && 3 == l.nodeType; l = l.previousSibling) a += l.nodeValue.length;
                            s.push(a)
                        } else c = n.childNodes, a >= c.length && c.length && (u = 1, a = Math.max(0, c.length - 1)), s.push(r.nodeIndex(c[a], i) + u);
                        for (; n && n != o; n = n.parentNode) s.push(r.nodeIndex(n, i));
                        return s
                    }
                    var t = n.getRng(!0),
                        o = r.getRoot(),
                        a = {};
                    return a.start = e(t, !0), n.isCollapsed() || (a.end = e(t)), a
                }
                var l, c, u, d, f, h, p = "&#xFEFF;",
                    m;
                if (2 == e) return h = n.getNode(), f = h ? h.nodeName : null, "IMG" == f ? {
                    name: f,
                    index: o(f, h)
                } : n.tridentSel ? n.tridentSel.getBookmark(e) : s();
                if (e) return {
                    rng: n.getRng()
                };
                if (l = n.getRng(), u = r.uniqueId(), d = n.isCollapsed(), m = "overflow:hidden;line-height:0px", l.duplicate || l.item) {
                    if (l.item) return h = l.item(0), f = h.nodeName, {
                        name: f,
                        index: o(f, h)
                    };
                    c = l.duplicate();
                    try {
                        l.collapse(), l.pasteHTML('<span data-mce-type="bookmark" id="' + u + '_start" style="' + m + '">' + p + "</span>"), d || (c.collapse(!1), l.moveToElementText(c.parentElement()), 0 === l.compareEndPoints("StartToEnd", c) && c.move("character", -1), c.pasteHTML('<span data-mce-type="bookmark" id="' + u + '_end" style="' + m + '">' + p + "</span>"))
                    } catch (g) {
                        return null
                    }
                } else {
                    if (h = n.getNode(), f = h.nodeName, "IMG" == f) return {
                        name: f,
                        index: o(f, h)
                    };
                    c = a(l.cloneRange()), d || (c.collapse(!1), c.insertNode(r.create("span", {
                        "data-mce-type": "bookmark",
                        id: u + "_end",
                        style: m
                    }, p))), l = a(l), l.collapse(!0), l.insertNode(r.create("span", {
                        "data-mce-type": "bookmark",
                        id: u + "_start",
                        style: m
                    }, p))
                }
                return n.moveToBookmark({
                    id: u,
                    keep: 1
                }), {
                    id: u
                }
            }, this.moveToBookmark = function(i) {
                function o(e) {
                    var t = i[e ? "start" : "end"],
                        n, r, o, a;
                    if (t) {
                        for (o = t[0], r = c, n = t.length - 1; n >= 1; n--) {
                            if (a = r.childNodes, t[n] > a.length - 1) return;
                            r = a[t[n]]
                        }
                        3 === r.nodeType && (o = Math.min(t[0], r.nodeValue.length)), 1 === r.nodeType && (o = Math.min(t[0], r.childNodes.length)), e ? l.setStart(r, o) : l.setEnd(r, o)
                    }
                    return !0
                }

                function a(n) {
                    var o = r.get(i.id + "_" + n),
                        a, s, l, c, p = i.keep;
                    if (o && (a = o.parentNode, "start" == n ? (p ? (a = o.firstChild, s = 1) : s = r.nodeIndex(o), u = d = a, f = h = s) : (p ? (a = o.firstChild, s = 1) : s = r.nodeIndex(o), d = a, h = s), !p)) {
                        for (c = o.previousSibling, l = o.nextSibling, t.each(t.grep(o.childNodes), function(e) {
                            3 == e.nodeType && (e.nodeValue = e.nodeValue.replace(/\uFEFF/g, ""))
                        }); o = r.get(i.id + "_" + n);) r.remove(o, 1);
                        c && l && c.nodeType == l.nodeType && 3 == c.nodeType && !e.opera && (s = c.nodeValue.length, c.appendData(l.nodeValue), r.remove(l), "start" == n ? (u = d = c, f = h = s) : (d = c, h = s))
                    }
                }

                function s(t) {
                    return !r.isBlock(t) || t.innerHTML || e.ie || (t.innerHTML = '<br data-mce-bogus="1" />'), t
                }
                var l, c, u, d, f, h;
                if (i)
                    if (i.start) {
                        if (l = r.createRng(), c = r.getRoot(), n.tridentSel) return n.tridentSel.moveToBookmark(i);
                        o(!0) && o() && n.setRng(l)
                    } else i.id ? (a("start"), a("end"), u && (l = r.createRng(), l.setStart(s(u), f), l.setEnd(s(d), h), n.setRng(l))) : i.name ? n.select(r.select(i.name)[i.index]) : i.rng && n.setRng(i.rng)
            }
        }
        return n.isBookmarkNode = function(e) {
            return e && "SPAN" === e.tagName && "bookmark" === e.getAttribute("data-mce-type")
        }, n
    }), r(M, [p, A, D, C, L, u, d], function(e, n, r, i, o, a, s) {
        function l(e, t, i, a) {
            var s = this;
            s.dom = e, s.win = t, s.serializer = i, s.editor = a, s.bookmarkManager = new o(s), s.controlSelection = new r(s, a), s.win.getSelection || (s.tridentSel = new n(s))
        }
        var c = s.each,
            u = s.trim,
            d = a.ie;
        return l.prototype = {
            setCursorLocation: function(e, t) {
                var n = this,
                    r = n.dom.createRng();
                e ? (r.setStart(e, t), r.setEnd(e, t), n.setRng(r), n.collapse(!1)) : (n._moveEndPoint(r, n.editor.getBody(), !0), n.setRng(r))
            },
            getContent: function(e) {
                var n = this,
                    r = n.getRng(),
                    i = n.dom.create("body"),
                    o = n.getSel(),
                    a, s, l;
                return e = e || {}, a = s = "", e.get = !0, e.format = e.format || "html", e.selection = !0, n.editor.fire("BeforeGetContent", e), "text" == e.format ? n.isCollapsed() ? "" : r.text || (o.toString ? o.toString() : "") : (r.cloneContents ? (l = r.cloneContents(), l && i.appendChild(l)) : r.item !== t || r.htmlText !== t ? (i.innerHTML = "<br>" + (r.item ? r.item(0).outerHTML : r.htmlText), i.removeChild(i.firstChild)) : i.innerHTML = r.toString(), /^\s/.test(i.innerHTML) && (a = " "), /\s+$/.test(i.innerHTML) && (s = " "), e.getInner = !0, e.content = n.isCollapsed() ? "" : a + n.serializer.serialize(i, e) + s, n.editor.fire("GetContent", e), e.content)
            },
            setContent: function(e, t) {
                var n = this,
                    r = n.getRng(),
                    i, o = n.win.document,
                    a, s;
                if (t = t || {
                        format: "html"
                    }, t.set = !0, t.selection = !0, e = t.content = e, t.no_events || n.editor.fire("BeforeSetContent", t), e = t.content, r.insertNode) {
                    e += '<span id="__caret">_</span>', r.startContainer == o && r.endContainer == o ? o.body.innerHTML = e : (r.deleteContents(), 0 === o.body.childNodes.length ? o.body.innerHTML = e : r.createContextualFragment ? r.insertNode(r.createContextualFragment(e)) : (a = o.createDocumentFragment(), s = o.createElement("div"), a.appendChild(s), s.outerHTML = e, r.insertNode(a))), i = n.dom.get("__caret"), r = o.createRange(), r.setStartBefore(i), r.setEndBefore(i), n.setRng(r), n.dom.remove("__caret");
                    try {
                        n.setRng(r)
                    } catch (l) {}
                } else r.item && (o.execCommand("Delete", !1, null), r = n.getRng()), /^\s+/.test(e) ? (r.pasteHTML('<span id="__mce_tmp">_</span>' + e), n.dom.remove("__mce_tmp")) : r.pasteHTML(e);
                t.no_events || n.editor.fire("SetContent", t)
            },
            getStart: function(e) {
                var t = this,
                    n = t.getRng(),
                    r, i, o, a;
                if (n.duplicate || n.item) {
                    if (n.item) return n.item(0);
                    for (o = n.duplicate(), o.collapse(1), r = o.parentElement(), r.ownerDocument !== t.dom.doc && (r = t.dom.getRoot()), i = a = n.parentElement(); a = a.parentNode;)
                        if (a == r) {
                            r = i;
                            break
                        }
                    return r
                }
                return r = n.startContainer, 1 == r.nodeType && r.hasChildNodes() && (e && n.collapsed || (r = r.childNodes[Math.min(r.childNodes.length - 1, n.startOffset)])), r && 3 == r.nodeType ? r.parentNode : r
            },
            getEnd: function(e) {
                var t = this,
                    n = t.getRng(),
                    r, i;
                return n.duplicate || n.item ? n.item ? n.item(0) : (n = n.duplicate(), n.collapse(0), r = n.parentElement(), r.ownerDocument !== t.dom.doc && (r = t.dom.getRoot()), r && "BODY" == r.nodeName ? r.lastChild || r : r) : (r = n.endContainer, i = n.endOffset, 1 == r.nodeType && r.hasChildNodes() && (e && n.collapsed || (r = r.childNodes[i > 0 ? i - 1 : i])), r && 3 == r.nodeType ? r.parentNode : r)
            },
            getBookmark: function(e, t) {
                return this.bookmarkManager.getBookmark(e, t)
            },
            moveToBookmark: function(e) {
                return this.bookmarkManager.moveToBookmark(e)
            },
            select: function(e, t) {
                var n = this,
                    r = n.dom,
                    i = r.createRng(),
                    o;
                if (n.lastFocusBookmark = null, e) {
                    if (!t && n.controlSelection.controlSelect(e)) return;
                    o = r.nodeIndex(e), i.setStart(e.parentNode, o), i.setEnd(e.parentNode, o + 1), t && (n._moveEndPoint(i, e, !0), n._moveEndPoint(i, e)), n.setRng(i)
                }
                return e
            },
            isCollapsed: function() {
                var e = this,
                    t = e.getRng(),
                    n = e.getSel();
                return !t || t.item ? !1 : t.compareEndPoints ? 0 === t.compareEndPoints("StartToEnd", t) : !n || t.collapsed
            },
            collapse: function(e) {
                var t = this,
                    n = t.getRng(),
                    r;
                n.item && (r = n.item(0), n = t.win.document.body.createTextRange(), n.moveToElementText(r)), n.collapse(!!e), t.setRng(n)
            },
            getSel: function() {
                var e = this.win;
                return e.getSelection ? e.getSelection() : e.document.selection
            },
            getRng: function(e) {
                function t(e, t, n) {
                    try {
                        return t.compareBoundaryPoints(e, n)
                    } catch (r) {
                        return -1
                    }
                }
                var n = this,
                    r, i, o, a = n.win.document,
                    s;
                if (!e && n.lastFocusBookmark) {
                    var l = n.lastFocusBookmark;
                    return l.startContainer ? (i = a.createRange(), i.setStart(l.startContainer, l.startOffset), i.setEnd(l.endContainer, l.endOffset)) : i = l, i
                }
                if (e && n.tridentSel) return n.tridentSel.getRangeAt(0);
                try {
                    (r = n.getSel()) && (i = r.rangeCount > 0 ? r.getRangeAt(0) : r.createRange ? r.createRange() : a.createRange())
                } catch (c) {}
                if (d && i && i.setStart && a.selection) {
                    try {
                        s = a.selection.createRange()
                    } catch (c) {}
                    s && s.item && (o = s.item(0), i = a.createRange(), i.setStartBefore(o), i.setEndAfter(o))
                }
                return i || (i = a.createRange ? a.createRange() : a.body.createTextRange()), i.setStart && 9 === i.startContainer.nodeType && i.collapsed && (o = n.dom.getRoot(), i.setStart(o, 0), i.setEnd(o, 0)), n.selectedRange && n.explicitRange && (0 === t(i.START_TO_START, i, n.selectedRange) && 0 === t(i.END_TO_END, i, n.selectedRange) ? i = n.explicitRange : (n.selectedRange = null, n.explicitRange = null)), i
            },
            setRng: function(e, t) {
                var n = this,
                    r, i;
                if (e)
                    if (e.select) try {
                        e.select()
                    } catch (o) {} else if (n.tridentSel) {
                        if (e.cloneRange) try {
                            return void n.tridentSel.addRange(e)
                        } catch (o) {}
                    } else {
                        if (r = n.getSel()) {
                            n.explicitRange = e;
                            try {
                                r.removeAllRanges(), r.addRange(e)
                            } catch (o) {}
                            t === !1 && r.extend && (r.collapse(e.endContainer, e.endOffset), r.extend(e.startContainer, e.startOffset)), n.selectedRange = r.rangeCount > 0 ? r.getRangeAt(0) : null
                        }!e.collapsed && e.startContainer == e.endContainer && r.setBaseAndExtent && e.endOffset - e.startOffset < 2 && e.startContainer.hasChildNodes() && (i = e.startContainer.childNodes[e.startOffset], i && "IMG" == i.tagName && n.getSel().setBaseAndExtent(i, 0, i, 1))
                    }
            },
            setNode: function(e) {
                var t = this;
                return t.setContent(t.dom.getOuterHTML(e)), e
            },
            getNode: function() {
                function e(e, t) {
                    for (var n = e; e && 3 === e.nodeType && 0 === e.length;) e = t ? e.nextSibling : e.previousSibling;
                    return e || n
                }
                var t = this,
                    n = t.getRng(),
                    r, i = n.startContainer,
                    o = n.endContainer,
                    a = n.startOffset,
                    s = n.endOffset,
                    l = t.dom.getRoot();
                return n ? n.setStart ? (r = n.commonAncestorContainer, !n.collapsed && (i == o && 2 > s - a && i.hasChildNodes() && (r = i.childNodes[a]), 3 === i.nodeType && 3 === o.nodeType && (i = i.length === a ? e(i.nextSibling, !0) : i.parentNode, o = 0 === s ? e(o.previousSibling, !1) : o.parentNode, i && i === o)) ? i : r && 3 == r.nodeType ? r.parentNode : r) : (r = n.item ? n.item(0) : n.parentElement(), r.ownerDocument !== t.win.document && (r = l), r) : l
            },
            getSelectedBlocks: function(t, n) {
                var r = this,
                    i = r.dom,
                    o, a, s = [];
                if (a = i.getRoot(), t = i.getParent(t || r.getStart(), i.isBlock), n = i.getParent(n || r.getEnd(), i.isBlock), t && t != a && s.push(t), t && n && t != n) {
                    o = t;
                    for (var l = new e(t, a);
                         (o = l.next()) && o != n;) i.isBlock(o) && s.push(o)
                }
                return n && t != n && n != a && s.push(n), s
            },
            isForward: function() {
                var e = this.dom,
                    t = this.getSel(),
                    n, r;
                return t && t.anchorNode && t.focusNode ? (n = e.createRng(), n.setStart(t.anchorNode, t.anchorOffset), n.collapse(!0), r = e.createRng(), r.setStart(t.focusNode, t.focusOffset), r.collapse(!0), n.compareBoundaryPoints(n.START_TO_START, r) <= 0) : !0
            },
            normalize: function() {
                var e = this,
                    t = e.getRng();
                return a.range && new i(e.dom).normalize(t) && e.setRng(t, e.isForward()), t
            },
            selectorChanged: function(e, t) {
                var n = this,
                    r;
                return n.selectorChangedData || (n.selectorChangedData = {}, r = {}, n.editor.on("NodeChange", function(e) {
                    var t = e.element,
                        i = n.dom,
                        o = i.getParents(t, null, i.getRoot()),
                        a = {};
                    c(n.selectorChangedData, function(e, t) {
                        c(o, function(n) {
                            return i.is(n, t) ? (r[t] || (c(e, function(e) {
                                e(!0, {
                                    node: n,
                                    selector: t,
                                    parents: o
                                })
                            }), r[t] = e), a[t] = e, !1) : void 0
                        })
                    }), c(r, function(e, n) {
                        a[n] || (delete r[n], c(e, function(e) {
                            e(!1, {
                                node: t,
                                selector: n,
                                parents: o
                            })
                        }))
                    })
                })), n.selectorChangedData[e] || (n.selectorChangedData[e] = []), n.selectorChangedData[e].push(t), n
            },
            getScrollContainer: function() {
                for (var e, t = this.dom.getRoot(); t && "BODY" != t.nodeName;) {
                    if (t.scrollHeight > t.clientHeight) {
                        e = t;
                        break
                    }
                    t = t.parentNode
                }
                return e
            },
            scrollIntoView: function(e) {
                function t(e) {
                    for (var t = 0, n = 0, r = e; r && r.nodeType;) t += r.offsetLeft || 0, n += r.offsetTop || 0, r = r.offsetParent;
                    return {
                        x: t,
                        y: n
                    }
                }
                var n, r, i = this,
                    o = i.dom,
                    a = o.getRoot(),
                    s, l;
                if ("BODY" != a.nodeName) {
                    var c = i.getScrollContainer();
                    if (c) return n = t(e).y - t(c).y, l = c.clientHeight, s = c.scrollTop, void((s > n || n + 25 > s + l) && (c.scrollTop = s > n ? n : n - l + 25))
                }
                r = o.getViewPort(i.editor.getWin()), n = o.getPos(e).y, s = r.y, l = r.h, (n < r.y || n + 25 > s + l) && i.editor.getWin().scrollTo(0, s > n ? n : n - l + 25)
            },
            placeCaretAt: function(e, t) {
                var n = this.editor.getDoc(),
                    r, i;
                if (n.caretPositionFromPoint) i = n.caretPositionFromPoint(e, t), r = n.createRange(), r.setStart(i.offsetNode, i.offset), r.collapse(!0);
                else if (n.caretRangeFromPoint) r = n.caretRangeFromPoint(e, t);
                else if (n.body.createTextRange) {
                    r = n.body.createTextRange();
                    try {
                        r.moveToPoint(e, t), r.collapse(!0)
                    } catch (o) {
                        r.collapse(t < n.body.clientHeight)
                    }
                }
                this.setRng(r)
            },
            _moveEndPoint: function(t, n, r) {
                var i = n,
                    o = new e(n, i),
                    s = this.dom.schema.getNonEmptyElements();
                do {
                    if (3 == n.nodeType && 0 !== u(n.nodeValue).length) return void(r ? t.setStart(n, 0) : t.setEnd(n, n.nodeValue.length));
                    if (s[n.nodeName] && !/^(TD|TH)$/.test(n.nodeName)) return void(r ? t.setStartBefore(n) : "BR" == n.nodeName ? t.setEndBefore(n) : t.setEndAfter(n));
                    if (a.ie && a.ie < 11 && this.dom.isBlock(n) && this.dom.isEmpty(n)) return void(r ? t.setStart(n, 0) : t.setEnd(n, 0))
                } while (n = r ? o.next() : o.prev());
                "BODY" == i.nodeName && (r ? t.setStart(i, 0) : t.setEnd(i, i.childNodes.length))
            },
            destroy: function() {
                this.win = null, this.controlSelection.destroy()
            }
        }, l
    }), r(H, [L, d], function(e, t) {
        function n(t) {
            this.compare = function(n, i) {
                function o(e) {
                    var n = {};
                    return r(t.getAttribs(e), function(r) {
                        var i = r.nodeName.toLowerCase();
                        0 !== i.indexOf("_") && "style" !== i && "data-mce-style" !== i && (n[i] = t.getAttrib(e, i))
                    }), n
                }

                function a(e, t) {
                    var n, r;
                    for (r in e)
                        if (e.hasOwnProperty(r)) {
                            if (n = t[r], "undefined" == typeof n) return !1;
                            if (e[r] != n) return !1;
                            delete t[r]
                        }
                    for (r in t)
                        if (t.hasOwnProperty(r)) return !1;
                    return !0
                }
                return n.nodeName != i.nodeName ? !1 : a(o(n), o(i)) && a(t.parseStyle(t.getAttrib(n, "style")), t.parseStyle(t.getAttrib(i, "style"))) ? !e.isBookmarkNode(n) && !e.isBookmarkNode(i) : !1
            }
        }
        var r = t.each;
        return n
    }), r(P, [d], function(e) {
        function t(e, t) {
            function r(e) {
                return e.replace(/%(\w+)/g, "")
            }
            var i, o, a = e.dom,
                s = "",
                l, c;
            if (c = e.settings.preview_styles, c === !1) return "";
            if (c || (c = "font-family font-size font-weight font-style text-decoration text-transform color background-color border border-radius outline text-shadow"), "string" == typeof t) {
                if (t = e.formatter.get(t), !t) return;
                t = t[0]
            }
            return i = t.block || t.inline || "span", o = a.create(i), n(t.styles, function(e, t) {
                e = r(e), e && a.setStyle(o, t, e)
            }), n(t.attributes, function(e, t) {
                e = r(e), e && a.setAttrib(o, t, e)
            }), n(t.classes, function(e) {
                e = r(e), a.hasClass(o, e) || a.addClass(o, e)
            }), e.fire("PreviewFormats"), a.setStyles(o, {
                position: "absolute",
                left: -65535
            }), e.getBody().appendChild(o), l = a.getStyle(e.getBody(), "fontSize", !0), l = /px$/.test(l) ? parseInt(l, 10) : 0, n(c.split(" "), function(t) {
                var n = a.getStyle(o, t, !0);
                if (!("background-color" == t && /transparent|rgba\s*\([^)]+,\s*0\)/.test(n) && (n = a.getStyle(e.getBody(), t, !0), "#ffffff" == a.toHex(n).toLowerCase()) || "color" == t && "#000000" == a.toHex(n).toLowerCase())) {
                    if ("font-size" == t && /em|%$/.test(n)) {
                        if (0 === l) return;
                        n = parseFloat(n, 10) / (/%$/.test(n) ? 100 : 1), n = n * l + "px"
                    }
                    "border" == t && n && (s += "padding:0 2px;"), s += t + ":" + n + ";"
                }
            }), e.fire("AfterPreviewFormats"), a.remove(o), s
        }
        var n = e.each;
        return {
            getCssText: t
        }
    }), r(O, [p, C, L, H, d, P], function(e, t, n, r, i, o) {
        return function(a) {
            function s(e) {
                return e.nodeType && (e = e.nodeName), !!a.schema.getTextBlockElements()[e.toLowerCase()]
            }

            function l(e) {
                return /^(TH|TD)$/.test(e.nodeName)
            }

            function c(e) {
                return e && /^(IMG)$/.test(e.nodeName)
            }

            function u(e, t) {
                return q.getParents(e, t, q.getRoot())
            }

            function d(e) {
                return 1 === e.nodeType && "_mce_caret" === e.id
            }

            function f() {
                m({
                    valigntop: [{
                        selector: "td,th",
                        styles: {
                            verticalAlign: "top"
                        }
                    }],
                    valignmiddle: [{
                        selector: "td,th",
                        styles: {
                            verticalAlign: "middle"
                        }
                    }],
                    valignbottom: [{
                        selector: "td,th",
                        styles: {
                            verticalAlign: "bottom"
                        }
                    }],
                    alignleft: [{
                        selector: "figure,p,h1,h2,h3,h4,h5,h6,td,th,tr,div,ul,ol,li",
                        styles: {
                            textAlign: "left"
                        },
                        defaultBlock: "div"
                    }, {
                        selector: "img,table",
                        collapsed: !1,
                        styles: {
                            "float": "left"
                        }
                    }],
                    aligncenter: [{
                        selector: "figure,p,h1,h2,h3,h4,h5,h6,td,th,tr,div,ul,ol,li",
                        styles: {
                            textAlign: "center"
                        },
                        defaultBlock: "div"
                    }, {
                        selector: "img",
                        collapsed: !1,
                        styles: {
                            display: "block",
                            marginLeft: "auto",
                            marginRight: "auto"
                        }
                    }, {
                        selector: "table",
                        collapsed: !1,
                        styles: {
                            marginLeft: "auto",
                            marginRight: "auto"
                        }
                    }],
                    alignright: [{
                        selector: "figure,p,h1,h2,h3,h4,h5,h6,td,th,tr,div,ul,ol,li",
                        styles: {
                            textAlign: "right"
                        },
                        defaultBlock: "div"
                    }, {
                        selector: "img,table",
                        collapsed: !1,
                        styles: {
                            "float": "right"
                        }
                    }],
                    alignjustify: [{
                        selector: "figure,p,h1,h2,h3,h4,h5,h6,td,th,tr,div,ul,ol,li",
                        styles: {
                            textAlign: "justify"
                        },
                        defaultBlock: "div"
                    }],
                    bold: [{
                        inline: "strong",
                        remove: "all"
                    }, {
                        inline: "span",
                        styles: {
                            fontWeight: "bold"
                        }
                    }, {
                        inline: "b",
                        remove: "all"
                    }],
                    italic: [{
                        inline: "em",
                        remove: "all"
                    }, {
                        inline: "span",
                        styles: {
                            fontStyle: "italic"
                        }
                    }, {
                        inline: "i",
                        remove: "all"
                    }],
                    underline: [{
                        inline: "span",
                        styles: {
                            textDecoration: "underline"
                        },
                        exact: !0
                    }, {
                        inline: "u",
                        remove: "all"
                    }],
                    strikethrough: [{
                        inline: "span",
                        styles: {
                            textDecoration: "line-through"
                        },
                        exact: !0
                    }, {
                        inline: "strike",
                        remove: "all"
                    }],
                    forecolor: {
                        inline: "span",
                        styles: {
                            color: "%value"
                        },
                        links: !0,
                        remove_similar: !0
                    },
                    hilitecolor: {
                        inline: "span",
                        styles: {
                            backgroundColor: "%value"
                        },
                        links: !0,
                        remove_similar: !0
                    },
                    fontname: {
                        inline: "span",
                        styles: {
                            fontFamily: "%value"
                        }
                    },
                    fontsize: {
                        inline: "span",
                        styles: {
                            fontSize: "%value"
                        }
                    },
                    fontsize_class: {
                        inline: "span",
                        attributes: {
                            "class": "%value"
                        }
                    },
                    blockquote: {
                        block: "blockquote",
                        wrapper: 1,
                        remove: "all"
                    },
                    subscript: {
                        inline: "sub"
                    },
                    superscript: {
                        inline: "sup"
                    },
                    code: {
                        inline: "code"
                    },
                    link: {
                        inline: "a",
                        selector: "a",
                        remove: "all",
                        split: !0,
                        deep: !0,
                        onmatch: function() {
                            return !0
                        },
                        onformat: function(e, t, n) {
                            le(n, function(t, n) {
                                q.setAttrib(e, n, t)
                            })
                        }
                    },
                    removeformat: [{
                        selector: "b,strong,em,i,font,u,strike,sub,sup,dfn,code,samp,kbd,var,cite,mark,q,del,ins",
                        remove: "all",
                        split: !0,
                        expand: !1,
                        block_expand: !0,
                        deep: !0
                    }, {
                        selector: "span",
                        attributes: ["style", "class"],
                        remove: "empty",
                        split: !0,
                        expand: !1,
                        deep: !0
                    }, {
                        selector: "*",
                        attributes: ["style", "class"],
                        split: !1,
                        expand: !1,
                        deep: !0
                    }]
                }), le("p h1 h2 h3 h4 h5 h6 div address pre div dt dd samp".split(/\s/), function(e) {
                    m(e, {
                        block: e,
                        remove: "all"
                    })
                }), m(a.settings.formats)
            }

            function h() {
                a.addShortcut("meta+b", "bold_desc", "Bold"), a.addShortcut("meta+i", "italic_desc", "Italic"), a.addShortcut("meta+u", "underline_desc", "Underline");
                for (var e = 1; 6 >= e; e++) a.addShortcut("access+" + e, "", ["FormatBlock", !1, "h" + e]);
                a.addShortcut("access+7", "", ["FormatBlock", !1, "p"]), a.addShortcut("access+8", "", ["FormatBlock", !1, "div"]), a.addShortcut("access+9", "", ["FormatBlock", !1, "address"])
            }

            function p(e) {
                return e ? $[e] : $
            }

            function m(e, t) {
                e && ("string" != typeof e ? le(e, function(e, t) {
                    m(t, e)
                }) : (t = t.length ? t : [t], le(t, function(e) {
                    e.deep === re && (e.deep = !e.selector), e.split === re && (e.split = !e.selector || e.inline), e.remove === re && e.selector && !e.inline && (e.remove = "none"), e.selector && e.inline && (e.mixed = !0, e.block_expand = !0), "string" == typeof e.classes && (e.classes = e.classes.split(/\s+/))
                }), $[e] = t))
            }

            function g(e) {
                return e && $[e] && delete $[e], $
            }

            function v(e) {
                var t;
                return a.dom.getParent(e, function(e) {
                    return t = a.dom.getStyle(e, "text-decoration"), t && "none" !== t
                }), t
            }

            function y(e) {
                var t;
                1 === e.nodeType && e.parentNode && 1 === e.parentNode.nodeType && (t = v(e.parentNode), a.dom.getStyle(e, "color") && t ? a.dom.setStyle(e, "text-decoration", t) : a.dom.getStyle(e, "text-decoration") === t && a.dom.setStyle(e, "text-decoration", null))
            }

            function b(t, n, r) {
                function i(e, t) {
                    if (t = t || u, e) {
                        if (t.onformat && t.onformat(e, t, n, r), le(t.styles, function(t, r) {
                                q.setStyle(e, r, D(t, n))
                            }), t.styles) {
                            var i = q.getAttrib(e, "style");
                            i && e.setAttribute("data-mce-style", i)
                        }
                        le(t.attributes, function(t, r) {
                            q.setAttrib(e, r, D(t, n))
                        }), le(t.classes, function(t) {
                            t = D(t, n), q.hasClass(e, t) || q.addClass(e, t)
                        })
                    }
                }

                function o() {
                    function t(t, n) {
                        var i = new e(n);
                        for (r = i.current(); r; r = i.prev())
                            if (r.childNodes.length > 1 || r == t || "BR" == r.tagName) return r
                    }
                    var n = a.selection.getRng(),
                        i = n.startContainer,
                        o = n.endContainer;
                    if (i != o && 0 === n.endOffset) {
                        var s = t(i, o),
                            l = 3 == s.nodeType ? s.length : s.childNodes.length;
                        n.setEnd(s, l)
                    }
                    return n
                }

                function l(e, r, o) {
                    var a = [],
                        l, f, h = !0;
                    l = u.inline || u.block, f = q.create(l), i(f), K.walk(e, function(e) {
                        function r(e) {
                            var g, v, y, b, x;
                            return x = h, g = e.nodeName.toLowerCase(), v = e.parentNode.nodeName.toLowerCase(), 1 === e.nodeType && ie(e) && (x = h, h = "true" === ie(e), b = !0), R(g, "br") ? (p = 0, void(u.block && q.remove(e))) : u.wrapper && w(e, t, n) ? void(p = 0) : h && !b && u.block && !u.wrapper && s(g) && Y(v, l) ? (e = q.rename(e, l), i(e), a.push(e), void(p = 0)) : u.selector && (le(c, function(t) {
                                "collapsed" in t && t.collapsed !== m || q.is(e, t.selector) && !d(e) && (i(e, t), y = !0)
                            }), !u.inline || y) ? void(p = 0) : void(!h || b || !Y(l, g) || !Y(v, l) || !o && 3 === e.nodeType && 1 === e.nodeValue.length && 65279 === e.nodeValue.charCodeAt(0) || d(e) || u.inline && G(e) ? (p = 0, le(ce(e.childNodes), r), b && (h = x), p = 0) : (p || (p = q.clone(f, ee), e.parentNode.insertBefore(p, e), a.push(p)), p.appendChild(e)))
                        }
                        var p;
                        le(e, r)
                    }), u.links === !0 && le(a, function(e) {
                        function t(e) {
                            "A" === e.nodeName && i(e, u), le(ce(e.childNodes), t)
                        }
                        t(e)
                    }), le(a, function(e) {
                        function r(e) {
                            var t = 0;
                            return le(e.childNodes, function(e) {
                                L(e) || se(e) || t++
                            }), t
                        }

                        function o(e) {
                            var t, n;
                            return le(e.childNodes, function(e) {
                                return 1 != e.nodeType || se(e) || d(e) ? void 0 : (t = e, ee)
                            }), t && !se(t) && T(t, u) && (n = q.clone(t, ee), i(n), q.replace(n, e, te), q.remove(t, 1)), n || e
                        }
                        var s;
                        if (s = r(e), (a.length > 1 || !G(e)) && 0 === s) return void q.remove(e, 1);
                        if (u.inline || u.wrapper) {
                            if (u.exact || 1 !== s || (e = o(e)), le(c, function(t) {
                                    le(q.select(t.inline, e), function(e) {
                                        se(e) || O(t, n, e, t.exact ? e : null)
                                    })
                                }), w(e.parentNode, t, n)) return q.remove(e, 1), e = 0, te;
                            u.merge_with_parents && q.getParent(e.parentNode, function(r) {
                                return w(r, t, n) ? (q.remove(e, 1), e = 0, te) : void 0
                            }), e && u.merge_siblings !== !1 && (e = z(F(e), e), e = z(e, F(e, te)))
                        }
                    })
                }
                var c = p(t),
                    u = c[0],
                    f, h, m = !r && j.isCollapsed();
                if (u)
                    if (r) r.nodeType ? (h = q.createRng(), h.setStartBefore(r), h.setEndAfter(r), l(H(h, c), null, !0)) : l(r, null, !0);
                    else if (m && u.inline && !q.select("td.mce-item-selected,th.mce-item-selected").length) V("apply", t, n);
                    else {
                        var g = a.selection.getNode();
                        X || !c[0].defaultBlock || q.getParent(g, q.isBlock) || b(c[0].defaultBlock), a.selection.setRng(o()), f = j.getBookmark(), l(H(j.getRng(te), c), f), u.styles && (u.styles.color || u.styles.textDecoration) && (ue(g, y, "childNodes"), y(g)), j.moveToBookmark(f), U(j.getRng(te)), a.nodeChanged()
                    }
            }

            function x(e, t, n, r) {
                function i(e) {
                    var n, r, o, a, s;
                    if (1 === e.nodeType && ie(e) && (a = b, b = "true" === ie(e), s = !0), n = ce(e.childNodes), b && !s)
                        for (r = 0, o = h.length; o > r && !O(h[r], t, e, e); r++);
                    if (m.deep && n.length) {
                        for (r = 0, o = n.length; o > r; r++) i(n[r]);
                        s && (b = a)
                    }
                }

                function o(n) {
                    var i;
                    return le(u(n.parentNode).reverse(), function(n) {
                        var o;
                        i || "_start" == n.id || "_end" == n.id || (o = w(n, e, t, r), o && o.split !== !1 && (i = n))
                    }), i
                }

                function s(e, n, r, i) {
                    var o, a, s, l, c, u;
                    if (e) {
                        for (u = e.parentNode, o = n.parentNode; o && o != u; o = o.parentNode) {
                            for (a = q.clone(o, ee), c = 0; c < h.length; c++)
                                if (O(h[c], t, a, a)) {
                                    a = 0;
                                    break
                                }
                            a && (s && a.appendChild(s), l || (l = a), s = a)
                        }!i || m.mixed && G(e) || (n = q.split(e, n)), s && (r.parentNode.insertBefore(s, r), l.appendChild(r))
                    }
                    return n
                }

                function c(e) {
                    return s(o(e), e, e, !0)
                }

                function d(e) {
                    var t = q.get(e ? "_start" : "_end"),
                        n = t[e ? "firstChild" : "lastChild"];
                    return se(n) && (n = n[e ? "firstChild" : "lastChild"]), 3 == n.nodeType && 0 === n.data.length && (n = e ? t.previousSibling || t.nextSibling : t.nextSibling || t.previousSibling), q.remove(t, !0), n
                }

                function f(e) {
                    var t, n, r = e.commonAncestorContainer;
                    if (e = H(e, h, te), m.split) {
                        if (t = W(e, te), n = W(e), t != n) {
                            if (/^(TR|TH|TD)$/.test(t.nodeName) && t.firstChild && (t = "TR" == t.nodeName ? t.firstChild.firstChild || t : t.firstChild || t), r && /^T(HEAD|BODY|FOOT|R)$/.test(r.nodeName) && l(n) && n.firstChild && (n = n.firstChild || n), q.isChildOf(t, n) && !G(n) && !l(t) && !l(n)) return t = M(t, "span", {
                                id: "_start",
                                "data-mce-type": "bookmark"
                            }), c(t), void(t = d(te));
                            t = M(t, "span", {
                                id: "_start",
                                "data-mce-type": "bookmark"
                            }), n = M(n, "span", {
                                id: "_end",
                                "data-mce-type": "bookmark"
                            }), c(t), c(n), t = d(te), n = d()
                        } else t = n = c(t);
                        e.startContainer = t.parentNode ? t.parentNode : t, e.startOffset = J(t), e.endContainer = n.parentNode ? n.parentNode : n, e.endOffset = J(n) + 1
                    }
                    K.walk(e, function(e) {
                        le(e, function(e) {
                            i(e), 1 === e.nodeType && "underline" === a.dom.getStyle(e, "text-decoration") && e.parentNode && "underline" === v(e.parentNode) && O({
                                deep: !1,
                                exact: !0,
                                inline: "span",
                                styles: {
                                    textDecoration: "underline"
                                }
                            }, null, e)
                        })
                    })
                }
                var h = p(e),
                    m = h[0],
                    g, y, b = !0;
                return n ? void(n.nodeType ? (y = q.createRng(), y.setStartBefore(n), y.setEndAfter(n), f(y)) : f(n)) : void(j.isCollapsed() && m.inline && !q.select("td.mce-item-selected,th.mce-item-selected").length ? V("remove", e, t, r) : (g = j.getBookmark(), f(j.getRng(te)), j.moveToBookmark(g), m.inline && _(e, t, j.getStart()) && U(j.getRng(!0)), a.nodeChanged()))
            }

            function C(e, t, n) {
                var r = p(e);
                !_(e, t, n) || "toggle" in r[0] && !r[0].toggle ? b(e, t, n) : x(e, t, n)
            }

            function w(e, t, n, r) {
                function i(e, t, i) {
                    var o, a, s = t[i],
                        l;
                    if (t.onmatch) return t.onmatch(e, t, i);
                    if (s)
                        if (s.length === re) {
                            for (o in s)
                                if (s.hasOwnProperty(o)) {
                                    if (a = "attributes" === i ? q.getAttrib(e, o) : A(e, o), r && !a && !t.exact) return;
                                    if ((!r || t.exact) && !R(a, B(D(s[o], n), o))) return
                                }
                        } else
                            for (l = 0; l < s.length; l++)
                                if ("attributes" === i ? q.getAttrib(e, s[l]) : A(e, s[l])) return t;
                    return t
                }
                var o = p(t),
                    a, s, l;
                if (o && e)
                    for (s = 0; s < o.length; s++)
                        if (a = o[s], T(e, a) && i(e, a, "attributes") && i(e, a, "styles")) {
                            if (l = a.classes)
                                for (s = 0; s < l.length; s++)
                                    if (!q.hasClass(e, l[s])) return;
                            return a
                        }
            }

            function _(e, t, n) {
                function r(n) {
                    var r = q.getRoot();
                    return n === r ? !1 : (n = q.getParent(n, function(n) {
                        return n.parentNode === r || !!w(n, e, t, !0)
                    }), w(n, e, t))
                }
                var i;
                return n ? r(n) : (n = j.getNode(), r(n) ? te : (i = j.getStart(), i != n && r(i) ? te : ee))
            }

            function E(e, t) {
                var n, r = [],
                    i = {};
                return n = j.getStart(), q.getParent(n, function(n) {
                    var o, a;
                    for (o = 0; o < e.length; o++) a = e[o], !i[a] && w(n, a, t) && (i[a] = !0, r.push(a))
                }, q.getRoot()), r
            }

            function N(e) {
                var t = p(e),
                    n, r, i, o, a;
                if (t)
                    for (n = j.getStart(), r = u(n), o = t.length - 1; o >= 0; o--) {
                        if (a = t[o].selector, !a || t[o].defaultBlock) return te;
                        for (i = r.length - 1; i >= 0; i--)
                            if (q.is(r[i], a)) return te
                    }
                return ee
            }

            function S(e, t, n) {
                var r;
                return ne || (ne = {}, r = {}, a.on("NodeChange", function(e) {
                    var t = u(e.element),
                        n = {};
                    t = i.grep(t, function(e) {
                        return 1 == e.nodeType && !e.getAttribute("data-mce-bogus")
                    }), le(ne, function(e, i) {
                        le(t, function(o) {
                            return w(o, i, {}, e.similar) ? (r[i] || (le(e, function(e) {
                                e(!0, {
                                    node: o,
                                    format: i,
                                    parents: t
                                })
                            }), r[i] = e), n[i] = e, !1) : void 0
                        })
                    }), le(r, function(i, o) {
                        n[o] || (delete r[o], le(i, function(n) {
                            n(!1, {
                                node: e.element,
                                format: o,
                                parents: t
                            })
                        }))
                    })
                })), le(e.split(","), function(e) {
                    ne[e] || (ne[e] = [], ne[e].similar = n), ne[e].push(t)
                }), this
            }

            function k(e) {
                return o.getCssText(a, e)
            }

            function T(e, t) {
                return R(e, t.inline) ? te : R(e, t.block) ? te : t.selector ? 1 == e.nodeType && q.is(e, t.selector) : void 0
            }

            function R(e, t) {
                return e = e || "", t = t || "", e = "" + (e.nodeName || e), t = "" + (t.nodeName || t), e.toLowerCase() == t.toLowerCase()
            }

            function A(e, t) {
                return B(q.getStyle(e, t), t)
            }

            function B(e, t) {
                return ("color" == t || "backgroundColor" == t) && (e = q.toHex(e)), "fontWeight" == t && 700 == e && (e = "bold"), "fontFamily" == t && (e = e.replace(/[\'\"]/g, "").replace(/,\s+/g, ",")), "" + e
            }

            function D(e, t) {
                return "string" != typeof e ? e = e(t) : t && (e = e.replace(/%(\w+)/g, function(e, n) {
                    return t[n] || e
                })), e
            }

            function L(e) {
                return e && 3 === e.nodeType && /^([\t \r\n]+|)$/.test(e.nodeValue)
            }

            function M(e, t, n) {
                var r = q.create(t, n);
                return e.parentNode.insertBefore(r, e), r.appendChild(e), r
            }

            function H(t, n, r) {
                function i(e) {
                    function t(e) {
                        return "BR" == e.nodeName && e.getAttribute("data-mce-bogus") && !e.nextSibling
                    }
                    var r, i, o, a, s;
                    if (r = i = e ? g : y, a = e ? "previousSibling" : "nextSibling", s = q.getRoot(), 3 == r.nodeType && !L(r) && (e ? v > 0 : b < r.nodeValue.length)) return r;
                    for (;;) {
                        if (!n[0].block_expand && G(i)) return i;
                        for (o = i[a]; o; o = o[a])
                            if (!se(o) && !L(o) && !t(o)) return i;
                        if (i.parentNode == s) {
                            r = i;
                            break
                        }
                        i = i.parentNode
                    }
                    return r
                }

                function o(e, t) {
                    for (t === re && (t = 3 === e.nodeType ? e.length : e.childNodes.length); e && e.hasChildNodes();) e = e.childNodes[t], e && (t = 3 === e.nodeType ? e.length : e.childNodes.length);
                    return {
                        node: e,
                        offset: t
                    }
                }

                function l(e) {
                    for (var t = e; t;) {
                        if (1 === t.nodeType && ie(t)) return "false" === ie(t) ? t : e;
                        t = t.parentNode
                    }
                    return e
                }

                function c(t, n, i) {
                    function o(e, t) {
                        var n, o, a = e.nodeValue;
                        return "undefined" == typeof t && (t = i ? a.length : 0), i ? (n = a.lastIndexOf(" ", t), o = a.lastIndexOf("\xa0", t), n = n > o ? n : o, -1 === n || r || n++) : (n = a.indexOf(" ", t), o = a.indexOf("\xa0", t), n = -1 !== n && (-1 === o || o > n) ? n : o), n
                    }
                    var s, l, c, u;
                    if (3 === t.nodeType) {
                        if (c = o(t, n), -1 !== c) return {
                            container: t,
                            offset: c
                        };
                        u = t
                    }
                    for (s = new e(t, q.getParent(t, G) || a.getBody()); l = s[i ? "prev" : "next"]();)
                        if (3 === l.nodeType) {
                            if (u = l, c = o(l), -1 !== c) return {
                                container: l,
                                offset: c
                            }
                        } else if (G(l)) break;
                    return u ? (n = i ? 0 : u.length, {
                        container: u,
                        offset: n
                    }) : void 0
                }

                function d(e, r) {
                    var i, o, a, s;
                    for (3 == e.nodeType && 0 === e.nodeValue.length && e[r] && (e = e[r]), i = u(e), o = 0; o < i.length; o++)
                        for (a = 0; a < n.length; a++)
                            if (s = n[a], !("collapsed" in s && s.collapsed !== t.collapsed) && q.is(i[o], s.selector)) return i[o];
                    return e
                }

                function f(e, t) {
                    var r, i = q.getRoot();
                    if (n[0].wrapper || (r = q.getParent(e, n[0].block, i)), r || (r = q.getParent(3 == e.nodeType ? e.parentNode : e, function(e) {
                            return e != i && s(e)
                        })), r && n[0].wrapper && (r = u(r, "ul,ol").reverse()[0] || r), !r)
                        for (r = e; r[t] && !G(r[t]) && (r = r[t], !R(r, "br")););
                    return r || e
                }
                var h, p, m, g = t.startContainer,
                    v = t.startOffset,
                    y = t.endContainer,
                    b = t.endOffset;
                if (1 == g.nodeType && g.hasChildNodes() && (h = g.childNodes.length - 1, g = g.childNodes[v > h ? h : v], 3 == g.nodeType && (v = 0)), 1 == y.nodeType && y.hasChildNodes() && (h = y.childNodes.length - 1, y = y.childNodes[b > h ? h : b - 1], 3 == y.nodeType && (b = y.nodeValue.length)), g = l(g), y = l(y), (se(g.parentNode) || se(g)) && (g = se(g) ? g : g.parentNode, g = g.nextSibling || g, 3 == g.nodeType && (v = 0)), (se(y.parentNode) || se(y)) && (y = se(y) ? y : y.parentNode, y = y.previousSibling || y, 3 == y.nodeType && (b = y.length)), n[0].inline && (t.collapsed && (m = c(g, v, !0), m && (g = m.container, v = m.offset), m = c(y, b), m && (y = m.container, b = m.offset)), p = o(y, b), p.node)) {
                    for (; p.node && 0 === p.offset && p.node.previousSibling;) p = o(p.node.previousSibling);
                    p.node && p.offset > 0 && 3 === p.node.nodeType && " " === p.node.nodeValue.charAt(p.offset - 1) && p.offset > 1 && (y = p.node, y.splitText(p.offset - 1))
                }
                return (n[0].inline || n[0].block_expand) && (n[0].inline && 3 == g.nodeType && 0 !== v || (g = i(!0)), n[0].inline && 3 == y.nodeType && b !== y.nodeValue.length || (y = i())), n[0].selector && n[0].expand !== ee && !n[0].inline && (g = d(g, "previousSibling"), y = d(y, "nextSibling")), (n[0].block || n[0].selector) && (g = f(g, "previousSibling"), y = f(y, "nextSibling"), n[0].block && (G(g) || (g = i(!0)), G(y) || (y = i()))), 1 == g.nodeType && (v = J(g), g = g.parentNode), 1 == y.nodeType && (b = J(y) + 1, y = y.parentNode), {
                    startContainer: g,
                    startOffset: v,
                    endContainer: y,
                    endOffset: b
                }
            }

            function P(e, t) {
                return t.links && "A" == e.tagName
            }

            function O(e, t, n, r) {
                var i, o, a;
                if (!T(n, e) && !P(n, e)) return ee;
                if ("all" != e.remove)
                    for (le(e.styles, function(i, o) {
                        i = B(D(i, t), o), "number" == typeof o && (o = i, r = 0), (e.remove_similar || !r || R(A(r, o), i)) && q.setStyle(n, o, ""), a = 1
                    }), a && "" === q.getAttrib(n, "style") && (n.removeAttribute("style"), n.removeAttribute("data-mce-style")), le(e.attributes, function(e, i) {
                        var o;
                        if (e = D(e, t), "number" == typeof i && (i = e, r = 0), !r || R(q.getAttrib(r, i), e)) {
                            if ("class" == i && (e = q.getAttrib(n, i), e && (o = "", le(e.split(/\s+/), function(e) {
                                    /mce\-\w+/.test(e) && (o += (o ? " " : "") + e)
                                }), o))) return void q.setAttrib(n, i, o);
                            "class" == i && n.removeAttribute("className"), Z.test(i) && n.removeAttribute("data-mce-" + i), n.removeAttribute(i)
                        }
                    }), le(e.classes, function(e) {
                        e = D(e, t), (!r || q.hasClass(r, e)) && q.removeClass(n, e)
                    }), o = q.getAttribs(n), i = 0; i < o.length; i++)
                        if (0 !== o[i].nodeName.indexOf("_")) return ee;
                return "none" != e.remove ? (I(n, e), te) : void 0
            }

            function I(e, t) {
                function n(e, t, n) {
                    return e = F(e, t, n), !e || "BR" == e.nodeName || G(e)
                }
                var r = e.parentNode,
                    i;
                t.block && (X ? r == q.getRoot() && (t.list_block && R(e, t.list_block) || le(ce(e.childNodes), function(e) {
                    Y(X, e.nodeName.toLowerCase()) ? i ? i.appendChild(e) : (i = M(e, X), q.setAttribs(i, a.settings.forced_root_block_attrs)) : i = 0
                })) : G(e) && !G(r) && (n(e, ee) || n(e.firstChild, te, 1) || e.insertBefore(q.create("br"), e.firstChild), n(e, te) || n(e.lastChild, ee, 1) || e.appendChild(q.create("br")))), t.selector && t.inline && !R(t.inline, e) || q.remove(e, 1)
            }

            function F(e, t, n) {
                if (e)
                    for (t = t ? "nextSibling" : "previousSibling", e = n ? e : e[t]; e; e = e[t])
                        if (1 == e.nodeType || !L(e)) return e
            }

            function z(e, t) {
                function n(e, t) {
                    for (i = e; i; i = i[t]) {
                        if (3 == i.nodeType && 0 !== i.nodeValue.length) return e;
                        if (1 == i.nodeType && !se(i)) return i
                    }
                    return e
                }
                var i, o, a = new r(q);
                if (e && t && (e = n(e, "previousSibling"), t = n(t, "nextSibling"), a.compare(e, t))) {
                    for (i = e.nextSibling; i && i != t;) o = i, i = i.nextSibling, e.appendChild(o);
                    return q.remove(t), le(ce(t.childNodes), function(t) {
                        e.appendChild(t)
                    }), e
                }
                return t
            }

            function W(t, n) {
                var r, i, o;
                return r = t[n ? "startContainer" : "endContainer"], i = t[n ? "startOffset" : "endOffset"], 1 == r.nodeType && (o = r.childNodes.length - 1, !n && i && i--, r = r.childNodes[i > o ? o : i]), 3 === r.nodeType && n && i >= r.nodeValue.length && (r = new e(r, a.getBody()).next() || r), 3 !== r.nodeType || n || 0 !== i || (r = new e(r, a.getBody()).prev() || r), r
            }

            function V(t, n, r, i) {
                function o(e) {
                    var t = q.create("span", {
                        id: g,
                        "data-mce-bogus": !0,
                        style: v ? "color:red" : ""
                    });
                    return e && t.appendChild(a.getDoc().createTextNode(Q)), t
                }

                function l(e, t) {
                    for (; e;) {
                        if (3 === e.nodeType && e.nodeValue !== Q || e.childNodes.length > 1) return !1;
                        t && 1 === e.nodeType && t.push(e), e = e.firstChild
                    }
                    return !0
                }

                function c(e) {
                    for (; e;) {
                        if (e.id === g) return e;
                        e = e.parentNode
                    }
                }

                function u(t) {
                    var n;
                    if (t)
                        for (n = new e(t, t), t = n.current(); t; t = n.next())
                            if (3 === t.nodeType) return t
                }

                function d(e, t) {
                    var n, r;
                    if (e) r = j.getRng(!0), l(e) ? (t !== !1 && (r.setStartBefore(e), r.setEndBefore(e)), q.remove(e)) : (n = u(e), n.nodeValue.charAt(0) === Q && (n.deleteData(0, 1), r.startContainer == n && r.startOffset > 0 && r.setStart(n, r.startOffset - 1), r.endContainer == n && r.endOffset > 0 && r.setEnd(n, r.endOffset - 1)), q.remove(e, 1)), j.setRng(r);
                    else if (e = c(j.getStart()), !e)
                        for (; e = q.get(g);) d(e, !1)
                }

                function f() {
                    var e, t, i, a, s, l, d;
                    e = j.getRng(!0), a = e.startOffset, l = e.startContainer, d = l.nodeValue, t = c(j.getStart()), t && (i = u(t)), d && a > 0 && a < d.length && /\w/.test(d.charAt(a)) && /\w/.test(d.charAt(a - 1)) ? (s = j.getBookmark(), e.collapse(!0), e = H(e, p(n)), e = K.split(e), b(n, r, e), j.moveToBookmark(s)) : (t && i.nodeValue === Q ? b(n, r, t) : (t = o(!0), i = t.firstChild, e.insertNode(t), a = 1, b(n, r, t)), j.setCursorLocation(i, a))
                }

                function h() {
                    var e = j.getRng(!0),
                        t, a, l, c, u, d, f = [],
                        h, m;
                    for (t = e.startContainer, a = e.startOffset, u = t, 3 == t.nodeType && (a != t.nodeValue.length && (c = !0), u = u.parentNode); u;) {
                        if (w(u, n, r, i)) {
                            d = u;
                            break
                        }
                        u.nextSibling && (c = !0), f.push(u), u = u.parentNode
                    }
                    if (d)
                        if (c) l = j.getBookmark(), e.collapse(!0), e = H(e, p(n), !0), e = K.split(e), x(n, r, e), j.moveToBookmark(l);
                        else {
                            for (m = o(), u = m, h = f.length - 1; h >= 0; h--) u.appendChild(q.clone(f[h], !1)), u = u.firstChild;
                            u.appendChild(q.doc.createTextNode(Q)), u = u.firstChild;
                            var g = q.getParent(d, s);
                            g && q.isEmpty(g) ? d.parentNode.replaceChild(m, d) : q.insertAfter(m, d), j.setCursorLocation(u, 1), q.isEmpty(d) && q.remove(d)
                        }
                }

                function m() {
                    var e;
                    e = c(j.getStart()), e && !q.isEmpty(e) && ue(e, function(e) {
                        1 != e.nodeType || e.id === g || q.isEmpty(e) || q.setAttrib(e, "data-mce-bogus", null)
                    }, "childNodes")
                }
                var g = "_mce_caret",
                    v = a.settings.caret_debug;
                a._hasCaretEvents || (ae = function() {
                    var e = [],
                        t;
                    if (l(c(j.getStart()), e))
                        for (t = e.length; t--;) q.setAttrib(e[t], "data-mce-bogus", "1")
                }, oe = function(e) {
                    var t = e.keyCode;
                    d(), (8 == t && j.isCollapsed() || 37 == t || 39 == t) && d(c(j.getStart())), m()
                }, a.on("SetContent", function(e) {
                    e.selection && m()
                }), a._hasCaretEvents = !0), "apply" == t ? f() : h()
            }

            function U(t) {
                var n = t.startContainer,
                    r = t.startOffset,
                    i, o, a, s, l;
                if ((t.startContainer != t.endContainer || !c(t.startContainer.childNodes[t.startOffset])) && (3 == n.nodeType && r >= n.nodeValue.length && (r = J(n), n = n.parentNode, i = !0), 1 == n.nodeType))
                    for (s = n.childNodes, n = s[Math.min(r, s.length - 1)], o = new e(n, q.getParent(n, q.isBlock)), (r > s.length - 1 || i) && o.next(), a = o.current(); a; a = o.next())
                        if (3 == a.nodeType && !L(a)) return l = q.create("a", {
                            "data-mce-bogus": "all"
                        }, Q), a.parentNode.insertBefore(l, a), t.setStart(a, 0), j.setRng(t), void q.remove(l)
            }
            var $ = {},
                q = a.dom,
                j = a.selection,
                K = new t(q),
                Y = a.schema.isValidChild,
                G = q.isBlock,
                X = a.settings.forced_root_block,
                J = q.nodeIndex,
                Q = "\ufeff",
                Z = /^(src|href|style)$/,
                ee = !1,
                te = !0,
                ne, re, ie = q.getContentEditable,
                oe, ae, se = n.isBookmarkNode,
                le = i.each,
                ce = i.grep,
                ue = i.walk,
                de = i.extend;
            de(this, {
                get: p,
                register: m,
                unregister: g,
                apply: b,
                remove: x,
                toggle: C,
                match: _,
                matchAll: E,
                matchNode: w,
                canApply: N,
                formatChanged: S,
                getCssText: k
            }), f(), h(), a.on("BeforeGetContent", function(e) {
                ae && "raw" != e.format && ae()
            }), a.on("mouseup keydown", function(e) {
                oe && oe(e)
            })
        }
    }), r(I, [B, u, d, N], function(e, t, n, r) {
        var i = n.trim,
            o;
        return o = new RegExp(["<span[^>]+data-mce-bogus[^>]+>[\u200b\ufeff]+<\\/span>", '\\s?data-mce-selected="[^"]+"'].join("|"), "gi"),
            function(e) {
                function n() {
                    var t = e.getContent({
                            format: "raw",
                            no_events: 1
                        }),
                        n = /<(\w+) [^>]*data-mce-bogus="all"[^>]*>/g,
                        a, s, l, c, u, d = e.schema;
                    for (t = t.replace(o, ""), u = d.getShortEndedElements(); c = n.exec(t);) s = n.lastIndex, l = c[0].length, a = u[c[1]] ? s : r.findEndTag(d, t, s), t = t.substring(0, s - l) + t.substring(a), n.lastIndex = s - l;
                    return i(t)
                }

                function a(t) {
                    e.isNotDirty = !t
                }

                function s(e) {
                    l.typing = !1, l.add({}, e)
                }
                var l = this,
                    c = 0,
                    u = [],
                    d, f, h = 0;
                return e.on("init", function() {
                    l.add()
                }), e.on("BeforeExecCommand", function(e) {
                    var t = e.command;
                    "Undo" != t && "Redo" != t && "mceRepaint" != t && l.beforeChange()
                }), e.on("ExecCommand", function(e) {
                    var t = e.command;
                    "Undo" != t && "Redo" != t && "mceRepaint" != t && s(e)
                }), e.on("ObjectResizeStart", function() {
                    l.beforeChange()
                }), e.on("SaveContent ObjectResized blur", s), e.on("DragEnd", s), e.on("KeyUp", function(r) {
                    var i = r.keyCode;
                    (i >= 33 && 36 >= i || i >= 37 && 40 >= i || 45 == i || 13 == i || r.ctrlKey) && (s(), e.nodeChanged()), (46 == i || 8 == i || t.mac && (91 == i || 93 == i)) && e.nodeChanged(), f && l.typing && (e.isDirty() || (a(u[0] && n() != u[0].content), e.isNotDirty || e.fire("change", {
                        level: u[0],
                        lastLevel: null
                    })), e.fire("TypingUndo"), f = !1, e.nodeChanged())
                }), e.on("KeyDown", function(e) {
                    var t = e.keyCode;
                    if (t >= 33 && 36 >= t || t >= 37 && 40 >= t || 45 == t) return void(l.typing && s(e));
                    var n = e.ctrlKey && !e.altKey || e.metaKey;
                    !(16 > t || t > 20) || 224 == t || 91 == t || l.typing || n || (l.beforeChange(), l.typing = !0, l.add({}, e), f = !0)
                }), e.on("MouseDown", function(e) {
                    l.typing && s(e)
                }), e.addShortcut("meta+z", "", "Undo"), e.addShortcut("meta+y,meta+shift+z", "", "Redo"), e.on("AddUndo Undo Redo ClearUndos", function(t) {
                    t.isDefaultPrevented() || e.nodeChanged()
                }), l = {
                    data: u,
                    typing: !1,
                    beforeChange: function() {
                        h || (d = e.selection.getBookmark(2, !0))
                    },
                    add: function(t, r) {
                        var i, o = e.settings,
                            s;
                        if (t = t || {}, t.content = n(), h || e.removed) return null;
                        if (s = u[c], e.fire("BeforeAddUndo", {
                                level: t,
                                lastLevel: s,
                                originalEvent: r
                            }).isDefaultPrevented()) return null;
                        if (s && s.content == t.content) return null;
                        if (u[c] && (u[c].beforeBookmark = d), o.custom_undo_redo_levels && u.length > o.custom_undo_redo_levels) {
                            for (i = 0; i < u.length - 1; i++) u[i] = u[i + 1];
                            u.length--, c = u.length
                        }
                        t.bookmark = e.selection.getBookmark(2, !0), c < u.length - 1 && (u.length = c + 1), u.push(t), c = u.length - 1;
                        var l = {
                            level: t,
                            lastLevel: s,
                            originalEvent: r
                        };
                        return e.fire("AddUndo", l), c > 0 && (a(!0), e.fire("change", l)), t
                    },
                    undo: function() {
                        var t;
                        return l.typing && (l.add(), l.typing = !1), c > 0 && (t = u[--c], 0 === c && a(!1), e.setContent(t.content, {
                            format: "raw"
                        }), e.selection.moveToBookmark(t.beforeBookmark), e.fire("undo", {
                            level: t
                        })), t
                    },
                    redo: function() {
                        var t;
                        return c < u.length - 1 && (t = u[++c], e.setContent(t.content, {
                            format: "raw"
                        }), e.selection.moveToBookmark(t.bookmark), a(!0), e.fire("redo", {
                            level: t
                        })), t
                    },
                    clear: function() {
                        u = [], c = 0, l.typing = !1, e.fire("ClearUndos")
                    },
                    hasUndo: function() {
                        return c > 0 || l.typing && u[0] && n() != u[0].content
                    },
                    hasRedo: function() {
                        return c < u.length - 1 && !this.typing
                    },
                    transact: function(e) {
                        l.beforeChange();
                        try {
                            h++, e()
                        } finally {
                            h--
                        }
                        l.add()
                    }
                }
            }
    }), r(F, [p, C, u], function(e, t, n) {
        var r = n.ie && n.ie < 11;
        return function(i) {
            function o(o) {
                function h(e) {
                    return e && a.isBlock(e) && !/^(TD|TH|CAPTION|FORM)$/.test(e.nodeName) && !/^(fixed|absolute)/i.test(e.style.position) && "true" !== a.getContentEditable(e)
                }

                function p(e) {
                    var t;
                    a.isBlock(e) && (t = s.getRng(), e.appendChild(a.create("span", null, "\xa0")), s.select(e), e.lastChild.outerHTML = "", s.setRng(t))
                }

                function m(e) {
                    var t = e,
                        n = [],
                        r;
                    if (t) {
                        for (; t = t.firstChild;) {
                            if (a.isBlock(t)) return;
                            1 != t.nodeType || d[t.nodeName.toLowerCase()] || n.push(t)
                        }
                        for (r = n.length; r--;) t = n[r], !t.hasChildNodes() || t.firstChild == t.lastChild && "" === t.firstChild.nodeValue ? a.remove(t) : "A" == t.nodeName && " " === (t.innerText || t.textContent) && a.remove(t)
                    }
                }

                function g(t) {
                    function r(e) {
                        for (; e;) {
                            if (1 == e.nodeType || 3 == e.nodeType && e.data && /[\r\n\s]/.test(e.data)) return e;
                            e = e.nextSibling
                        }
                    }
                    var i, o, l, c = t,
                        u;
                    if (t) {
                        if (n.ie && n.ie < 9 && B && B.firstChild && B.firstChild == B.lastChild && "BR" == B.firstChild.tagName && a.remove(B.firstChild), /^(LI|DT|DD)$/.test(t.nodeName)) {
                            var d = r(t.firstChild);
                            d && /^(UL|OL|DL)$/.test(d.nodeName) && t.insertBefore(a.doc.createTextNode("\xa0"), t.firstChild)
                        }
                        if (l = a.createRng(), n.ie || t.normalize(), t.hasChildNodes()) {
                            for (i = new e(t, t); o = i.current();) {
                                if (3 == o.nodeType) {
                                    l.setStart(o, 0), l.setEnd(o, 0);
                                    break
                                }
                                if (f[o.nodeName.toLowerCase()]) {
                                    l.setStartBefore(o), l.setEndBefore(o);
                                    break
                                }
                                c = o, o = i.next()
                            }
                            o || (l.setStart(c, 0), l.setEnd(c, 0))
                        } else "BR" == t.nodeName ? t.nextSibling && a.isBlock(t.nextSibling) ? ((!D || 9 > D) && (u = a.create("br"), t.parentNode.insertBefore(u, t)), l.setStartBefore(t), l.setEndBefore(t)) : (l.setStartAfter(t), l.setEndAfter(t)) : (l.setStart(t, 0), l.setEnd(t, 0));
                        s.setRng(l), a.remove(u), s.scrollIntoView(t)
                    }
                }

                function v(e) {
                    var t = l.forced_root_block;
                    t && t.toLowerCase() === e.tagName.toLowerCase() && a.setAttribs(e, l.forced_root_block_attrs)
                }

                function y(e) {
                    var t = R,
                        n, i, o, s = u.getTextInlineElements();
                    if (e || "TABLE" == O ? (n = a.create(e || F), v(n)) : n = B.cloneNode(!1), o = n, l.keep_styles !== !1)
                        do
                            if (s[t.nodeName]) {
                                if ("_mce_caret" == t.id) continue;
                                i = t.cloneNode(!1), a.setAttrib(i, "id", ""), n.hasChildNodes() ? (i.appendChild(n.firstChild), n.appendChild(i)) : (o = i, n.appendChild(i))
                            }
                        while (t = t.parentNode);
                    return r || (o.innerHTML = '<br data-mce-bogus="1">'), n
                }

                function b(t) {
                    var n, r, i;
                    if (3 == R.nodeType && (t ? A > 0 : A < R.nodeValue.length)) return !1;
                    if (R.parentNode == B && z && !t) return !0;
                    if (t && 1 == R.nodeType && R == B.firstChild) return !0;
                    if ("TABLE" === R.nodeName || R.previousSibling && "TABLE" == R.previousSibling.nodeName) return z && !t || !z && t;
                    for (n = new e(R, B), 3 == R.nodeType && (t && 0 === A ? n.prev() : t || A != R.nodeValue.length || n.next()); r = n.current();) {
                        if (1 === r.nodeType) {
                            if (!r.getAttribute("data-mce-bogus") && (i = r.nodeName.toLowerCase(), d[i] && "br" !== i)) return !1
                        } else if (3 === r.nodeType && !/^[ \t\r\n]*$/.test(r.nodeValue)) return !1;
                        t ? n.prev() : n.next()
                    }
                    return !0
                }

                function x(e, t) {
                    var n, r, o, s, l, c, d = F || "P";
                    if (r = a.getParent(e, a.isBlock), c = i.getBody().nodeName.toLowerCase(), !r || !h(r)) {
                        if (r = r || T, !r.hasChildNodes()) return n = a.create(d), v(n), r.appendChild(n), S.setStart(n, 0), S.setEnd(n, 0), n;
                        for (s = e; s.parentNode != r;) s = s.parentNode;
                        for (; s && !a.isBlock(s);) o = s, s = s.previousSibling;
                        if (o && u.isValidChild(c, d.toLowerCase())) {
                            for (n = a.create(d), v(n), o.parentNode.insertBefore(n, o), s = o; s && !a.isBlock(s);) l = s.nextSibling, n.appendChild(s), s = l;
                            S.setStart(e, t), S.setEnd(e, t)
                        }
                    }
                    return e
                }

                function C() {
                    function e(e) {
                        for (var t = P[e ? "firstChild" : "lastChild"]; t && 1 != t.nodeType;) t = t[e ? "nextSibling" : "previousSibling"];
                        return t === B
                    }

                    function t() {
                        var e = P.parentNode;
                        return /^(LI|DT|DD)$/.test(e.nodeName) ? e : P
                    }
                    var n = P.parentNode.nodeName;
                    /^(OL|UL|LI)$/.test(n) && (F = "LI"), M = F ? y(F) : a.create("BR"), e(!0) && e() ? "LI" == n ? a.insertAfter(M, t()) : a.replace(M, P) : e(!0) ? "LI" == n ? (a.insertAfter(M, t()), M.appendChild(a.doc.createTextNode(" ")), M.appendChild(P)) : P.parentNode.insertBefore(M, P) : e() ? (a.insertAfter(M, t()), p(M)) : (P = t(), k = S.cloneRange(), k.setStartAfter(B), k.setEndAfter(P), H = k.extractContents(), "LI" == F && "LI" == H.firstChild.nodeName ? (M = H.firstChild, a.insertAfter(H, P)) : (a.insertAfter(H, P), a.insertAfter(M, P))), a.remove(B), g(M), c.add()
                }

                function w() {
                    i.execCommand("InsertLineBreak", !1, o)
                }

                function _(e) {
                    do 3 === e.nodeType && (e.nodeValue = e.nodeValue.replace(/^[\r\n]+/, "")), e = e.firstChild; while (e)
                }

                function E(e) {
                    var t = a.getRoot(),
                        n, r;
                    for (n = e; n !== t && "false" !== a.getContentEditable(n);) "true" === a.getContentEditable(n) && (r = n), n = n.parentNode;
                    return n !== t ? r : t
                }

                function N(e) {
                    var t;
                    r || (e.normalize(), t = e.lastChild, (!t || /^(left|right)$/gi.test(a.getStyle(t, "float", !0))) && a.add(e, "br"))
                }
                var S, k, T, R, A, B, D, L, M, H, P, O, I, F, z;
                if (S = s.getRng(!0), !o.isDefaultPrevented()) {
                    if (!S.collapsed) return void i.execCommand("Delete");
                    if (new t(a).normalize(S), R = S.startContainer, A = S.startOffset, F = (l.force_p_newlines ? "p" : "") || l.forced_root_block, F = F ? F.toUpperCase() : "", D = a.doc.documentMode, L = o.shiftKey, 1 == R.nodeType && R.hasChildNodes() && (z = A > R.childNodes.length - 1, R = R.childNodes[Math.min(A, R.childNodes.length - 1)] || R, A = z && 3 == R.nodeType ? R.nodeValue.length : 0), T = E(R)) {
                        if (c.beforeChange(), !a.isBlock(T) && T != a.getRoot()) return void((!F || L) && w());
                        if ((F && !L || !F && L) && (R = x(R, A)), B = a.getParent(R, a.isBlock), P = B ? a.getParent(B.parentNode, a.isBlock) : null, O = B ? B.nodeName.toUpperCase() : "", I = P ? P.nodeName.toUpperCase() : "", "LI" != I || o.ctrlKey || (B = P, O = I), /^(LI|DT|DD)$/.test(O)) {
                            if (!F && L) return void w();
                            if (a.isEmpty(B)) return void C()
                        }
                        if ("PRE" == O && l.br_in_pre !== !1) {
                            if (!L) return void w()
                        } else if (!F && !L && "LI" != O || F && L) return void w();
                        F && B === i.getBody() || (F = F || "P", b() ? (M = /^(H[1-6]|PRE|FIGURE)$/.test(O) && "HGROUP" != I ? y(F) : y(), l.end_container_on_empty_block && h(P) && a.isEmpty(B) ? M = a.split(P, B) : a.insertAfter(M, B), g(M)) : b(!0) ? (M = B.parentNode.insertBefore(y(), B), p(M), g(B)) : (k = S.cloneRange(), k.setEndAfter(B), H = k.extractContents(), _(H), M = H.firstChild, a.insertAfter(H, B), m(M), N(B), g(M)), a.setAttrib(M, "id", ""), i.fire("NewBlock", {
                            newBlock: M
                        }), c.add())
                    }
                }
            }
            var a = i.dom,
                s = i.selection,
                l = i.settings,
                c = i.undoManager,
                u = i.schema,
                d = u.getNonEmptyElements(),
                f = u.getMoveCaretBeforeOnEnterElements();
            i.on("keydown", function(e) {
                13 == e.keyCode && o(e) !== !1 && e.preventDefault()
            })
        }
    }), r(z, [], function() {
        return function(e) {
            function t() {
                var t = i.getStart(),
                    s = e.getBody(),
                    l, c, u, d, f, h, p, m = -16777215,
                    g, v, y, b, x;
                if (x = n.forced_root_block, t && 1 === t.nodeType && x) {
                    for (; t && t != s;) {
                        if (a[t.nodeName]) return;
                        t = t.parentNode
                    }
                    if (l = i.getRng(), l.setStart) {
                        c = l.startContainer, u = l.startOffset, d = l.endContainer, f = l.endOffset;
                        try {
                            v = e.getDoc().activeElement === s
                        } catch (C) {}
                    } else l.item && (t = l.item(0), l = e.getDoc().body.createTextRange(), l.moveToElementText(t)),
                        v = l.parentElement().ownerDocument === e.getDoc(), y = l.duplicate(), y.collapse(!0), u = -1 * y.move("character", m), y.collapsed || (y = l.duplicate(), y.collapse(!1), f = -1 * y.move("character", m) - u);
                    for (t = s.firstChild, b = s.nodeName.toLowerCase(); t;)
                        if ((3 === t.nodeType || 1 == t.nodeType && !a[t.nodeName]) && o.isValidChild(b, x.toLowerCase())) {
                            if (3 === t.nodeType && 0 === t.nodeValue.length) {
                                p = t, t = t.nextSibling, r.remove(p);
                                continue
                            }
                            h || (h = r.create(x, e.settings.forced_root_block_attrs), t.parentNode.insertBefore(h, t), g = !0), p = t, t = t.nextSibling, h.appendChild(p)
                        } else h = null, t = t.nextSibling;
                    if (g && v) {
                        if (l.setStart) l.setStart(c, u), l.setEnd(d, f), i.setRng(l);
                        else try {
                            l = e.getDoc().body.createTextRange(), l.moveToElementText(s), l.collapse(!0), l.moveStart("character", u), f > 0 && l.moveEnd("character", f), l.select()
                        } catch (C) {}
                        e.nodeChanged()
                    }
                }
            }
            var n = e.settings,
                r = e.dom,
                i = e.selection,
                o = e.schema,
                a = o.getBlockElements();
            n.forced_root_block && e.on("NodeChange", t)
        }
    }), r(W, [T, u, d, H, C, p], function(e, n, r, i, o, a) {
        var s = r.each,
            l = r.extend,
            c = r.map,
            u = r.inArray,
            d = r.explode,
            f = n.gecko,
            h = n.ie,
            p = n.ie && n.ie < 11,
            m = !0,
            g = !1;
        return function(r) {
            function v(e, t, n, i) {
                var o, a, c = 0;
                if (/^(mceAddUndoLevel|mceEndUndoLevel|mceBeginUndoLevel|mceRepaint)$/.test(e) || i && i.skip_focus || r.focus(), i = l({}, i), i = r.fire("BeforeExecCommand", {
                        command: e,
                        ui: t,
                        value: n
                    }), i.isDefaultPrevented()) return !1;
                if (a = e.toLowerCase(), o = M.exec[a]) return o(a, t, n), r.fire("ExecCommand", {
                    command: e,
                    ui: t,
                    value: n
                }), !0;
                if (s(r.plugins, function(i) {
                        return i.execCommand && i.execCommand(e, t, n) ? (r.fire("ExecCommand", {
                            command: e,
                            ui: t,
                            value: n
                        }), c = !0, !1) : void 0
                    }), c) return c;
                if (r.theme && r.theme.execCommand && r.theme.execCommand(e, t, n)) return r.fire("ExecCommand", {
                    command: e,
                    ui: t,
                    value: n
                }), !0;
                try {
                    c = r.getDoc().execCommand(e, t, n)
                } catch (u) {}
                return c ? (r.fire("ExecCommand", {
                    command: e,
                    ui: t,
                    value: n
                }), !0) : !1
            }

            function y(e) {
                var t;
                if (!r._isHidden()) {
                    if (e = e.toLowerCase(), t = M.state[e]) return t(e);
                    try {
                        return r.getDoc().queryCommandState(e)
                    } catch (n) {}
                    return !1
                }
            }

            function b(e) {
                var t;
                if (!r._isHidden()) {
                    if (e = e.toLowerCase(), t = M.value[e]) return t(e);
                    try {
                        return r.getDoc().queryCommandValue(e)
                    } catch (n) {}
                }
            }

            function x(e, t) {
                t = t || "exec", s(e, function(e, n) {
                    s(n.toLowerCase().split(","), function(n) {
                        M[t][n] = e
                    })
                })
            }

            function C(e, t, n) {
                e = e.toLowerCase(), M.exec[e] = function(e, i, o, a) {
                    return t.call(n || r, i, o, a)
                }
            }

            function w(e) {
                if (e = e.toLowerCase(), M.exec[e]) return !0;
                try {
                    return r.getDoc().queryCommandSupported(e)
                } catch (t) {}
                return !1
            }

            function _(e, t, n) {
                e = e.toLowerCase(), M.state[e] = function() {
                    return t.call(n || r)
                }
            }

            function E(e, t, n) {
                e = e.toLowerCase(), M.value[e] = function() {
                    return t.call(n || r)
                }
            }

            function N(e) {
                return e = e.toLowerCase(), !!M.exec[e]
            }

            function S(e, n, i) {
                return n === t && (n = g), i === t && (i = null), r.getDoc().execCommand(e, n, i)
            }

            function k(e) {
                return L.match(e)
            }

            function T(e, n) {
                L.toggle(e, n ? {
                    value: n
                } : t), r.nodeChanged()
            }

            function R(e) {
                P = D.getBookmark(e)
            }

            function A() {
                D.moveToBookmark(P)
            }
            var B, D, L, M = {
                    state: {},
                    exec: {},
                    value: {}
                },
                H = r.settings,
                P;
            r.on("PreInit", function() {
                B = r.dom, D = r.selection, H = r.settings, L = r.formatter
            }), l(this, {
                execCommand: v,
                queryCommandState: y,
                queryCommandValue: b,
                queryCommandSupported: w,
                addCommands: x,
                addCommand: C,
                addQueryStateHandler: _,
                addQueryValueHandler: E,
                hasCustomCommand: N
            }), x({
                "mceResetDesignMode,mceBeginUndoLevel": function() {},
                "mceEndUndoLevel,mceAddUndoLevel": function() {
                    r.undoManager.add()
                },
                "Cut,Copy,Paste": function(e) {
                    var t = r.getDoc(),
                        i;
                    try {
                        S(e)
                    } catch (o) {
                        i = m
                    }
                    if (i || !t.queryCommandSupported(e)) {
                        var a = r.translate("Your browser doesn't support direct access to the clipboard. Please use the Ctrl+X/C/V keyboard shortcuts instead.");
                        n.mac && (a = a.replace(/Ctrl\+/g, "\u2318+")), r.windowManager.alert(a)
                    }
                },
                unlink: function() {
                    if (D.isCollapsed()) {
                        var e = D.getNode();
                        return void("A" == e.tagName && r.dom.remove(e, !0))
                    }
                    L.remove("link")
                },
                "JustifyLeft,JustifyCenter,JustifyRight,JustifyFull,JustifyNone": function(e) {
                    var t = e.substring(7);
                    "full" == t && (t = "justify"), s("left,center,right,justify".split(","), function(e) {
                        t != e && L.remove("align" + e)
                    }), "none" != t && (T("align" + t), v("mceRepaint"))
                },
                "InsertUnorderedList,InsertOrderedList": function(e) {
                    var t, n;
                    S(e), t = B.getParent(D.getNode(), "ol,ul"), t && (n = t.parentNode, /^(H[1-6]|P|ADDRESS|PRE)$/.test(n.nodeName) && (R(), B.split(n, t), A()))
                },
                "Bold,Italic,Underline,Strikethrough,Superscript,Subscript": function(e) {
                    T(e)
                },
                "ForeColor,HiliteColor,FontName": function(e, t, n) {
                    T(e, n)
                },
                FontSize: function(e, t, n) {
                    var r, i;
                    n >= 1 && 7 >= n && (i = d(H.font_size_style_values), r = d(H.font_size_classes), n = r ? r[n - 1] || n : i[n - 1] || n), T(e, n)
                },
                RemoveFormat: function(e) {
                    L.remove(e)
                },
                mceBlockQuote: function() {
                    T("blockquote")
                },
                FormatBlock: function(e, t, n) {
                    return T(n || "p")
                },
                mceCleanup: function() {
                    var e = D.getBookmark();
                    r.setContent(r.getContent({
                        cleanup: m
                    }), {
                        cleanup: m
                    }), D.moveToBookmark(e)
                },
                mceRemoveNode: function(e, t, n) {
                    var i = n || D.getNode();
                    i != r.getBody() && (R(), r.dom.remove(i, m), A())
                },
                mceSelectNodeDepth: function(e, t, n) {
                    var i = 0;
                    B.getParent(D.getNode(), function(e) {
                        return 1 == e.nodeType && i++ == n ? (D.select(e), g) : void 0
                    }, r.getBody())
                },
                mceSelectNode: function(e, t, n) {
                    D.select(n)
                },
                mceInsertContent: function(t, n, o) {
                    function a(e) {
                        function t(e) {
                            return r[e] && 3 == r[e].nodeType
                        }
                        var n, r, i;
                        return n = D.getRng(!0), r = n.startContainer, i = n.startOffset, 3 == r.nodeType && (i > 0 ? e = e.replace(/^&nbsp;/, " ") : t("previousSibling") || (e = e.replace(/^ /, "&nbsp;")), i < r.length ? e = e.replace(/&nbsp;(<br>|)$/, " ") : t("nextSibling") || (e = e.replace(/(&nbsp;| )(<br>|)$/, "&nbsp;"))), e
                    }

                    function l() {
                        var e, t, n;
                        e = D.getRng(!0), t = e.startContainer, n = e.startOffset, 3 == t.nodeType && e.collapsed && ("\xa0" === t.data[n] ? (t.deleteData(n, 1), /[\u00a0| ]$/.test(o) || (o += " ")) : "\xa0" === t.data[n - 1] && (t.deleteData(n - 1, 1), /[\u00a0| ]$/.test(o) || (o = " " + o)))
                    }

                    function c(e) {
                        if (_)
                            for (x = e.firstChild; x; x = x.walk(!0)) N[x.name] && x.attr("data-mce-new", "true")
                    }

                    function u() {
                        if (_) {
                            var e = r.getBody(),
                                t = new i(B);
                            s(B.select("*[data-mce-new]"), function(n) {
                                n.removeAttribute("data-mce-new");
                                for (var r = n.parentNode; r && r != e; r = r.parentNode) t.compare(r, n) && B.remove(n, !0)
                            })
                        }
                    }
                    var d, f, p, m, g, v, y, b, x, C, w, _, E, N = r.schema.getTextInlineElements();
                    "string" != typeof o && (_ = o.merge, E = o.data, o = o.content), /^ | $/.test(o) && (o = a(o)), d = r.parser, f = new e({}, r.schema), w = '<span id="mce_marker" data-mce-type="bookmark">&#xFEFF;&#x200B;</span>', v = {
                        content: o,
                        format: "html",
                        selection: !0
                    }, r.fire("BeforeSetContent", v), o = v.content, -1 == o.indexOf("{$caret}") && (o += "{$caret}"), o = o.replace(/\{\$caret\}/, w), b = D.getRng();
                    var S = b.startContainer || (b.parentElement ? b.parentElement() : null),
                        k = r.getBody();
                    S === k && D.isCollapsed() && B.isBlock(k.firstChild) && B.isEmpty(k.firstChild) && (b = B.createRng(), b.setStart(k.firstChild, 0), b.setEnd(k.firstChild, 0), D.setRng(b)), D.isCollapsed() || (r.getDoc().execCommand("Delete", !1, null), l()), p = D.getNode();
                    var T = {
                        context: p.nodeName.toLowerCase(),
                        data: E
                    };
                    if (g = d.parse(o, T), c(g), x = g.lastChild, "mce_marker" == x.attr("id"))
                        for (y = x, x = x.prev; x; x = x.walk(!0))
                            if (3 == x.type || !B.isBlock(x.name)) {
                                r.schema.isValidChild(x.parent.name, "span") && x.parent.insert(y, x, "br" === x.name);
                                break
                            }
                    if (T.invalid) {
                        for (D.setContent(w), p = D.getNode(), m = r.getBody(), 9 == p.nodeType ? p = x = m : x = p; x !== m;) p = x, x = x.parentNode;
                        o = p == m ? m.innerHTML : B.getOuterHTML(p), o = f.serialize(d.parse(o.replace(/<span (id="mce_marker"|id=mce_marker).+?<\/span>/i, function() {
                            return f.serialize(g)
                        }))), p == m ? B.setHTML(m, o) : B.setOuterHTML(p, o)
                    } else o = f.serialize(g), x = p.firstChild, C = p.lastChild, !x || x === C && "BR" === x.nodeName ? B.setHTML(p, o) : D.setContent(o);
                    u(), y = B.get("mce_marker"), D.scrollIntoView(y), b = B.createRng(), x = y.previousSibling, x && 3 == x.nodeType ? (b.setStart(x, x.nodeValue.length), h || (C = y.nextSibling, C && 3 == C.nodeType && (x.appendData(C.data), C.parentNode.removeChild(C)))) : (b.setStartBefore(y), b.setEndBefore(y)), B.remove(y), D.setRng(b), r.fire("SetContent", v), r.addVisual()
                },
                mceInsertRawHTML: function(e, t, n) {
                    D.setContent("tiny_mce_marker"), r.setContent(r.getContent().replace(/tiny_mce_marker/g, function() {
                        return n
                    }))
                },
                mceToggleFormat: function(e, t, n) {
                    T(n)
                },
                mceSetContent: function(e, t, n) {
                    r.setContent(n)
                },
                "Indent,Outdent": function(e) {
                    var t, n, i;
                    t = H.indentation, n = /[a-z%]+$/i.exec(t), t = parseInt(t, 10), y("InsertUnorderedList") || y("InsertOrderedList") ? S(e) : (H.forced_root_block || B.getParent(D.getNode(), B.isBlock) || L.apply("div"), s(D.getSelectedBlocks(), function(o) {
                        if ("LI" != o.nodeName) {
                            var a = r.getParam("indent_use_margin", !1) ? "margin" : "padding";
                            a += "rtl" == B.getStyle(o, "direction", !0) ? "Right" : "Left", "outdent" == e ? (i = Math.max(0, parseInt(o.style[a] || 0, 10) - t), B.setStyle(o, a, i ? i + n : "")) : (i = parseInt(o.style[a] || 0, 10) + t + n, B.setStyle(o, a, i))
                        }
                    }))
                },
                mceRepaint: function() {
                    if (f) try {
                        R(m), D.getSel() && D.getSel().selectAllChildren(r.getBody()), D.collapse(m), A()
                    } catch (e) {}
                },
                InsertHorizontalRule: function() {
                    r.execCommand("mceInsertContent", !1, "<hr />")
                },
                mceToggleVisualAid: function() {
                    r.hasVisual = !r.hasVisual, r.addVisual()
                },
                mceReplaceContent: function(e, t, n) {
                    r.execCommand("mceInsertContent", !1, n.replace(/\{\$selection\}/g, D.getContent({
                        format: "text"
                    })))
                },
                mceInsertLink: function(e, t, n) {
                    var r;
                    "string" == typeof n && (n = {
                        href: n
                    }), r = B.getParent(D.getNode(), "a"), n.href = n.href.replace(" ", "%20"), r && n.href || L.remove("link"), n.href && L.apply("link", n, r)
                },
                selectAll: function() {
                    var e = B.getRoot(),
                        t;
                    D.getRng().setStart ? (t = B.createRng(), t.setStart(e, 0), t.setEnd(e, e.childNodes.length), D.setRng(t)) : (t = D.getRng(), t.item || (t.moveToElementText(e), t.select()))
                },
                "delete": function() {
                    S("Delete");
                    var e = r.getBody();
                    B.isEmpty(e) && (r.setContent(""), e.firstChild && B.isBlock(e.firstChild) ? r.selection.setCursorLocation(e.firstChild, 0) : r.selection.setCursorLocation(e, 0))
                },
                mceNewDocument: function() {
                    r.setContent("")
                },
                InsertLineBreak: function(e, t, n) {
                    function i() {
                        for (var e = new a(h, v), t, n = r.schema.getNonEmptyElements(); t = e.next();)
                            if (n[t.nodeName.toLowerCase()] || t.length > 0) return !0
                    }
                    var s = n,
                        l, c, u, d = D.getRng(!0);
                    new o(B).normalize(d);
                    var f = d.startOffset,
                        h = d.startContainer;
                    if (1 == h.nodeType && h.hasChildNodes()) {
                        var g = f > h.childNodes.length - 1;
                        h = h.childNodes[Math.min(f, h.childNodes.length - 1)] || h, f = g && 3 == h.nodeType ? h.nodeValue.length : 0
                    }
                    var v = B.getParent(h, B.isBlock),
                        y = v ? v.nodeName.toUpperCase() : "",
                        b = v ? B.getParent(v.parentNode, B.isBlock) : null,
                        x = b ? b.nodeName.toUpperCase() : "",
                        C = s && s.ctrlKey;
                    "LI" != x || C || (v = b, y = x), h && 3 == h.nodeType && f >= h.nodeValue.length && (p || i() || (l = B.create("br"), d.insertNode(l), d.setStartAfter(l), d.setEndAfter(l), c = !0)), l = B.create("br"), d.insertNode(l);
                    var w = B.doc.documentMode;
                    return p && "PRE" == y && (!w || 8 > w) && l.parentNode.insertBefore(B.doc.createTextNode("\r"), l), u = B.create("span", {}, "&nbsp;"), l.parentNode.insertBefore(u, l), D.scrollIntoView(u), B.remove(u), c ? (d.setStartBefore(l), d.setEndBefore(l)) : (d.setStartAfter(l), d.setEndAfter(l)), D.setRng(d), r.undoManager.add(), m
                }
            }), x({
                "JustifyLeft,JustifyCenter,JustifyRight,JustifyFull": function(e) {
                    var t = "align" + e.substring(7),
                        n = D.isCollapsed() ? [B.getParent(D.getNode(), B.isBlock)] : D.getSelectedBlocks(),
                        r = c(n, function(e) {
                            return !!L.matchNode(e, t)
                        });
                    return -1 !== u(r, m)
                },
                "Bold,Italic,Underline,Strikethrough,Superscript,Subscript": function(e) {
                    return k(e)
                },
                mceBlockQuote: function() {
                    return k("blockquote")
                },
                Outdent: function() {
                    var e;
                    if (H.inline_styles) {
                        if ((e = B.getParent(D.getStart(), B.isBlock)) && parseInt(e.style.paddingLeft, 10) > 0) return m;
                        if ((e = B.getParent(D.getEnd(), B.isBlock)) && parseInt(e.style.paddingLeft, 10) > 0) return m
                    }
                    return y("InsertUnorderedList") || y("InsertOrderedList") || !H.inline_styles && !!B.getParent(D.getNode(), "BLOCKQUOTE")
                },
                "InsertUnorderedList,InsertOrderedList": function(e) {
                    var t = B.getParent(D.getNode(), "ul,ol");
                    return t && ("insertunorderedlist" === e && "UL" === t.tagName || "insertorderedlist" === e && "OL" === t.tagName)
                }
            }, "state"), x({
                "FontSize,FontName": function(e) {
                    var t = 0,
                        n;
                    return (n = B.getParent(D.getNode(), "span")) && (t = "fontsize" == e ? n.style.fontSize : n.style.fontFamily.replace(/, /g, ",").replace(/[\'\"]/g, "").toLowerCase()), t
                }
            }, "value"), x({
                Undo: function() {
                    r.undoManager.undo()
                },
                Redo: function() {
                    r.undoManager.redo()
                }
            })
        }
    }), r(V, [d], function(e) {
        function t(e, o) {
            var a = this,
                s, l;
            if (e = r(e), o = a.settings = o || {}, s = o.base_uri, /^([\w\-]+):([^\/]{2})/i.test(e) || /^\s*#/.test(e)) return void(a.source = e);
            var c = 0 === e.indexOf("//");
            0 !== e.indexOf("/") || c || (e = (s ? s.protocol || "http" : "http") + "://mce_host" + e), /^[\w\-]*:?\/\//.test(e) || (l = o.base_uri ? o.base_uri.path : new t(location.href).directory, "" === o.base_uri.protocol ? e = "//mce_host" + a.toAbsPath(l, e) : (e = /([^#?]*)([#?]?.*)/.exec(e), e = (s && s.protocol || "http") + "://mce_host" + a.toAbsPath(l, e[1]) + e[2])), e = e.replace(/@@/g, "(mce_at)"), e = /^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@\/]*):?([^:@\/]*))?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/.exec(e), n(i, function(t, n) {
                var r = e[n];
                r && (r = r.replace(/\(mce_at\)/g, "@@")), a[t] = r
            }), s && (a.protocol || (a.protocol = s.protocol), a.userInfo || (a.userInfo = s.userInfo), a.port || "mce_host" !== a.host || (a.port = s.port), a.host && "mce_host" !== a.host || (a.host = s.host), a.source = ""), c && (a.protocol = "")
        }
        var n = e.each,
            r = e.trim,
            i = "source protocol authority userInfo user password host port relative path directory file query anchor".split(" "),
            o = {
                ftp: 21,
                http: 80,
                https: 443,
                mailto: 25
            };
        return t.prototype = {
            setPath: function(e) {
                var t = this;
                e = /^(.*?)\/?(\w+)?$/.exec(e), t.path = e[0], t.directory = e[1], t.file = e[2], t.source = "", t.getURI()
            },
            toRelative: function(e) {
                var n = this,
                    r;
                if ("./" === e) return e;
                if (e = new t(e, {
                        base_uri: n
                    }), "mce_host" != e.host && n.host != e.host && e.host || n.port != e.port || n.protocol != e.protocol && "" !== e.protocol) return e.getURI();
                var i = n.getURI(),
                    o = e.getURI();
                return i == o || "/" == i.charAt(i.length - 1) && i.substr(0, i.length - 1) == o ? i : (r = n.toRelPath(n.path, e.path), e.query && (r += "?" + e.query), e.anchor && (r += "#" + e.anchor), r)
            },
            toAbsolute: function(e, n) {
                return e = new t(e, {
                    base_uri: this
                }), e.getURI(n && this.isSameOrigin(e))
            },
            isSameOrigin: function(e) {
                if (this.host == e.host && this.protocol == e.protocol) {
                    if (this.port == e.port) return !0;
                    var t = o[this.protocol];
                    if (t && (this.port || t) == (e.port || t)) return !0
                }
                return !1
            },
            toRelPath: function(e, t) {
                var n, r = 0,
                    i = "",
                    o, a;
                if (e = e.substring(0, e.lastIndexOf("/")), e = e.split("/"), n = t.split("/"), e.length >= n.length)
                    for (o = 0, a = e.length; a > o; o++)
                        if (o >= n.length || e[o] != n[o]) {
                            r = o + 1;
                            break
                        }
                if (e.length < n.length)
                    for (o = 0, a = n.length; a > o; o++)
                        if (o >= e.length || e[o] != n[o]) {
                            r = o + 1;
                            break
                        }
                if (1 === r) return t;
                for (o = 0, a = e.length - (r - 1); a > o; o++) i += "../";
                for (o = r - 1, a = n.length; a > o; o++) i += o != r - 1 ? "/" + n[o] : n[o];
                return i
            },
            toAbsPath: function(e, t) {
                var r, i = 0,
                    o = [],
                    a, s;
                for (a = /\/$/.test(t) ? "/" : "", e = e.split("/"), t = t.split("/"), n(e, function(e) {
                    e && o.push(e)
                }), e = o, r = t.length - 1, o = []; r >= 0; r--) 0 !== t[r].length && "." !== t[r] && (".." !== t[r] ? i > 0 ? i-- : o.push(t[r]) : i++);
                return r = e.length - i, s = 0 >= r ? o.reverse().join("/") : e.slice(0, r).join("/") + "/" + o.reverse().join("/"), 0 !== s.indexOf("/") && (s = "/" + s), a && s.lastIndexOf("/") !== s.length - 1 && (s += a), s
            },
            getURI: function(e) {
                var t, n = this;
                return (!n.source || e) && (t = "", e || (t += n.protocol ? n.protocol + "://" : "//", n.userInfo && (t += n.userInfo + "@"), n.host && (t += n.host), n.port && (t += ":" + n.port)), n.path && (t += n.path), n.query && (t += "?" + n.query), n.anchor && (t += "#" + n.anchor), n.source = t), n.source
            }
        }, t.parseDataUri = function(e) {
            var t, n;
            return e = decodeURIComponent(e).split(","), n = /data:([^;]+)/.exec(e[0]), n && (t = n[1]), {
                type: t,
                data: e[1]
            }
        }, t
    }), r(U, [d], function(e) {
        function t() {}
        var n = e.each,
            r = e.extend,
            i, o;
        return t.extend = i = function(e) {
            function t() {
                var e, t, n, r = this;
                if (!o && (r.init && r.init.apply(r, arguments), t = r.Mixins))
                    for (e = t.length; e--;) n = t[e], n.init && n.init.apply(r, arguments)
            }

            function a() {
                return this
            }

            function s(e, t) {
                return function() {
                    var n = this,
                        r = n._super,
                        i;
                    return n._super = c[e], i = t.apply(n, arguments), n._super = r, i
                }
            }
            var l = this,
                c = l.prototype,
                u, d, f;
            o = !0, u = new l, o = !1, e.Mixins && (n(e.Mixins, function(t) {
                t = t;
                for (var n in t) "init" !== n && (e[n] = t[n])
            }), c.Mixins && (e.Mixins = c.Mixins.concat(e.Mixins))), e.Methods && n(e.Methods.split(","), function(t) {
                e[t] = a
            }), e.Properties && n(e.Properties.split(","), function(t) {
                var n = "_" + t;
                e[t] = function(e) {
                    var t = this,
                        r;
                    return e !== r ? (t[n] = e, t) : t[n]
                }
            }), e.Statics && n(e.Statics, function(e, n) {
                t[n] = e
            }), e.Defaults && c.Defaults && (e.Defaults = r({}, c.Defaults, e.Defaults));
            for (d in e) f = e[d], "function" == typeof f && c[d] ? u[d] = s(d, f) : u[d] = f;
            return t.prototype = u, t.constructor = t, t.extend = i, t
        }, t
    }), r($, [d], function(e) {
        function t(t) {
            function n() {
                return !1
            }

            function r() {
                return !0
            }

            function i(e, i) {
                var o, s, l, c;
                if (e = e.toLowerCase(), i = i || {}, i.type = e, i.target || (i.target = u), i.preventDefault || (i.preventDefault = function() {
                        i.isDefaultPrevented = r
                    }, i.stopPropagation = function() {
                        i.isPropagationStopped = r
                    }, i.stopImmediatePropagation = function() {
                        i.isImmediatePropagationStopped = r
                    }, i.isDefaultPrevented = n, i.isPropagationStopped = n, i.isImmediatePropagationStopped = n), t.beforeFire && t.beforeFire(i), o = d[e])
                    for (s = 0, l = o.length; l > s; s++) {
                        if (c = o[s], c.once && a(e, c.func), i.isImmediatePropagationStopped()) return i.stopPropagation(), i;
                        if (c.func.call(u, i) === !1) return i.preventDefault(), i
                    }
                return i
            }

            function o(t, r, i, o) {
                var a, s, l;
                if (r === !1 && (r = n), r)
                    for (r = {
                        func: r
                    }, o && e.extend(r, o), s = t.toLowerCase().split(" "), l = s.length; l--;) t = s[l], a = d[t], a || (a = d[t] = [], f(t, !0)), i ? a.unshift(r) : a.push(r);
                return c
            }

            function a(e, t) {
                var n, r, i, o, a;
                if (e)
                    for (o = e.toLowerCase().split(" "), n = o.length; n--;) {
                        if (e = o[n], r = d[e], !e) {
                            for (i in d) f(i, !1), delete d[i];
                            return c
                        }
                        if (r) {
                            if (t)
                                for (a = r.length; a--;) r[a].func === t && (r = r.slice(0, a).concat(r.slice(a + 1)), d[e] = r);
                            else r.length = 0;
                            r.length || (f(e, !1), delete d[e])
                        }
                    } else {
                    for (e in d) f(e, !1);
                    d = {}
                }
                return c
            }

            function s(e, t, n) {
                return o(e, t, n, {
                    once: !0
                })
            }

            function l(e) {
                return e = e.toLowerCase(), !(!d[e] || 0 === d[e].length)
            }
            var c = this,
                u, d = {},
                f;
            t = t || {}, u = t.scope || c, f = t.toggleEvent || n, c.fire = i, c.on = o, c.off = a, c.once = s, c.has = l
        }
        var n = e.makeMap("focus blur focusin focusout click dblclick mousedown mouseup mousemove mouseover beforepaste paste cut copy selectionchange mouseout mouseenter mouseleave wheel keydown keypress keyup input contextmenu dragstart dragend dragover draggesture dragdrop drop drag submit compositionstart compositionend compositionupdate touchstart touchend", " ");
        return t.isNative = function(e) {
            return !!n[e.toLowerCase()]
        }, t
    }), r(q, [], function() {
        function e(e) {
            this.create = e.create
        }
        return e.create = function(t, n) {
            return new e({
                create: function(e, r) {
                    function i(t) {
                        e.set(r, t.value)
                    }

                    function o(e) {
                        t.set(n, e.value)
                    }
                    var a;
                    return e.on("change:" + r, o), t.on("change:" + n, i), a = e._bindings, a || (a = e._bindings = [], e.on("destroy", function() {
                        for (var e = a.length; e--;) a[e]()
                    })), a.push(function() {
                        t.off("change:" + n, i)
                    }), t.get(n)
                }
            })
        }, e
    }), r(j, [$], function(e) {
        function t(t) {
            return t._eventDispatcher || (t._eventDispatcher = new e({
                scope: t,
                toggleEvent: function(n, r) {
                    e.isNative(n) && t.toggleNativeEvent && t.toggleNativeEvent(n, r)
                }
            })), t._eventDispatcher
        }
        return {
            fire: function(e, n, r) {
                var i = this;
                if (i.removed && "remove" !== e) return n;
                if (n = t(i).fire(e, n, r), r !== !1 && i.parent)
                    for (var o = i.parent(); o && !n.isPropagationStopped();) o.fire(e, n, !1), o = o.parent();
                return n
            },
            on: function(e, n, r) {
                return t(this).on(e, n, r)
            },
            off: function(e, n) {
                return t(this).off(e, n)
            },
            once: function(e, n) {
                return t(this).once(e, n)
            },
            hasEventListeners: function(e) {
                return t(this).has(e)
            }
        }
    }), r(K, [q, j, U, d], function(e, t, n, r) {
        function i(e, t) {
            var n, o;
            if (e === t) return !0;
            if (null === e || null === t) return e === t;
            if ("object" != typeof e || "object" != typeof t) return e === t;
            if (r.isArray(t)) {
                if (e.length !== t.length) return !1;
                for (n = e.length; n--;)
                    if (!i(e[n], t[n])) return !1
            }
            o = {};
            for (n in t) {
                if (!i(e[n], t[n])) return !1;
                o[n] = !0
            }
            for (n in e)
                if (!o[n] && !i(e[n], t[n])) return !1;
            return !0
        }
        return n.extend({
            Mixins: [t],
            init: function(t) {
                var n, r;
                t = t || {};
                for (n in t) r = t[n], r instanceof e && (t[n] = r.create(this, n));
                this.data = t
            },
            set: function(t, n) {
                var r, o, a = this.data[t];
                if (n instanceof e && (n = n.create(this, t)), "object" == typeof t) {
                    for (r in t) this.set(r, t[r]);
                    return this
                }
                return i(a, n) || (this.data[t] = n, o = {
                    target: this,
                    name: t,
                    value: n,
                    oldValue: a
                }, this.fire("change:" + t, o), this.fire("change", o)), this
            },
            get: function(e) {
                return this.data[e]
            },
            has: function(e) {
                return e in this.data
            },
            bind: function(t) {
                return e.create(this, t)
            },
            destroy: function() {
                this.fire("destroy")
            }
        })
    }), r(Y, [U], function(e) {
        function t(e) {
            for (var t = [], n = e.length, r; n--;) r = e[n], r.__checked || (t.push(r), r.__checked = 1);
            for (n = t.length; n--;) delete t[n].__checked;
            return t
        }
        var n = /^([\w\\*]+)?(?:#([\w\\]+))?(?:\.([\w\\\.]+))?(?:\[\@?([\w\\]+)([\^\$\*!~]?=)([\w\\]+)\])?(?:\:(.+))?/i,
            r = /((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^\[\]]*\]|['"][^'"]*['"]|[^\[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g,
            i = /^\s*|\s*$/g,
            o, a = e.extend({
                init: function(e) {
                    function t(e) {
                        return e ? (e = e.toLowerCase(), function(t) {
                            return "*" === e || t.type === e
                        }) : void 0
                    }

                    function o(e) {
                        return e ? function(t) {
                            return t._name === e
                        } : void 0
                    }

                    function a(e) {
                        return e ? (e = e.split("."), function(t) {
                            for (var n = e.length; n--;)
                                if (!t.classes.contains(e[n])) return !1;
                            return !0
                        }) : void 0
                    }

                    function s(e, t, n) {
                        return e ? function(r) {
                            var i = r[e] ? r[e]() : "";
                            return t ? "=" === t ? i === n : "*=" === t ? i.indexOf(n) >= 0 : "~=" === t ? (" " + i + " ").indexOf(" " + n + " ") >= 0 : "!=" === t ? i != n : "^=" === t ? 0 === i.indexOf(n) : "$=" === t ? i.substr(i.length - n.length) === n : !1 : !!n
                        } : void 0
                    }

                    function l(e) {
                        var t;
                        return e ? (e = /(?:not\((.+)\))|(.+)/i.exec(e), e[1] ? (t = u(e[1], []), function(e) {
                            return !d(e, t)
                        }) : (e = e[2], function(t, n, r) {
                            return "first" === e ? 0 === n : "last" === e ? n === r - 1 : "even" === e ? n % 2 === 0 : "odd" === e ? n % 2 === 1 : t[e] ? t[e]() : !1
                        })) : void 0
                    }

                    function c(e, r, c) {
                        function u(e) {
                            e && r.push(e)
                        }
                        var d;
                        return d = n.exec(e.replace(i, "")), u(t(d[1])), u(o(d[2])), u(a(d[3])), u(s(d[4], d[5], d[6])), u(l(d[7])), r.psuedo = !!d[7], r.direct = c, r
                    }

                    function u(e, t) {
                        var n = [],
                            i, o, a;
                        do
                            if (r.exec(""), o = r.exec(e), o && (e = o[3], n.push(o[1]), o[2])) {
                                i = o[3];
                                break
                            }
                        while (o);
                        for (i && u(i, t), e = [], a = 0; a < n.length; a++) ">" != n[a] && e.push(c(n[a], [], ">" === n[a - 1]));
                        return t.push(e), t
                    }
                    var d = this.match;
                    this._selectors = u(e, [])
                },
                match: function(e, t) {
                    var n, r, i, o, a, s, l, c, u, d, f, h, p;
                    for (t = t || this._selectors, n = 0, r = t.length; r > n; n++) {
                        for (a = t[n], o = a.length, p = e, h = 0, i = o - 1; i >= 0; i--)
                            for (c = a[i]; p;) {
                                if (c.psuedo)
                                    for (f = p.parent().items(), u = d = f.length; u-- && f[u] !== p;);
                                for (s = 0, l = c.length; l > s; s++)
                                    if (!c[s](p, u, d)) {
                                        s = l + 1;
                                        break
                                    }
                                if (s === l) {
                                    h++;
                                    break
                                }
                                if (i === o - 1) break;
                                p = p.parent()
                            }
                        if (h === o) return !0
                    }
                    return !1
                },
                find: function(e) {
                    function n(e, t, i) {
                        var o, a, s, l, c, u = t[i];
                        for (o = 0, a = e.length; a > o; o++) {
                            for (c = e[o], s = 0, l = u.length; l > s; s++)
                                if (!u[s](c, o, a)) {
                                    s = l + 1;
                                    break
                                }
                            if (s === l) i == t.length - 1 ? r.push(c) : c.items && n(c.items(), t, i + 1);
                            else if (u.direct) return;
                            c.items && n(c.items(), t, i)
                        }
                    }
                    var r = [],
                        i, s, l = this._selectors;
                    if (e.items) {
                        for (i = 0, s = l.length; s > i; i++) n(e.items(), l[i], 0);
                        s > 1 && (r = t(r))
                    }
                    return o || (o = a.Collection), new o(r)
                }
            });
        return a
    }), r(G, [d, Y, U], function(e, t, n) {
        var r, i, o = Array.prototype.push,
            a = Array.prototype.slice;
        return i = {
            length: 0,
            init: function(e) {
                e && this.add(e)
            },
            add: function(t) {
                var n = this;
                return e.isArray(t) ? o.apply(n, t) : t instanceof r ? n.add(t.toArray()) : o.call(n, t), n
            },
            set: function(e) {
                var t = this,
                    n = t.length,
                    r;
                for (t.length = 0, t.add(e), r = t.length; n > r; r++) delete t[r];
                return t
            },
            filter: function(e) {
                var n = this,
                    i, o, a = [],
                    s, l;
                for ("string" == typeof e ? (e = new t(e), l = function(t) {
                    return e.match(t)
                }) : l = e, i = 0, o = n.length; o > i; i++) s = n[i], l(s) && a.push(s);
                return new r(a)
            },
            slice: function() {
                return new r(a.apply(this, arguments))
            },
            eq: function(e) {
                return -1 === e ? this.slice(e) : this.slice(e, +e + 1)
            },
            each: function(t) {
                return e.each(this, t), this
            },
            toArray: function() {
                return e.toArray(this)
            },
            indexOf: function(e) {
                for (var t = this, n = t.length; n-- && t[n] !== e;);
                return n
            },
            reverse: function() {
                return new r(e.toArray(this).reverse())
            },
            hasClass: function(e) {
                return this[0] ? this[0].classes.contains(e) : !1
            },
            prop: function(e, t) {
                var n = this,
                    r, i;
                return t !== r ? (n.each(function(n) {
                    n[e] && n[e](t)
                }), n) : (i = n[0], i && i[e] ? i[e]() : void 0)
            },
            exec: function(t) {
                var n = this,
                    r = e.toArray(arguments).slice(1);
                return n.each(function(e) {
                    e[t] && e[t].apply(e, r)
                }), n
            },
            remove: function() {
                for (var e = this.length; e--;) this[e].remove();
                return this
            },
            addClass: function(e) {
                return this.each(function(t) {
                    t.classes.add(e)
                })
            },
            removeClass: function(e) {
                return this.each(function(t) {
                    t.classes.remove(e)
                })
            }
        }, e.each("fire on off show hide append prepend before after reflow".split(" "), function(t) {
            i[t] = function() {
                var n = e.toArray(arguments);
                return this.each(function(e) {
                    t in e && e[t].apply(e, n)
                }), this
            }
        }), e.each("text name disabled active selected checked visible parent value data".split(" "), function(e) {
            i[e] = function(t) {
                return this.prop(e, t)
            }
        }), r = n.extend(i), t.Collection = r, r
    }), r(X, [d, y], function(e, t) {
        var n = 0;
        return {
            id: function() {
                return "mceu_" + n++
            },
            createFragment: function(e) {
                return t.DOM.createFragment(e)
            },
            getWindowSize: function() {
                return t.DOM.getViewPort()
            },
            getSize: function(e) {
                var t, n;
                if (e.getBoundingClientRect) {
                    var r = e.getBoundingClientRect();
                    t = Math.max(r.width || r.right - r.left, e.offsetWidth), n = Math.max(r.height || r.bottom - r.bottom, e.offsetHeight)
                } else t = e.offsetWidth, n = e.offsetHeight;
                return {
                    width: t,
                    height: n
                }
            },
            getPos: function(e, n) {
                return t.DOM.getPos(e, n)
            },
            getViewPort: function(e) {
                return t.DOM.getViewPort(e)
            },
            get: function(e) {
                return document.getElementById(e)
            },
            addClass: function(e, n) {
                return t.DOM.addClass(e, n)
            },
            removeClass: function(e, n) {
                return t.DOM.removeClass(e, n)
            },
            hasClass: function(e, n) {
                return t.DOM.hasClass(e, n)
            },
            toggleClass: function(e, n, r) {
                return t.DOM.toggleClass(e, n, r)
            },
            css: function(e, n, r) {
                return t.DOM.setStyle(e, n, r)
            },
            getRuntimeStyle: function(e, n) {
                return t.DOM.getStyle(e, n, !0)
            },
            on: function(e, n, r, i) {
                return t.DOM.bind(e, n, r, i)
            },
            off: function(e, n, r) {
                return t.DOM.unbind(e, n, r)
            },
            fire: function(e, n, r) {
                return t.DOM.fire(e, n, r)
            },
            innerHtml: function(e, n) {
                t.DOM.setHTML(e, n)
            }
        }
    }), r(J, [], function() {
        return {
            parseBox: function(e) {
                var t, n = 10;
                if (e) return "number" == typeof e ? (e = e || 0, {
                    top: e,
                    left: e,
                    bottom: e,
                    right: e
                }) : (e = e.split(" "), t = e.length, 1 === t ? e[1] = e[2] = e[3] = e[0] : 2 === t ? (e[2] = e[0], e[3] = e[1]) : 3 === t && (e[3] = e[1]), {
                    top: parseInt(e[0], n) || 0,
                    right: parseInt(e[1], n) || 0,
                    bottom: parseInt(e[2], n) || 0,
                    left: parseInt(e[3], n) || 0
                })
            },
            measureBox: function(e, t) {
                function n(t) {
                    var n = document.defaultView;
                    return n ? (t = t.replace(/[A-Z]/g, function(e) {
                        return "-" + e
                    }), n.getComputedStyle(e, null).getPropertyValue(t)) : e.currentStyle[t]
                }

                function r(e) {
                    var t = parseFloat(n(e), 10);
                    return isNaN(t) ? 0 : t
                }
                return {
                    top: r(t + "TopWidth"),
                    right: r(t + "RightWidth"),
                    bottom: r(t + "BottomWidth"),
                    left: r(t + "LeftWidth")
                }
            }
        }
    }), r(Q, [d], function(e) {
        function t() {}

        function n(e) {
            this.cls = [], this.cls._map = {}, this.onchange = e || t, this.prefix = ""
        }
        return e.extend(n.prototype, {
            add: function(e) {
                return e && !this.contains(e) && (this.cls._map[e] = !0, this.cls.push(e), this._change()), this
            },
            remove: function(e) {
                if (this.contains(e)) {
                    for (var t = 0; t < this.cls.length && this.cls[t] !== e; t++);
                    this.cls.splice(t, 1), delete this.cls._map[e], this._change()
                }
                return this
            },
            toggle: function(e, t) {
                var n = this.contains(e);
                return n !== t && (n ? this.remove(e) : this.add(e), this._change()), this
            },
            contains: function(e) {
                return !!this.cls._map[e]
            },
            _change: function() {
                delete this.clsValue, this.onchange.call(this)
            }
        }), n.prototype.toString = function() {
            var e;
            if (this.clsValue) return this.clsValue;
            e = "";
            for (var t = 0; t < this.cls.length; t++) t > 0 && (e += " "), e += this.prefix + this.cls[t];
            return e
        }, n
    }), r(Z, [], function() {
        function e(e, t) {
            function n(e) {
                window.setTimeout(e, 0)
            }
            var r, i = window.requestAnimationFrame,
                o = ["ms", "moz", "webkit"];
            for (r = 0; r < o.length && !i; r++) i = window[o[r] + "RequestAnimationFrame"];
            i || (i = n), i(e, t)
        }
        var t = {},
            n;
        return {
            add: function(r) {
                var i = r.parent();
                if (i) {
                    if (!i._layout || i._layout.isNative()) return;
                    t[i._id] || (t[i._id] = i), n || (n = !0, e(function() {
                        var e, r;
                        n = !1;
                        for (e in t) r = t[e], r.state.get("rendered") && r.reflow();
                        t = {}
                    }, document.body))
                }
            },
            remove: function(e) {
                t[e._id] && delete t[e._id]
            }
        }
    }), r(ee, [U, d, $, K, G, X, f, J, Q, Z], function(e, t, n, r, i, o, a, s, l, c) {
        function u(e) {
            return e._eventDispatcher || (e._eventDispatcher = new n({
                scope: e,
                toggleEvent: function(t, r) {
                    r && n.isNative(t) && (e._nativeEvents || (e._nativeEvents = {}), e._nativeEvents[t] = !0, e.state.get("rendered") && d(e))
                }
            })), e._eventDispatcher
        }

        function d(e) {
            function t(t) {
                var n = e.getParentCtrl(t.target);
                n && n.fire(t.type, t)
            }

            function n() {
                var e = c._lastHoverCtrl;
                e && (e.fire("mouseleave", {
                    target: e.getEl()
                }), e.parents().each(function(e) {
                    e.fire("mouseleave", {
                        target: e.getEl()
                    })
                }), c._lastHoverCtrl = null)
            }

            function r(t) {
                var n = e.getParentCtrl(t.target),
                    r = c._lastHoverCtrl,
                    i = 0,
                    o, a, s;
                if (n !== r) {
                    if (c._lastHoverCtrl = n, a = n.parents().toArray().reverse(), a.push(n), r) {
                        for (s = r.parents().toArray().reverse(), s.push(r), i = 0; i < s.length && a[i] === s[i]; i++);
                        for (o = s.length - 1; o >= i; o--) r = s[o], r.fire("mouseleave", {
                            target: r.getEl()
                        })
                    }
                    for (o = i; o < a.length; o++) n = a[o], n.fire("mouseenter", {
                        target: n.getEl()
                    })
                }
            }

            function i(t) {
                t.preventDefault(), "mousewheel" == t.type ? (t.deltaY = -1 / 40 * t.wheelDelta, t.wheelDeltaX && (t.deltaX = -1 / 40 * t.wheelDeltaX)) : (t.deltaX = 0, t.deltaY = t.detail), t = e.fire("wheel", t)
            }
            var o, s, l, c, u, d;
            if (u = e._nativeEvents) {
                for (l = e.parents().toArray(), l.unshift(e), o = 0, s = l.length; !c && s > o; o++) c = l[o]._eventsRoot;
                for (c || (c = l[l.length - 1] || e), e._eventsRoot = c, s = o, o = 0; s > o; o++) l[o]._eventsRoot = c;
                var p = c._delegates;
                p || (p = c._delegates = {});
                for (d in u) {
                    if (!u) return !1;
                    "wheel" !== d || h ? ("mouseenter" === d || "mouseleave" === d ? c._hasMouseEnter || (a(c.getEl()).on("mouseleave", n).on("mouseover", r), c._hasMouseEnter = 1) : p[d] || (a(c.getEl()).on(d, t), p[d] = !0), u[d] = !1) : f ? a(e.getEl()).on("mousewheel", i) : a(e.getEl()).on("DOMMouseScroll", i)
                }
            }
        }
        var f = "onmousewheel" in document,
            h = !1,
            p = "mce-",
            m, g = 0,
            v = {
                Statics: {
                    classPrefix: p
                },
                isRtl: function() {
                    return m.rtl
                },
                classPrefix: p,
                init: function(e) {
                    function n(e) {
                        var t;
                        for (e = e.split(" "), t = 0; t < e.length; t++) i.classes.add(e[t])
                    }
                    var i = this,
                        o, c;
                    i.settings = e = t.extend({}, i.Defaults, e), i._id = e.id || "tinymce-" + g++, i._aria = {
                        role: e.role
                    }, i._elmCache = {}, i.$ = a, i.state = new r({
                        visible: !0,
                        active: !1,
                        disabled: !1,
                        value: ""
                    }), i.data = new r(e.data), i.classes = new l(function() {
                        i.state.get("rendered") && (i.getEl().className = this.toString())
                    }), i.classes.prefix = i.classPrefix, o = e.classes, o && (i.Defaults && (c = i.Defaults.classes, c && o != c && n(c)), n(o)), t.each("title text name visible disabled active value".split(" "), function(t) {
                        t in e && i[t](e[t])
                    }), i.on("click", function() {
                        return i.disabled() ? !1 : void 0
                    }), i.settings = e, i.borderBox = s.parseBox(e.border), i.paddingBox = s.parseBox(e.padding), i.marginBox = s.parseBox(e.margin), e.hidden && i.hide()
                },
                Properties: "parent,name",
                getContainerElm: function() {
                    return document.body
                },
                getParentCtrl: function(e) {
                    for (var t, n = this.getRoot().controlIdLookup; e && n && !(t = n[e.id]);) e = e.parentNode;
                    return t
                },
                initLayoutRect: function() {
                    var e = this,
                        t = e.settings,
                        n, r, i = e.getEl(),
                        a, l, c, u, d, f, h, p;
                    n = e.borderBox = e.borderBox || s.measureBox(i, "border"), e.paddingBox = e.paddingBox || s.measureBox(i, "padding"), e.marginBox = e.marginBox || s.measureBox(i, "margin"), p = o.getSize(i), f = t.minWidth, h = t.minHeight, c = f || p.width, u = h || p.height, a = t.width, l = t.height, d = t.autoResize, d = "undefined" != typeof d ? d : !a && !l, a = a || c, l = l || u;
                    var m = n.left + n.right,
                        g = n.top + n.bottom,
                        v = t.maxWidth || 65535,
                        y = t.maxHeight || 65535;
                    return e._layoutRect = r = {
                        x: t.x || 0,
                        y: t.y || 0,
                        w: a,
                        h: l,
                        deltaW: m,
                        deltaH: g,
                        contentW: a - m,
                        contentH: l - g,
                        innerW: a - m,
                        innerH: l - g,
                        startMinWidth: f || 0,
                        startMinHeight: h || 0,
                        minW: Math.min(c, v),
                        minH: Math.min(u, y),
                        maxW: v,
                        maxH: y,
                        autoResize: d,
                        scrollW: 0
                    }, e._lastLayoutRect = {}, r
                },
                layoutRect: function(e) {
                    var t = this,
                        n = t._layoutRect,
                        r, i, o, a, s, l;
                    return n || (n = t.initLayoutRect()), e ? (o = n.deltaW, a = n.deltaH, e.x !== s && (n.x = e.x), e.y !== s && (n.y = e.y), e.minW !== s && (n.minW = e.minW), e.minH !== s && (n.minH = e.minH), i = e.w, i !== s && (i = i < n.minW ? n.minW : i, i = i > n.maxW ? n.maxW : i, n.w = i, n.innerW = i - o), i = e.h, i !== s && (i = i < n.minH ? n.minH : i, i = i > n.maxH ? n.maxH : i, n.h = i, n.innerH = i - a), i = e.innerW, i !== s && (i = i < n.minW - o ? n.minW - o : i, i = i > n.maxW - o ? n.maxW - o : i, n.innerW = i, n.w = i + o), i = e.innerH, i !== s && (i = i < n.minH - a ? n.minH - a : i, i = i > n.maxH - a ? n.maxH - a : i, n.innerH = i, n.h = i + a), e.contentW !== s && (n.contentW = e.contentW), e.contentH !== s && (n.contentH = e.contentH), r = t._lastLayoutRect, (r.x !== n.x || r.y !== n.y || r.w !== n.w || r.h !== n.h) && (l = m.repaintControls, l && l.map && !l.map[t._id] && (l.push(t), l.map[t._id] = !0), r.x = n.x, r.y = n.y, r.w = n.w, r.h = n.h), t) : n
                },
                repaint: function() {
                    var e = this,
                        t, n, r, i, o, a = 0,
                        s = 0,
                        l, c, u;
                    c = document.createRange ? function(e) {
                        return e
                    } : Math.round, t = e.getEl().style, i = e._layoutRect, l = e._lastRepaintRect || {}, o = e.borderBox, a = o.left + o.right, s = o.top + o.bottom, i.x !== l.x && (t.left = c(i.x) + "px", l.x = i.x), i.y !== l.y && (t.top = c(i.y) + "px", l.y = i.y), i.w !== l.w && (u = c(i.w - a), t.width = (u >= 0 ? u : 0) + "px", l.w = i.w), i.h !== l.h && (u = c(i.h - s), t.height = (u >= 0 ? u : 0) + "px", l.h = i.h), e._hasBody && i.innerW !== l.innerW && (u = c(i.innerW), r = e.getEl("body"), r && (n = r.style, n.width = (u >= 0 ? u : 0) + "px"), l.innerW = i.innerW), e._hasBody && i.innerH !== l.innerH && (u = c(i.innerH), r = r || e.getEl("body"), r && (n = n || r.style, n.height = (u >= 0 ? u : 0) + "px"), l.innerH = i.innerH), e._lastRepaintRect = l, e.fire("repaint", {}, !1)
                },
                on: function(e, t) {
                    function n(e) {
                        var t, n;
                        return "string" != typeof e ? e : function(i) {
                            return t || r.parentsAndSelf().each(function(r) {
                                var i = r.settings.callbacks;
                                return i && (t = i[e]) ? (n = r, !1) : void 0
                            }), t ? t.call(n, i) : (i.action = e, void this.fire("execute", i))
                        }
                    }
                    var r = this;
                    return u(r).on(e, n(t)), r
                },
                off: function(e, t) {
                    return u(this).off(e, t), this
                },
                fire: function(e, t, n) {
                    var r = this;
                    if (t = t || {}, t.control || (t.control = r), t = u(r).fire(e, t), n !== !1 && r.parent)
                        for (var i = r.parent(); i && !t.isPropagationStopped();) i.fire(e, t, !1), i = i.parent();
                    return t
                },
                hasEventListeners: function(e) {
                    return u(this).has(e)
                },
                parents: function(e) {
                    var t = this,
                        n, r = new i;
                    for (n = t.parent(); n; n = n.parent()) r.add(n);
                    return e && (r = r.filter(e)), r
                },
                parentsAndSelf: function(e) {
                    return new i(this).add(this.parents(e))
                },
                next: function() {
                    var e = this.parent().items();
                    return e[e.indexOf(this) + 1]
                },
                prev: function() {
                    var e = this.parent().items();
                    return e[e.indexOf(this) - 1]
                },
                innerHtml: function(e) {
                    return this.$el.html(e), this
                },
                getEl: function(e) {
                    var t = e ? this._id + "-" + e : this._id;
                    return this._elmCache[t] || (this._elmCache[t] = a("#" + t)[0]), this._elmCache[t]
                },
                show: function() {
                    return this.visible(!0)
                },
                hide: function() {
                    return this.visible(!1)
                },
                focus: function() {
                    try {
                        this.getEl().focus()
                    } catch (e) {}
                    return this
                },
                blur: function() {
                    return this.getEl().blur(), this
                },
                aria: function(e, t) {
                    var n = this,
                        r = n.getEl(n.ariaTarget);
                    return "undefined" == typeof t ? n._aria[e] : (n._aria[e] = t, n.state.get("rendered") && r.setAttribute("role" == e ? e : "aria-" + e, t), n)
                },
                encode: function(e, t) {
                    return t !== !1 && (e = this.translate(e)), (e || "").replace(/[&<>"]/g, function(e) {
                        return "&#" + e.charCodeAt(0) + ";"
                    })
                },
                translate: function(e) {
                    return m.translate ? m.translate(e) : e
                },
                before: function(e) {
                    var t = this,
                        n = t.parent();
                    return n && n.insert(e, n.items().indexOf(t), !0), t
                },
                after: function(e) {
                    var t = this,
                        n = t.parent();
                    return n && n.insert(e, n.items().indexOf(t)), t
                },
                remove: function() {
                    var e = this,
                        t = e.getEl(),
                        n = e.parent(),
                        r, i;
                    if (e.items) {
                        var o = e.items().toArray();
                        for (i = o.length; i--;) o[i].remove()
                    }
                    n && n.items && (r = [], n.items().each(function(t) {
                        t !== e && r.push(t)
                    }), n.items().set(r), n._lastRect = null), e._eventsRoot && e._eventsRoot == e && a(t).off();
                    var s = e.getRoot().controlIdLookup;
                    return s && delete s[e._id], t && t.parentNode && t.parentNode.removeChild(t), e.state.set("rendered", !1), e.state.destroy(), e.fire("remove"), e
                },
                renderBefore: function(e) {
                    return a(e).before(this.renderHtml()), this.postRender(), this
                },
                renderTo: function(e) {
                    return a(e || this.getContainerElm()).append(this.renderHtml()), this.postRender(), this
                },
                preRender: function() {},
                render: function() {},
                renderHtml: function() {
                    return '<div id="' + this._id + '" class="' + this.classes + '"></div>'
                },
                postRender: function() {
                    var e = this,
                        t = e.settings,
                        n, r, i, o, s;
                    e.$el = a(e.getEl()), e.state.set("rendered", !0);
                    for (o in t) 0 === o.indexOf("on") && e.on(o.substr(2), t[o]);
                    if (e._eventsRoot) {
                        for (i = e.parent(); !s && i; i = i.parent()) s = i._eventsRoot;
                        if (s)
                            for (o in s._nativeEvents) e._nativeEvents[o] = !0
                    }
                    d(e), t.style && (n = e.getEl(), n && (n.setAttribute("style", t.style), n.style.cssText = t.style)), e.settings.border && (r = e.borderBox, e.$el.css({
                        "border-top-width": r.top,
                        "border-right-width": r.right,
                        "border-bottom-width": r.bottom,
                        "border-left-width": r.left
                    }));
                    var l = e.getRoot();
                    l.controlIdLookup || (l.controlIdLookup = {}), l.controlIdLookup[e._id] = e;
                    for (var u in e._aria) e.aria(u, e._aria[u]);
                    e.state.get("visible") === !1 && (e.getEl().style.display = "none"), e.bindStates(), e.state.on("change:visible", function(t) {
                        var n = t.value,
                            r;
                        e.state.get("rendered") && (e.getEl().style.display = n === !1 ? "none" : "", e.getEl().getBoundingClientRect()), r = e.parent(), r && (r._lastRect = null), e.fire(n ? "show" : "hide"), c.add(e)
                    }), e.fire("postrender", {}, !1)
                },
                bindStates: function() {},
                scrollIntoView: function(e) {
                    function t(e, t) {
                        var n, r, i = e;
                        for (n = r = 0; i && i != t && i.nodeType;) n += i.offsetLeft || 0, r += i.offsetTop || 0, i = i.offsetParent;
                        return {
                            x: n,
                            y: r
                        }
                    }
                    var n = this.getEl(),
                        r = n.parentNode,
                        i, o, a, s, l, c, u = t(n, r);
                    return i = u.x, o = u.y, a = n.offsetWidth, s = n.offsetHeight, l = r.clientWidth, c = r.clientHeight, "end" == e ? (i -= l - a, o -= c - s) : "center" == e && (i -= l / 2 - a / 2, o -= c / 2 - s / 2), r.scrollLeft = i, r.scrollTop = o, this
                },
                getRoot: function() {
                    for (var e = this, t, n = []; e;) {
                        if (e.rootControl) {
                            t = e.rootControl;
                            break
                        }
                        n.push(e), t = e, e = e.parent()
                    }
                    t || (t = this);
                    for (var r = n.length; r--;) n[r].rootControl = t;
                    return t
                },
                reflow: function() {
                    c.remove(this);
                    var e = this.parent();
                    return e._layout && !e._layout.isNative() && e.reflow(), this
                }
            };
        return t.each("text title visible disabled active value".split(" "), function(e) {
            v[e] = function(t) {
                return 0 === arguments.length ? this.state.get(e) : ("undefined" != typeof t && this.state.set(e, t), this)
            }
        }), m = e.extend(v)
    }), r(te, [], function() {
        var e = {},
            t;
        return {
            add: function(t, n) {
                e[t.toLowerCase()] = n
            },
            has: function(t) {
                return !!e[t.toLowerCase()]
            },
            create: function(n, r) {
                var i, o, a;
                if (!t) {
                    a = tinymce.ui;
                    for (o in a) e[o.toLowerCase()] = a[o];
                    t = !0
                }
                if ("string" == typeof n ? (r = r || {}, r.type = n) : (r = n, n = r.type), n = n.toLowerCase(), i = e[n], !i) throw new Error("Could not find control by type: " + n);
                return i = new i(r), i.type = n, i
            }
        }
    }), r(ne, [], function() {
        return function(e) {
            function t(e) {
                return e && 1 === e.nodeType
            }

            function n(e) {
                return e = e || x, t(e) ? e.getAttribute("role") : null
            }

            function r(e) {
                for (var t, r = e || x; r = r.parentNode;)
                    if (t = n(r)) return t
            }

            function i(e) {
                var n = x;
                return t(n) ? n.getAttribute("aria-" + e) : void 0
            }

            function o(e) {
                var t = e.tagName.toUpperCase();
                return "INPUT" == t || "TEXTAREA" == t
            }

            function a(e) {
                return o(e) && !e.hidden ? !0 : /^(button|menuitem|checkbox|tab|menuitemcheckbox|option|gridcell)$/.test(n(e)) ? !0 : !1
            }

            function s(e) {
                function t(e) {
                    if (1 == e.nodeType && "none" != e.style.display) {
                        a(e) && n.push(e);
                        for (var r = 0; r < e.childNodes.length; r++) t(e.childNodes[r])
                    }
                }
                var n = [];
                return t(e || b.getEl()), n
            }

            function l(e) {
                var t, n;
                e = e || C, n = e.parents().toArray(), n.unshift(e);
                for (var r = 0; r < n.length && (t = n[r], !t.settings.ariaRoot); r++);
                return t
            }

            function c(e) {
                var t = l(e),
                    n = s(t.getEl());
                t.settings.ariaRemember && "lastAriaIndex" in t ? u(t.lastAriaIndex, n) : u(0, n)
            }

            function u(e, t) {
                return 0 > e ? e = t.length - 1 : e >= t.length && (e = 0), t[e] && t[e].focus(), e
            }

            function d(e, t) {
                var n = -1,
                    r = l();
                t = t || s(r.getEl());
                for (var i = 0; i < t.length; i++) t[i] === x && (n = i);
                n += e, r.lastAriaIndex = u(n, t)
            }

            function f() {
                var e = r();
                "tablist" == e ? d(-1, s(x.parentNode)) : C.parent().submenu ? v() : d(-1)
            }

            function h() {
                var e = n(),
                    t = r();
                "tablist" == t ? d(1, s(x.parentNode)) : "menuitem" == e && "menu" == t && i("haspopup") ? y() : d(1)
            }

            function p() {
                d(-1)
            }

            function m() {
                var e = n(),
                    t = r();
                "menuitem" == e && "menubar" == t ? y() : "button" == e && i("haspopup") ? y({
                    key: "down"
                }) : d(1)
            }

            function g(e) {
                var t = r();
                if ("tablist" == t) {
                    var n = s(C.getEl("body"))[0];
                    n && n.focus()
                } else d(e.shiftKey ? -1 : 1)
            }

            function v() {
                C.fire("cancel")
            }

            function y(e) {
                e = e || {}, C.fire("click", {
                    target: x,
                    aria: e
                })
            }
            var b = e.root,
                x, C;
            try {
                x = document.activeElement
            } catch (w) {
                x = document.body
            }
            return C = b.getParentCtrl(x), b.on("keydown", function(e) {
                function t(e, t) {
                    o(x) || t(e) !== !1 && e.preventDefault()
                }
                if (!e.isDefaultPrevented()) switch (e.keyCode) {
                    case 37:
                        t(e, f);
                        break;
                    case 39:
                        t(e, h);
                        break;
                    case 38:
                        t(e, p);
                        break;
                    case 40:
                        t(e, m);
                        break;
                    case 27:
                        v();
                        break;
                    case 14:
                    case 13:
                    case 32:
                        t(e, y);
                        break;
                    case 9:
                        g(e) !== !1 && e.preventDefault()
                }
            }), b.on("focusin", function(e) {
                x = e.target, C = e.control
            }), {
                focusFirst: c
            }
        }
    }), r(re, [ee, G, Y, te, ne, d, f, Q, Z], function(e, t, n, r, i, o, a, s, l) {
        var c = {};
        return e.extend({
            init: function(e) {
                var n = this;
                n._super(e), e = n.settings, e.fixed && n.state.set("fixed", !0), n._items = new t, n.isRtl() && n.classes.add("rtl"), n.bodyClasses = new s(function() {
                    n.state.get("rendered") && (n.getEl("body").className = this.toString())
                }), n.bodyClasses.prefix = n.classPrefix, n.classes.add("container"), n.bodyClasses.add("container-body"), e.containerCls && n.classes.add(e.containerCls), n._layout = r.create((e.layout || "") + "layout"), n.add(n.settings.items ? n.settings.items : n.render()), n._hasBody = !0
            },
            items: function() {
                return this._items
            },
            find: function(e) {
                return e = c[e] = c[e] || new n(e), e.find(this)
            },
            add: function(e) {
                var t = this;
                return t.items().add(t.create(e)).parent(t), t
            },
            focus: function(e) {
                var t = this,
                    n, r, i;
                return e && (r = t.keyboardNav || t.parents().eq(-1)[0].keyboardNav) ? void r.focusFirst(t) : (i = t.find("*"), t.statusbar && i.add(t.statusbar.items()), i.each(function(e) {
                    return e.settings.autofocus ? (n = null, !1) : void(e.canFocus && (n = n || e))
                }), n && n.focus(), t)
            },
            replace: function(e, t) {
                for (var n, r = this.items(), i = r.length; i--;)
                    if (r[i] === e) {
                        r[i] = t;
                        break
                    }
                i >= 0 && (n = t.getEl(), n && n.parentNode.removeChild(n), n = e.getEl(), n && n.parentNode.removeChild(n)), t.parent(this)
            },
            create: function(t) {
                var n = this,
                    i, a = [];
                return o.isArray(t) || (t = [t]), o.each(t, function(t) {
                    t && (t instanceof e || ("string" == typeof t && (t = {
                        type: t
                    }), i = o.extend({}, n.settings.defaults, t), t.type = i.type = i.type || t.type || n.settings.defaultType || (i.defaults ? i.defaults.type : null), t = r.create(i)), a.push(t))
                }), a
            },
            renderNew: function() {
                var e = this;
                return e.items().each(function(t, n) {
                    var r;
                    t.parent(e), t.state.get("rendered") || (r = e.getEl("body"), r.hasChildNodes() && n <= r.childNodes.length - 1 ? a(r.childNodes[n]).before(t.renderHtml()) : a(r).append(t.renderHtml()), t.postRender(), l.add(t))
                }), e._layout.applyClasses(e.items().filter(":visible")), e._lastRect = null, e
            },
            append: function(e) {
                return this.add(e).renderNew()
            },
            prepend: function(e) {
                var t = this;
                return t.items().set(t.create(e).concat(t.items().toArray())), t.renderNew()
            },
            insert: function(e, t, n) {
                var r = this,
                    i, o, a;
                return e = r.create(e), i = r.items(), !n && t < i.length - 1 && (t += 1), t >= 0 && t < i.length && (o = i.slice(0, t).toArray(), a = i.slice(t).toArray(), i.set(o.concat(e, a))), r.renderNew()
            },
            fromJSON: function(e) {
                var t = this;
                for (var n in e) t.find("#" + n).value(e[n]);
                return t
            },
            toJSON: function() {
                var e = this,
                    t = {};
                return e.find("*").each(function(e) {
                    var n = e.name(),
                        r = e.value();
                    n && "undefined" != typeof r && (t[n] = r)
                }), t
            },
            renderHtml: function() {
                var e = this,
                    t = e._layout,
                    n = this.settings.role;
                return e.preRender(), t.preRender(e), '<div id="' + e._id + '" class="' + e.classes + '"' + (n ? ' role="' + this.settings.role + '"' : "") + '><div id="' + e._id + '-body" class="' + e.bodyClasses + '">' + (e.settings.html || "") + t.renderHtml(e) + "</div></div>"
            },
            postRender: function() {
                var e = this,
                    t;
                return e.items().exec("postRender"), e._super(), e._layout.postRender(e), e.state.set("rendered", !0), e.settings.style && e.$el.css(e.settings.style), e.settings.border && (t = e.borderBox, e.$el.css({
                    "border-top-width": t.top,
                    "border-right-width": t.right,
                    "border-bottom-width": t.bottom,
                    "border-left-width": t.left
                })), e.parent() || (e.keyboardNav = new i({
                    root: e
                })), e
            },
            initLayoutRect: function() {
                var e = this,
                    t = e._super();
                return e._layout.recalc(e), t
            },
            recalc: function() {
                var e = this,
                    t = e._layoutRect,
                    n = e._lastRect;
                return n && n.w == t.w && n.h == t.h ? void 0 : (e._layout.recalc(e), t = e.layoutRect(), e._lastRect = {
                    x: t.x,
                    y: t.y,
                    w: t.w,
                    h: t.h
                }, !0)
            },
            reflow: function() {
                var t;
                if (l.remove(this), this.visible()) {
                    for (e.repaintControls = [], e.repaintControls.map = {}, this.recalc(), t = e.repaintControls.length; t--;) e.repaintControls[t].repaint();
                    "flow" !== this.settings.layout && "stack" !== this.settings.layout && this.repaint(), e.repaintControls = []
                }
                return this
            }
        })
    }), r(ie, [f], function(e) {
        function t(e) {
            var t, n, r, i, o, a, s, l, c = Math.max;
            return t = e.documentElement, n = e.body, r = c(t.scrollWidth, n.scrollWidth), i = c(t.clientWidth, n.clientWidth), o = c(t.offsetWidth, n.offsetWidth), a = c(t.scrollHeight, n.scrollHeight), s = c(t.clientHeight, n.clientHeight), l = c(t.offsetHeight, n.offsetHeight), {
                width: o > r ? i : r,
                height: l > a ? s : a
            }
        }

        function n(e) {
            var t, n;
            if (e.changedTouches)
                for (t = "screenX screenY pageX pageY clientX clientY".split(" "), n = 0; n < t.length; n++) e[t[n]] = e.changedTouches[0][t[n]]
        }
        return function(r, i) {
            function o() {
                return s.getElementById(i.handle || r)
            }
            var a, s = i.document || document,
                l, c, u, d, f, h;
            i = i || {}, c = function(r) {
                var c = t(s),
                    p, m;
                n(r), r.preventDefault(), l = r.button, p = o(), f = r.screenX, h = r.screenY, m = window.getComputedStyle ? window.getComputedStyle(p, null).getPropertyValue("cursor") : p.runtimeStyle.cursor, a = e("<div>").css({
                    position: "absolute",
                    top: 0,
                    left: 0,
                    width: c.width,
                    height: c.height,
                    zIndex: 2147483647,
                    opacity: 1e-4,
                    cursor: m
                }).appendTo(s.body), e(s).on("mousemove touchmove", d).on("mouseup touchend", u), i.start(r)
            }, d = function(e) {
                return n(e), e.button !== l ? u(e) : (e.deltaX = e.screenX - f, e.deltaY = e.screenY - h, e.preventDefault(), void i.drag(e))
            }, u = function(t) {
                n(t), e(s).off("mousemove touchmove", d).off("mouseup touchend", u), a.remove(), i.stop && i.stop(t)
            }, this.destroy = function() {
                e(o()).off()
            }, e(o()).on("mousedown touchstart", c)
        }
    }), r(oe, [f, ie], function(e, t) {
        return {
            init: function() {
                var e = this;
                e.on("repaint", e.renderScroll)
            },
            renderScroll: function() {
                function n() {
                    function t(t, a, s, l, c, u) {
                        var d, f, h, p, m, g, v, y, b;
                        if (f = i.getEl("scroll" + t)) {
                            if (y = a.toLowerCase(), b = s.toLowerCase(), e(i.getEl("absend")).css(y, i.layoutRect()[l] - 1), !c) return void e(f).css("display", "none");
                            e(f).css("display", "block"), d = i.getEl("body"), h = i.getEl("scroll" + t + "t"), p = d["client" + s] - 2 * o, p -= n && r ? f["client" + u] : 0, m = d["scroll" + s], g = p / m, v = {}, v[y] = d["offset" + a] + o, v[b] = p, e(f).css(v), v = {}, v[y] = d["scroll" + a] * g, v[b] = p * g, e(h).css(v)
                        }
                    }
                    var n, r, a;
                    a = i.getEl("body"), n = a.scrollWidth > a.clientWidth, r = a.scrollHeight > a.clientHeight, t("h", "Left", "Width", "contentW", n, "Height"), t("v", "Top", "Height", "contentH", r, "Width")
                }

                function r() {
                    function n(n, r, a, s, l) {
                        var c, u = i._id + "-scroll" + n,
                            d = i.classPrefix;
                        e(i.getEl()).append('<div id="' + u + '" class="' + d + "scrollbar " + d + "scrollbar-" + n + '"><div id="' + u + 't" class="' + d + 'scrollbar-thumb"></div></div>'), i.draghelper = new t(u + "t", {
                            start: function() {
                                c = i.getEl("body")["scroll" + r], e("#" + u).addClass(d + "active")
                            },
                            drag: function(e) {
                                var t, u, d, f, h = i.layoutRect();
                                u = h.contentW > h.innerW, d = h.contentH > h.innerH, f = i.getEl("body")["client" + a] - 2 * o, f -= u && d ? i.getEl("scroll" + n)["client" + l] : 0, t = f / i.getEl("body")["scroll" + a], i.getEl("body")["scroll" + r] = c + e["delta" + s] / t
                            },
                            stop: function() {
                                e("#" + u).removeClass(d + "active")
                            }
                        })
                    }
                    i.classes.add("scroll"), n("v", "Top", "Height", "Y", "Width"), n("h", "Left", "Width", "X", "Height")
                }
                var i = this,
                    o = 2;
                i.settings.autoScroll && (i._hasScroll || (i._hasScroll = !0, r(), i.on("wheel", function(e) {
                    var t = i.getEl("body");
                    t.scrollLeft += 10 * (e.deltaX || 0), t.scrollTop += 10 * e.deltaY, n()
                }), e(i.getEl("body")).on("scroll", n)), n())
            }
        }
    }), r(ae, [re, oe], function(e, t) {
        return e.extend({
            Defaults: {
                layout: "fit",
                containerCls: "panel"
            },
            Mixins: [t],
            renderHtml: function() {
                var e = this,
                    t = e._layout,
                    n = e.settings.html;
                return e.preRender(), t.preRender(e), "undefined" == typeof n ? n = '<div id="' + e._id + '-body" class="' + e.bodyClasses + '">' + t.renderHtml(e) + "</div>" : ("function" == typeof n && (n = n.call(e)), e._hasBody = !1), '<div id="' + e._id + '" class="' + e.classes + '" hidefocus="1" tabindex="-1" role="group">' + (e._preBodyHtml || "") + n + "</div>"
            }
        })
    }), r(se, [X], function(e) {
        function t(t, n, r) {
            var i, o, a, s, l, c, u, d, f, h;
            return f = e.getViewPort(), o = e.getPos(n), a = o.x, s = o.y, t.state.get("fixed") && "static" == e.getRuntimeStyle(document.body, "position") && (a -= f.x, s -= f.y), i = t.getEl(), h = e.getSize(i), l = h.width, c = h.height, h = e.getSize(n), u = h.width, d = h.height, r = (r || "").split(""), "b" === r[0] && (s += d), "r" === r[1] && (a += u), "c" === r[0] && (s += Math.round(d / 2)), "c" === r[1] && (a += Math.round(u / 2)), "b" === r[3] && (s -= c), "r" === r[4] && (a -= l), "c" === r[3] && (s -= Math.round(c / 2)), "c" === r[4] && (a -= Math.round(l / 2)), {
                x: a,
                y: s,
                w: l,
                h: c
            }
        }
        return {
            testMoveRel: function(n, r) {
                for (var i = e.getViewPort(), o = 0; o < r.length; o++) {
                    var a = t(this, n, r[o]);
                    if (this.state.get("fixed")) {
                        if (a.x > 0 && a.x + a.w < i.w && a.y > 0 && a.y + a.h < i.h) return r[o]
                    } else if (a.x > i.x && a.x + a.w < i.w + i.x && a.y > i.y && a.y + a.h < i.h + i.y) return r[o]
                }
                return r[0]
            },
            moveRel: function(e, n) {
                "string" != typeof n && (n = this.testMoveRel(e, n));
                var r = t(this, e, n);
                return this.moveTo(r.x, r.y)
            },
            moveBy: function(e, t) {
                var n = this,
                    r = n.layoutRect();
                return n.moveTo(r.x + e, r.y + t), n
            },
            moveTo: function(t, n) {
                function r(e, t, n) {
                    return 0 > e ? 0 : e + n > t ? (e = t - n, 0 > e ? 0 : e) : e
                }
                var i = this;
                if (i.settings.constrainToViewport) {
                    var o = e.getViewPort(window),
                        a = i.layoutRect();
                    t = r(t, o.w + o.x, a.w), n = r(n, o.h + o.y, a.h)
                }
                return i.state.get("rendered") ? i.layoutRect({
                    x: t,
                    y: n
                }).repaint() : (i.settings.x = t, i.settings.y = n), i.fire("move", {
                    x: t,
                    y: n
                }), i
            }
        }
    }), r(le, [X], function(e) {
        return {
            resizeToContent: function() {
                this._layoutRect.autoResize = !0, this._lastRect = null, this.reflow()
            },
            resizeTo: function(t, n) {
                if (1 >= t || 1 >= n) {
                    var r = e.getWindowSize();
                    t = 1 >= t ? t * r.w : t, n = 1 >= n ? n * r.h : n
                }
                return this._layoutRect.autoResize = !1, this.layoutRect({
                    minW: t,
                    minH: n,
                    w: t,
                    h: n
                }).reflow()
            },
            resizeBy: function(e, t) {
                var n = this,
                    r = n.layoutRect();
                return n.resizeTo(r.w + e, r.h + t)
            }
        }
    }), r(ce, [ae, se, le, X, f], function(e, t, n, r, i) {
        function o(e, t) {
            for (; e;) {
                if (e == t) return !0;
                e = e.parent()
            }
        }

        function a(e) {
            for (var t = g.length; t--;) {
                var n = g[t],
                    r = n.getParentCtrl(e.target);
                if (n.settings.autohide) {
                    if (r && (o(r, n) || n.parent() === r)) continue;
                    e = n.fire("autohide", {
                        target: e.target
                    }), e.isDefaultPrevented() || n.hide()
                }
            }
        }

        function s() {
            h || (h = function(e) {
                2 != e.button && a(e)
            }, i(document).on("click touchstart", h))
        }

        function l() {
            p || (p = function() {
                var e;
                for (e = g.length; e--;) u(g[e])
            }, i(window).on("scroll", p))
        }

        function c() {
            if (!m) {
                var e = document.documentElement,
                    t = e.clientWidth,
                    n = e.clientHeight;
                m = function() {
                    document.all && t == e.clientWidth && n == e.clientHeight || (t = e.clientWidth, n = e.clientHeight, b.hideAll())
                }, i(window).on("resize", m)
            }
        }

        function u(e) {
            function t(t, n) {
                for (var r, i = 0; i < g.length; i++)
                    if (g[i] != e)
                        for (r = g[i].parent(); r && (r = r.parent());) r == e && g[i].fixed(t).moveBy(0, n).repaint()
            }
            var n = r.getViewPort().y;
            e.settings.autofix && (e.state.get("fixed") ? e._autoFixY > n && (e.fixed(!1).layoutRect({
                y: e._autoFixY
            }).repaint(), t(!1, e._autoFixY - n)) : (e._autoFixY = e.layoutRect().y, e._autoFixY < n && (e.fixed(!0).layoutRect({
                y: 0
            }).repaint(), t(!0, n - e._autoFixY))))
        }

        function d(e, t) {
            var n, r = b.zIndex || 65535,
                o;
            if (e) v.push(t);
            else
                for (n = v.length; n--;) v[n] === t && v.splice(n, 1);
            if (v.length)
                for (n = 0; n < v.length; n++) v[n].modal && (r++, o = v[n]), v[n].getEl().style.zIndex = r, v[n].zIndex = r, r++;
            var a = document.getElementById(t.classPrefix + "modal-block");
            o ? i(a).css("z-index", o.zIndex - 1) : a && (a.parentNode.removeChild(a), y = !1), b.currentZIndex = r
        }

        function f(e) {
            var t;
            for (t = g.length; t--;) g[t] === e && g.splice(t, 1);
            for (t = v.length; t--;) v[t] === e && v.splice(t, 1)
        }
        var h, p, m, g = [],
            v = [],
            y, b = e.extend({
                Mixins: [t, n],
                init: function(e) {
                    var t = this;
                    t._super(e), t._eventsRoot = t, t.classes.add("floatpanel"), e.autohide && (s(), c(), g.push(t)), e.autofix && (l(), t.on("move", function() {
                        u(this)
                    })), t.on("postrender show", function(e) {
                        if (e.control == t) {
                            var n, r = t.classPrefix;
                            t.modal && !y && (n = i("#" + r + "modal-block"), n[0] || (n = i('<div id="' + r + 'modal-block" class="' + r + "reset " + r + 'fade"></div>').appendTo(t.getContainerElm())), setTimeout(function() {
                                n.addClass(r + "in"), i(t.getEl()).addClass(r + "in")
                            }, 0), y = !0), d(!0, t)
                        }
                    }), t.on("show", function() {
                        t.parents().each(function(e) {
                            return e.state.get("fixed") ? (t.fixed(!0), !1) : void 0
                        })
                    }), e.popover && (t._preBodyHtml = '<div class="' + t.classPrefix + 'arrow"></div>', t.classes.add("popover").add("bottom").add(t.isRtl() ? "end" : "start"))
                },
                fixed: function(e) {
                    var t = this;
                    if (t.state.get("fixed") != e) {
                        if (t.state.get("rendered")) {
                            var n = r.getViewPort();
                            e ? t.layoutRect().y -= n.y : t.layoutRect().y += n.y
                        }
                        t.classes.toggle("fixed", e), t.state.set("fixed", e)
                    }
                    return t
                },
                show: function() {
                    var e = this,
                        t, n = e._super();
                    for (t = g.length; t-- && g[t] !== e;);
                    return -1 === t && g.push(e), n
                },
                hide: function() {
                    return f(this), d(!1, this), this._super()
                },
                hideAll: function() {
                    b.hideAll()
                },
                close: function() {
                    var e = this;
                    return e.fire("close").isDefaultPrevented() || (e.remove(), d(!1, e)), e
                },
                remove: function() {
                    f(this), this._super()
                },
                postRender: function() {
                    var e = this;
                    return e.settings.bodyRole && this.getEl("body").setAttribute("role", e.settings.bodyRole), e._super()
                }
            });
        return b.hideAll = function() {
            for (var e = g.length; e--;) {
                var t = g[e];
                t && t.settings.autohide && (t.hide(), g.splice(e, 1))
            }
        }, b
    }), r(ue, [ce, ae, X, f, ie, J, u], function(e, t, n, r, i, o, a) {
        function s(e) {
            var t = "width=device-width,initial-scale=1.0,user-scalable=0,minimum-scale=1.0,maximum-scale=1.0",
                n = r("meta[name=viewport]")[0],
                i;
            a.overrideViewPort !== !1 && (n || (n = document.createElement("meta"), n.setAttribute("name", "viewport"), document.getElementsByTagName("head")[0].appendChild(n)), i = n.getAttribute("content"), i && "undefined" != typeof d && (d = i), n.setAttribute("content", e ? t : d))
        }

        function l(e) {
            for (var t = 0; t < u.length; t++)
                if (u[t]._fullscreen) return;
            r([document.documentElement, document.body]).removeClass(e + "fullscreen")
        }

        function c() {
            function e() {
                var e, t = n.getWindowSize(),
                    r;
                for (e = 0; e < u.length; e++) r = u[e].layoutRect(), u[e].moveTo(u[e].settings.x || Math.max(0, t.w / 2 - r.w / 2), u[e].settings.y || Math.max(0, t.h / 2 - r.h / 2))
            }
            var t = {
                w: window.innerWidth,
                h: window.innerHeight
            };
            window.setInterval(function() {
                var e = window.innerWidth,
                    n = window.innerHeight;
                (t.w != e || t.h != n) && (t = {
                    w: e,
                    h: n
                }, r(window).trigger("resize"))
            }, 0), r(window).on("resize", e)
        }
        var u = [],
            d = "",
            f = e.extend({
                modal: !0,
                Defaults: {
                    border: 1,
                    layout: "flex",
                    containerCls: "panel",
                    role: "dialog",
                    callbacks: {
                        submit: function() {
                            this.fire("submit", {
                                data: this.toJSON()
                            })
                        },
                        close: function() {
                            this.close()
                        }
                    }
                },
                init: function(e) {
                    var n = this;
                    n._super(e), n.isRtl() && n.classes.add("rtl"), n.classes.add("window"), n.bodyClasses.add("window-body"), n.state.set("fixed", !0), e.buttons && (n.statusbar = new t({
                        layout: "flex",
                        border: "1 0 0 0",
                        spacing: 3,
                        padding: 10,
                        align: "center",
                        pack: n.isRtl() ? "start" : "end",
                        defaults: {
                            type: "button"
                        },
                        items: e.buttons
                    }), n.statusbar.classes.add("foot"), n.statusbar.parent(n)), n.on("click", function(e) {
                        -1 != e.target.className.indexOf(n.classPrefix + "close") && n.close()
                    }), n.on("cancel", function() {
                        n.close()
                    }), n.aria("describedby", n.describedBy || n._id + "-none"), n.aria("label", e.title), n._fullscreen = !1
                },
                recalc: function() {
                    var e = this,
                        t = e.statusbar,
                        r, i, o, a;
                    e._fullscreen && (e.layoutRect(n.getWindowSize()), e.layoutRect().contentH = e.layoutRect().innerH), e._super(), r = e.layoutRect(), e.settings.title && !e._fullscreen && (i = r.headerW, i > r.w && (o = r.x - Math.max(0, i / 2), e.layoutRect({
                        w: i,
                        x: o
                    }), a = !0)), t && (t.layoutRect({
                        w: e.layoutRect().innerW
                    }).recalc(), i = t.layoutRect().minW + r.deltaW, i > r.w && (o = r.x - Math.max(0, i - r.w), e.layoutRect({
                        w: i,
                        x: o
                    }), a = !0)), a && e.recalc()
                },
                initLayoutRect: function() {
                    var e = this,
                        t = e._super(),
                        r = 0,
                        i;
                    if (e.settings.title && !e._fullscreen) {
                        i = e.getEl("head");
                        var o = n.getSize(i);
                        t.headerW = o.width, t.headerH = o.height, r += t.headerH
                    }
                    e.statusbar && (r += e.statusbar.layoutRect().h), t.deltaH += r, t.minH += r, t.h += r;
                    var a = n.getWindowSize();
                    return t.x = e.settings.x || Math.max(0, a.w / 2 - t.w / 2), t.y = e.settings.y || Math.max(0, a.h / 2 - t.h / 2), t
                },
                renderHtml: function() {
                    var e = this,
                        t = e._layout,
                        n = e._id,
                        r = e.classPrefix,
                        i = e.settings,
                        o = "",
                        a = "",
                        s = i.html;
                    return e.preRender(), t.preRender(e), i.title && (o = '<div id="' + n + '-head" class="' + r + 'window-head"><div id="' + n + '-title" class="' + r + 'title">' + e.encode(i.title) + '</div><button type="button" class="' + r + 'close" aria-hidden="true">\xd7</button><div id="' + n + '-dragh" class="' + r + 'dragh"></div></div>'), i.url && (s = '<iframe src="' + i.url + '" tabindex="-1"></iframe>'), "undefined" == typeof s && (s = t.renderHtml(e)), e.statusbar && (a = e.statusbar.renderHtml()), '<div id="' + n + '" class="' + e.classes + '" hidefocus="1"><div class="' + e.classPrefix + 'reset" role="application">' + o + '<div id="' + n + '-body" class="' + e.bodyClasses + '">' + s + "</div>" + a + "</div></div>"
                },
                fullscreen: function(e) {
                    var t = this,
                        i = document.documentElement,
                        a, s = t.classPrefix,
                        l;
                    if (e != t._fullscreen)
                        if (r(window).on("resize", function() {
                                var e;
                                if (t._fullscreen)
                                    if (a) t._timer || (t._timer = setTimeout(function() {
                                        var e = n.getWindowSize();
                                        t.moveTo(0, 0).resizeTo(e.w, e.h), t._timer = 0
                                    }, 50));
                                    else {
                                        e = (new Date).getTime();
                                        var r = n.getWindowSize();
                                        t.moveTo(0, 0).resizeTo(r.w, r.h), (new Date).getTime() - e > 50 && (a = !0)
                                    }
                            }), l = t.layoutRect(), t._fullscreen = e, e) {
                            t._initial = {
                                x: l.x,
                                y: l.y,
                                w: l.w,
                                h: l.h
                            }, t.borderBox = o.parseBox("0"), t.getEl("head").style.display = "none", l.deltaH -= l.headerH + 2, r([i, document.body]).addClass(s + "fullscreen"), t.classes.add("fullscreen");
                            var c = n.getWindowSize();
                            t.moveTo(0, 0).resizeTo(c.w, c.h)
                        } else t.borderBox = o.parseBox(t.settings.border), t.getEl("head").style.display = "", l.deltaH += l.headerH, r([i, document.body]).removeClass(s + "fullscreen"), t.classes.remove("fullscreen"), t.moveTo(t._initial.x, t._initial.y).resizeTo(t._initial.w, t._initial.h);
                    return t.reflow()
                },
                postRender: function() {
                    var e = this,
                        t;
                    setTimeout(function() {
                        e.classes.add("in")
                    }, 0), e._super(), e.statusbar && e.statusbar.postRender(), e.focus(), this.dragHelper = new i(e._id + "-dragh", {
                        start: function() {
                            t = {
                                x: e.layoutRect().x,
                                y: e.layoutRect().y
                            }
                        },
                        drag: function(n) {
                            e.moveTo(t.x + n.deltaX, t.y + n.deltaY)
                        }
                    }), e.on("submit", function(t) {
                        t.isDefaultPrevented() || e.close()
                    }), u.push(e), s(!0)
                },
                submit: function() {
                    return this.fire("submit", {
                        data: this.toJSON()
                    })
                },
                remove: function() {
                    var e = this,
                        t;
                    for (e.dragHelper.destroy(), e._super(), e.statusbar && this.statusbar.remove(), t = u.length; t--;) u[t] === e && u.splice(t, 1);
                    s(u.length > 0), l(e.classPrefix)
                },
                getContentWindow: function() {
                    var e = this.getEl().getElementsByTagName("iframe")[0];
                    return e ? e.contentWindow : null
                }
            });
        return a.desktop || c(), f
    }), r(de, [ue], function(e) {
        var t = e.extend({
            init: function(e) {
                e = {
                    border: 1,
                    padding: 20,
                    layout: "flex",
                    pack: "center",
                    align: "center",
                    containerCls: "panel",
                    autoScroll: !0,
                    buttons: {
                        type: "button",
                        text: "Ok",
                        action: "ok"
                    },
                    items: {
                        type: "label",
                        multiline: !0,
                        maxWidth: 500,
                        maxHeight: 200
                    }
                }, this._super(e)
            },
            Statics: {
                OK: 1,
                OK_CANCEL: 2,
                YES_NO: 3,
                YES_NO_CANCEL: 4,
                msgBox: function(n) {
                    function r(e, t, n) {
                        return {
                            type: "button",
                            text: e,
                            subtype: n ? "primary" : "",
                            onClick: function(e) {
                                e.control.parents()[1].close(), o(t)
                            }
                        }
                    }
                    var i, o = n.callback || function() {};
                    switch (n.buttons) {
                        case t.OK_CANCEL:
                            i = [r("Ok", !0, !0), r("Cancel", !1)];
                            break;
                        case t.YES_NO:
                        case t.YES_NO_CANCEL:
                            i = [r("Yes", 1, !0), r("No", 0)], n.buttons == t.YES_NO_CANCEL && i.push(r("Cancel", -1));
                            break;
                        default:
                            i = [r("Ok", !0, !0)]
                    }
                    return new e({
                        padding: 20,
                        x: n.x,
                        y: n.y,
                        minWidth: 300,
                        minHeight: 100,
                        layout: "flex",
                        pack: "center",
                        align: "center",
                        buttons: i,
                        title: n.title,
                        role: "alertdialog",
                        items: {
                            type: "label",
                            multiline: !0,
                            maxWidth: 500,
                            maxHeight: 200,
                            text: n.text
                        },
                        onPostRender: function() {
                            this.aria("describedby", this.items()[0]._id)
                        },
                        onClose: n.onClose,
                        onCancel: function() {
                            o(!1)
                        }
                    }).renderTo(document.body).reflow()
                },
                alert: function(e, n) {
                    return "string" == typeof e && (e = {
                        text: e
                    }), e.callback = n, t.msgBox(e)
                },
                confirm: function(e, n) {
                    return "string" == typeof e && (e = {
                        text: e
                    }), e.callback = n, e.buttons = t.OK_CANCEL, t.msgBox(e)
                }
            }
        });
        return t
    }), r(fe, [ue, de], function(e, t) {
        return function(n) {
            function r() {
                return o.length ? o[o.length - 1] : void 0
            }
            var i = this,
                o = [];
            i.windows = o, n.on("remove", function() {
                for (var e = o.length; e--;) o[e].close()
            }), i.open = function(t, r) {
                var i;
                return n.editorManager.setActive(n), t.title = t.title || " ", t.url = t.url || t.file, t.url && (t.width = parseInt(t.width || 320, 10), t.height = parseInt(t.height || 240, 10)), t.body && (t.items = {
                    defaults: t.defaults,
                    type: t.bodyType || "form",
                    items: t.body
                }), t.url || t.buttons || (t.buttons = [{
                    text: "Ok",
                    subtype: "primary",
                    onclick: function() {
                        i.find("form")[0].submit()
                    }
                }, {
                    text: "Cancel",
                    onclick: function() {
                        i.close()
                    }
                }]), i = new e(t), o.push(i), i.on("close", function() {
                    for (var e = o.length; e--;) o[e] === i && o.splice(e, 1);
                    o.length || n.focus()
                }), t.data && i.on("postRender", function() {
                    this.find("*").each(function(e) {
                        var n = e.name();
                        n in t.data && e.value(t.data[n])
                    })
                }), i.features = t || {}, i.params = r || {}, 1 === o.length && n.nodeChanged(), i.renderTo().reflow()
            }, i.alert = function(e, r, i) {
                t.alert(e, function() {
                    r ? r.call(i || this) : n.focus()
                })
            }, i.confirm = function(e, n, r) {
                t.confirm(e, function(e) {
                    n.call(r || this, e)
                })
            }, i.close = function() {
                r() && r().close()
            }, i.getParams = function() {
                return r() ? r().params : null
            }, i.setParams = function(e) {
                r() && (r().params = e)
            }, i.getWindows = function() {
                return o
            }
        }
    }), r(he, [B, C, p, _, g, u, d], function(e, t, n, r, i, o, a) {
        return function(s) {
            function l(e, t) {
                try {
                    s.getDoc().execCommand(e, !1, t)
                } catch (n) {}
            }

            function c() {
                var e = s.getDoc().documentMode;
                return e ? e : 6
            }

            function u(e) {
                return e.isDefaultPrevented()
            }

            function d(e) {
                var t;
                e.dataTransfer && (s.selection.isCollapsed() && "IMG" == e.target.tagName && J.select(e.target), t = s.selection.getContent(), t.length > 0 && e.dataTransfer.setData(oe, ie + escape(t)))
            }

            function f(e) {
                var t, n;
                return e.dataTransfer && (t = e.dataTransfer.getData(oe), t && t.indexOf(ie) >= 0 && (n = unescape(t.substr(ie.length)))), n
            }

            function h(e) {
                s.queryCommandSupported("mceInsertClipboardContent") ? s.execCommand("mceInsertClipboardContent", !1, {
                    content: e
                }) : s.execCommand("mceInsertContent", !1, e)
            }

            function p() {
                function r(e) {
                    var t = v.schema.getBlockElements(),
                        n = s.getBody();
                    if ("BR" != e.nodeName) return !1;
                    for (e = e; e != n && !t[e.nodeName]; e = e.parentNode)
                        if (e.nextSibling) return !1;
                    return !0
                }

                function i(e, t) {
                    var n;
                    for (n = e.nextSibling; n && n != t; n = n.nextSibling)
                        if ((3 != n.nodeType || 0 !== K.trim(n.data).length) && n !== t) return !1;
                    return n === t
                }

                function o(e, t, i) {
                    var o, a, s;
                    for (s = v.schema.getNonEmptyElements(), o = new n(i || e, e); a = o[t ? "next" : "prev"]();) {
                        if (s[a.nodeName] && !r(a)) return a;
                        if (3 == a.nodeType && a.data.length > 0) return a
                    }
                }

                function l(e) {
                    var n, r, i, a, l;
                    if (!e.collapsed && (n = v.getParent(t.getNode(e.startContainer, e.startOffset), v.isBlock), r = v.getParent(t.getNode(e.endContainer, e.endOffset), v.isBlock), l = s.schema.getTextBlockElements(), n != r && l[n.nodeName] && l[r.nodeName] && "false" !== v.getContentEditable(n) && "false" !== v.getContentEditable(r))) return e.deleteContents(), i = o(n, !1), a = o(r, !0), v.isEmpty(r) || K(n).append(r.childNodes), K(r).remove(), i ? 1 == i.nodeType ? "BR" == i.nodeName ? (e.setStartBefore(i), e.setEndBefore(i)) : (e.setStartAfter(i), e.setEndAfter(i)) : (e.setStart(i, i.data.length), e.setEnd(i, i.data.length)) : a && (1 == a.nodeType ? (e.setStartBefore(a), e.setEndBefore(a)) : (e.setStart(a, 0), e.setEnd(a, 0))), y.setRng(e), !0
                }

                function c(e, n) {
                    var r, a, l, c, u, d;
                    if (!e.collapsed) return e;
                    if (u = e.startContainer, d = e.startOffset, 3 == u.nodeType)
                        if (n) {
                            if (d < u.data.length) return e
                        } else if (d > 0) return e;
                    if (r = t.getNode(e.startContainer, e.startOffset), l = v.getParent(r, v.isBlock), a = o(s.getBody(), n, r), c = v.getParent(a, v.isBlock), !r || !a) return e;
                    if (c && l != c)
                        if (n) {
                            if (!i(l, c)) return e;
                            1 == r.nodeType ? "BR" == r.nodeName ? e.setStartBefore(r) : e.setStartAfter(r) : e.setStart(r, r.data.length), 1 == a.nodeType ? e.setEnd(a, 0) : e.setEndBefore(a)
                        } else {
                            if (!i(c, l)) return e;
                            1 == a.nodeType ? "BR" == a.nodeName ? e.setStartBefore(a) : e.setStartAfter(a) : e.setStart(a, a.data.length), 1 == r.nodeType ? e.setEnd(r, 0) : e.setEndBefore(r)
                        }
                    return e
                }

                function p(e) {
                    var t = y.getRng();
                    return t = c(t, e), l(t) ? !0 : void 0
                }

                function m(e) {
                    var t, n, r;
                    p(e) || (a.each(s.getBody().getElementsByTagName("*"), function(e) {
                        "SPAN" == e.tagName && e.setAttribute("mce-data-marked", 1), !e.hasAttribute("data-mce-style") && e.hasAttribute("style") && s.dom.setAttrib(e, "style", s.dom.getAttrib(e, "style"))
                    }), t = new b(function() {}), t.observe(s.getDoc(), {
                        childList: !0,
                        attributes: !0,
                        subtree: !0,
                        attributeFilter: ["style"]
                    }), s.getDoc().execCommand(e ? "ForwardDelete" : "Delete", !1, null), n = s.selection.getRng(), r = n.startContainer.parentNode, a.each(t.takeRecords(), function(e) {
                        if (v.isChildOf(e.target, s.getBody())) {
                            if ("style" == e.attributeName) {
                                var t = e.target.getAttribute("data-mce-style");
                                t ? e.target.setAttribute("style", t) : e.target.removeAttribute("style")
                            }
                            a.each(e.addedNodes, function(e) {
                                if ("SPAN" == e.nodeName && !e.getAttribute("mce-data-marked")) {
                                    var t, i;
                                    e == r && (t = n.startOffset, i = e.firstChild), v.remove(e, !0), i && (n.setStart(i, t), n.setEnd(i, t), s.selection.setRng(n))
                                }
                            })
                        }
                    }), t.disconnect(), a.each(s.dom.select("span[mce-data-marked]"), function(e) {
                        e.removeAttribute("mce-data-marked")
                    }))
                }
                var g = s.getDoc(),
                    v = s.dom,
                    y = s.selection,
                    b = window.MutationObserver,
                    x, C;
                b || (x = !0, b = function() {
                    function e(e) {
                        var t = e.relatedNode || e.target;
                        n.push({
                            target: t,
                            addedNodes: [t]
                        })
                    }

                    function t(e) {
                        var t = e.relatedNode || e.target;
                        n.push({
                            target: t,
                            attributeName: e.attrName
                        })
                    }
                    var n = [],
                        r;
                    this.observe = function(n) {
                        r = n, r.addEventListener("DOMSubtreeModified", e, !1), r.addEventListener("DOMNodeInsertedIntoDocument", e, !1), r.addEventListener("DOMNodeInserted", e, !1), r.addEventListener("DOMAttrModified", t, !1)
                    }, this.disconnect = function() {
                        r.removeEventListener("DOMSubtreeModified", e, !1), r.removeEventListener("DOMNodeInsertedIntoDocument", e, !1), r.removeEventListener("DOMNodeInserted", e, !1), r.removeEventListener("DOMAttrModified", t, !1)
                    }, this.takeRecords = function() {
                        return n
                    }
                }), s.on("keydown", function(e) {
                    var t = e.keyCode == G,
                        n = e.ctrlKey || e.metaKey;
                    if (!u(e) && (t || e.keyCode == Y)) {
                        var r = s.selection.getRng(),
                            i = r.startContainer,
                            o = r.startOffset;
                        if (!n && r.collapsed && 3 == i.nodeType && (t ? o < i.data.length : o > 0)) return;
                        e.preventDefault(), n && s.selection.getSel().modify("extend", t ? "forward" : "backward", e.metaKey ? "lineboundary" : "word"), m(t)
                    }
                }), s.on("keypress", function(t) {
                    if (!u(t) && !y.isCollapsed() && t.charCode && !e.metaKeyPressed(t)) {
                        var n, r, i, o, a, l;
                        n = s.selection.getRng(), l = String.fromCharCode(t.charCode), t.preventDefault(), r = K(n.startContainer).parents().filter(function(e, t) {
                            return !!s.schema.getTextInlineElements()[t.nodeName]
                        }), m(!0), r = r.filter(function(e, t) {
                            return !K.contains(s.getBody(), t)
                        }), r.length ? (i = v.createFragment(), r.each(function(e, t) {
                            t = t.cloneNode(!1), i.hasChildNodes() ? (t.appendChild(i.firstChild), i.appendChild(t)) : (a = t, i.appendChild(t)), i.appendChild(t)
                        }), a.appendChild(s.getDoc().createTextNode(l)), o = v.getParent(n.startContainer, v.isBlock), v.isEmpty(o) ? K(o).empty().append(i) : n.insertNode(i), n.setStart(a.firstChild, 1), n.setEnd(a.firstChild, 1), s.selection.setRng(n)) : s.selection.setContent(l)
                    }
                }), s.addCommand("Delete", function() {
                    m()
                }), s.addCommand("ForwardDelete", function() {
                    m(!0)
                }), x || (s.on("dragstart", function(e) {
                    C = y.getRng(), d(e)
                }), s.on("drop", function(e) {
                    if (!u(e)) {
                        var n = f(e);
                        n && (e.preventDefault(), window.setTimeout(function() {
                            var r = t.getCaretRangeFromPoint(e.x, e.y, g);
                            C && (y.setRng(C), C = null), m(), y.setRng(r), h(n)
                        }, 0))
                    }
                }), s.on("cut", function(e) {
                    u(e) || !e.clipboardData || s.selection.isCollapsed() || (e.preventDefault(), e.clipboardData.clearData(), e.clipboardData.setData("text/html", s.selection.getContent()), e.clipboardData.setData("text/plain", s.selection.getContent({
                        format: "text"
                    })), window.setTimeout(function() {
                        m(!0)
                    }, 0))
                }))
            }

            function m() {
                function e(e) {
                    var t = X.create("body"),
                        n = e.cloneContents();
                    return t.appendChild(n), J.serializer.serialize(t, {
                        format: "html"
                    })
                }

                function n(n) {
                    if (!n.setStart) {
                        if (n.item) return !1;
                        var r = n.duplicate();
                        return r.moveToElementText(s.getBody()), t.compareRanges(n, r)
                    }
                    var i = e(n),
                        o = X.createRng();
                    o.selectNode(s.getBody());
                    var a = e(o);
                    return i === a
                }
                s.on("keydown", function(e) {
                    var t = e.keyCode,
                        r, i;
                    if (!u(e) && (t == G || t == Y)) {
                        if (r = s.selection.isCollapsed(), i = s.getBody(), r && !X.isEmpty(i)) return;
                        if (!r && !n(s.selection.getRng())) return;
                        e.preventDefault(), s.setContent(""), i.firstChild && X.isBlock(i.firstChild) ? s.selection.setCursorLocation(i.firstChild, 0) : s.selection.setCursorLocation(i, 0), s.nodeChanged()
                    }
                })
            }

            function g() {
                s.shortcuts.add("meta+a", null, "SelectAll")
            }

            function v() {
                s.settings.content_editable || (X.bind(s.getDoc(), "focusin", function() {
                    J.setRng(J.getRng())
                }), X.bind(s.getDoc(), "mousedown mouseup", function(e) {
                    e.target == s.getDoc().documentElement && (s.getBody().focus(), "mousedown" == e.type ? J.placeCaretAt(e.clientX, e.clientY) : J.setRng(J.getRng()))
                }))
            }

            function y() {
                s.on("keydown", function(e) {
                    if (!u(e) && e.keyCode === Y) {
                        if (!s.getBody().getElementsByTagName("hr").length) return;
                        if (J.isCollapsed() && 0 === J.getRng(!0).startOffset) {
                            var t = J.getNode(),
                                n = t.previousSibling;
                            if ("HR" == t.nodeName) return X.remove(t), void e.preventDefault();
                            n && n.nodeName && "hr" === n.nodeName.toLowerCase() && (X.remove(n), e.preventDefault())
                        }
                    }
                })
            }

            function b() {
                window.Range.prototype.getClientRects || s.on("mousedown", function(e) {
                    if (!u(e) && "HTML" === e.target.nodeName) {
                        var t = s.getBody();
                        t.blur(), setTimeout(function() {
                            t.focus()
                        }, 0)
                    }
                })
            }

            function x() {
                s.on("click", function(e) {
                    var t = e.target;
                    /^(IMG|HR)$/.test(t.nodeName) && (e.preventDefault(), J.getSel().setBaseAndExtent(t, 0, t, 1), s.nodeChanged()), "A" == t.nodeName && X.hasClass(t, "mce-item-anchor") && (e.preventDefault(), J.select(t))
                })
            }

            function C() {
                function e() {
                    var e = X.getAttribs(J.getStart().cloneNode(!1));
                    return function() {
                        var t = J.getStart();
                        t !== s.getBody() && (X.setAttrib(t, "style", null), j(e, function(e) {
                            t.setAttributeNode(e.cloneNode(!0))
                        }))
                    }
                }

                function t() {
                    return !J.isCollapsed() && X.getParent(J.getStart(), X.isBlock) != X.getParent(J.getEnd(), X.isBlock)
                }
                s.on("keypress", function(n) {
                    var r;
                    return u(n) || 8 != n.keyCode && 46 != n.keyCode || !t() ? void 0 : (r = e(), s.getDoc().execCommand("delete", !1, null), r(), n.preventDefault(), !1)
                }), X.bind(s.getDoc(), "cut", function(n) {
                    var r;
                    !u(n) && t() && (r = e(), setTimeout(function() {
                        r()
                    }, 0))
                })
            }

            function w() {
                document.body.setAttribute("role", "application")
            }

            function _() {
                s.on("keydown", function(e) {
                    if (!u(e) && e.keyCode === Y && J.isCollapsed() && 0 === J.getRng(!0).startOffset) {
                        var t = J.getNode().previousSibling;
                        if (t && t.nodeName && "table" === t.nodeName.toLowerCase()) return e.preventDefault(), !1
                    }
                })
            }

            function E() {
                c() > 7 || (l("RespectVisibilityInDesign", !0), s.contentStyles.push(".mceHideBrInPre pre br {display: none}"), X.addClass(s.getBody(), "mceHideBrInPre"), Z.addNodeFilter("pre", function(e) {
                    for (var t = e.length, n, i, o, a; t--;)
                        for (n = e[t].getAll("br"), i = n.length; i--;) o = n[i], a = o.prev, a && 3 === a.type && "\n" != a.value.charAt(a.value - 1) ? a.value += "\n" : o.parent.insert(new r("#text", 3), o, !0).value = "\n"
                }), ee.addNodeFilter("pre", function(e) {
                    for (var t = e.length, n, r, i, o; t--;)
                        for (n = e[t].getAll("br"), r = n.length; r--;) i = n[r], o = i.prev, o && 3 == o.type && (o.value = o.value.replace(/\r?\n$/, ""))
                }))
            }

            function N() {
                X.bind(s.getBody(), "mouseup", function() {
                    var e, t = J.getNode();
                    "IMG" == t.nodeName && ((e = X.getStyle(t, "width")) && (X.setAttrib(t, "width", e.replace(/[^0-9%]+/g, "")), X.setStyle(t, "width", "")), (e = X.getStyle(t, "height")) && (X.setAttrib(t, "height", e.replace(/[^0-9%]+/g, "")), X.setStyle(t, "height", "")))
                })
            }

            function S() {
                s.on("keydown", function(t) {
                    var n, r, i, o, a;
                    if (!u(t) && t.keyCode == e.BACKSPACE && (n = J.getRng(), r = n.startContainer, i = n.startOffset, o = X.getRoot(), a = r, n.collapsed && 0 === i)) {
                        for (; a && a.parentNode && a.parentNode.firstChild == a && a.parentNode != o;) a = a.parentNode;
                        "BLOCKQUOTE" === a.tagName && (s.formatter.toggle("blockquote", null, a), n = X.createRng(), n.setStart(r, 0), n.setEnd(r, 0), J.setRng(n))
                    }
                })
            }

            function k() {
                function e() {
                    s._refreshContentEditable(), l("StyleWithCSS", !1), l("enableInlineTableEditing", !1), Q.object_resizing || l("enableObjectResizing", !1)
                }
                Q.readonly || s.on("BeforeExecCommand MouseDown", e)
            }

            function T() {
                function e() {
                    j(X.select("a"), function(e) {
                        var t = e.parentNode,
                            n = X.getRoot();
                        if (t.lastChild === e) {
                            for (; t && !X.isBlock(t);) {
                                if (t.parentNode.lastChild !== t || t === n) return;
                                t = t.parentNode
                            }
                            X.add(t, "br", {
                                "data-mce-bogus": 1
                            })
                        }
                    })
                }
                s.on("SetContent ExecCommand", function(t) {
                    ("setcontent" == t.type || "mceInsertLink" === t.command) && e()
                })
            }

            function R() {
                Q.forced_root_block && s.on("init", function() {
                    l("DefaultParagraphSeparator", Q.forced_root_block)
                })
            }

            function A() {
                s.on("Undo Redo SetContent", function(e) {
                    e.initial || s.execCommand("mceRepaint")
                })
            }

            function B() {
                s.on("keydown", function(e) {
                    var t;
                    u(e) || e.keyCode != Y || (t = s.getDoc().selection.createRange(), t && t.item && (e.preventDefault(), s.undoManager.beforeChange(), X.remove(t.item(0)), s.undoManager.add()))
                })
            }

            function D() {
                var e;
                c() >= 10 && (e = "", j("p div h1 h2 h3 h4 h5 h6".split(" "), function(t, n) {
                    e += (n > 0 ? "," : "") + t + ":empty"
                }), s.contentStyles.push(e + "{padding-right: 1px !important}"))
            }

            function L() {
                c() < 9 && (Z.addNodeFilter("noscript", function(e) {
                    for (var t = e.length, n, r; t--;) n = e[t], r = n.firstChild, r && n.attr("data-mce-innertext", r.value)
                }), ee.addNodeFilter("noscript", function(e) {
                    for (var t = e.length, n, o, a; t--;) n = e[t], o = e[t].firstChild, o ? o.value = i.decode(o.value) : (a = n.attributes.map["data-mce-innertext"], a && (n.attr("data-mce-innertext", null), o = new r("#text", 3), o.value = a, o.raw = !0, n.append(o)))
                }))
            }

            function M() {
                function e(e, t) {
                    var n = i.createTextRange();
                    try {
                        n.moveToPoint(e, t)
                    } catch (r) {
                        n = null
                    }
                    return n
                }

                function t(t) {
                    var r;
                    t.button ? (r = e(t.x, t.y), r && (r.compareEndPoints("StartToStart", a) > 0 ? r.setEndPoint("StartToStart", a) : r.setEndPoint("EndToEnd", a), r.select())) : n()
                }

                function n() {
                    var e = r.selection.createRange();
                    a && !e.item && 0 === e.compareEndPoints("StartToEnd", e) && a.select(), X.unbind(r, "mouseup", n), X.unbind(r, "mousemove", t), a = o = 0
                }
                var r = X.doc,
                    i = r.body,
                    o, a, s;
                r.documentElement.unselectable = !0, X.bind(r, "mousedown contextmenu", function(i) {
                    if ("HTML" === i.target.nodeName) {
                        if (o && n(), s = r.documentElement, s.scrollHeight > s.clientHeight) return;
                        o = 1, a = e(i.x, i.y), a && (X.bind(r, "mouseup", n), X.bind(r, "mousemove", t), X.getRoot().focus(), a.select())
                    }
                })
            }

            function H() {
                s.on("keyup focusin mouseup", function(t) {
                    65 == t.keyCode && e.metaKeyPressed(t) || J.normalize()
                }, !0)
            }

            function P() {
                s.contentStyles.push("img:-moz-broken {-moz-force-broken-image-icon:1;min-width:24px;min-height:24px}")
            }

            function O() {
                s.inline || s.on("keydown", function() {
                    document.activeElement == document.body && s.getWin().focus()
                })
            }

            function I() {
                s.inline || (s.contentStyles.push("body {min-height: 150px}"), s.on("click", function(e) {
                    if ("HTML" == e.target.nodeName) {
                        var t;
                        t = s.selection.getRng(), s.getBody().focus(), s.selection.setRng(t), s.selection.normalize(), s.nodeChanged()
                    }
                }))
            }

            function F() {
                o.mac && s.on("keydown", function(t) {
                    !e.metaKeyPressed(t) || t.shiftKey || 37 != t.keyCode && 39 != t.keyCode || (t.preventDefault(), s.selection.getSel().modify("move", 37 == t.keyCode ? "backward" : "forward", "lineboundary"))
                })
            }

            function z() {
                l("AutoUrlDetect", !1)
            }

            function W() {
                s.inline || s.on("focus blur beforegetcontent", function() {
                    var e = s.dom.create("br");
                    s.getBody().appendChild(e), e.parentNode.removeChild(e)
                }, !0)
            }

            function V() {
                s.on("click", function(e) {
                    var t = e.target;
                    do
                        if ("A" === t.tagName) return void e.preventDefault();
                    while (t = t.parentNode)
                }), s.contentStyles.push(".mce-content-body {-webkit-touch-callout: none}")
            }

            function U() {
                s.on("init", function() {
                    s.dom.bind(s.getBody(), "submit", function(e) {
                        e.preventDefault()
                    })
                })
            }

            function $() {
                Z.addNodeFilter("br", function(e) {
                    for (var t = e.length; t--;) "Apple-interchange-newline" == e[t].attr("class") && e[t].remove()
                })
            }

            function q() {
                s.on("dragstart", function(e) {
                    d(e)
                }), s.on("drop", function(e) {
                    if (!u(e)) {
                        var n = f(e);
                        if (n) {
                            e.preventDefault();
                            var r = t.getCaretRangeFromPoint(e.x, e.y, s.getDoc());
                            J.setRng(r), h(n)
                        }
                    }
                })
            }
            var j = a.each,
                K = s.$,
                Y = e.BACKSPACE,
                G = e.DELETE,
                X = s.dom,
                J = s.selection,
                Q = s.settings,
                Z = s.parser,
                ee = s.serializer,
                te = o.gecko,
                ne = o.ie,
                re = o.webkit,
                ie = "data:text/mce-internal,",
                oe = ne ? "Text" : "URL";
            S(), m(), H(), re && (p(), v(), x(), R(), U(), _(), $(), o.iOS ? (O(), I(), V()) : g()), ne && o.ie < 11 && (y(), w(), E(), N(), B(), D(), L(), M()), o.ie >= 11 && (I(), W(), _()), o.ie && (g(), z(), q()), te && (y(), b(), C(), k(), T(), A(), P(), F(), _())
        }
    }), r(pe, [j, y, d], function(e, t, n) {
        function r(e, t) {
            return "selectionchange" == t ? e.getDoc() : !e.inline && /^mouse|click|contextmenu|drop|dragover|dragend/.test(t) ? e.getDoc().documentElement : e.settings.event_root ? (e.eventRoot || (e.eventRoot = o.select(e.settings.event_root)[0]), e.eventRoot) : e.getBody()
        }

        function i(e, t) {
            var n = r(e, t),
                i;
            if (e.delegates || (e.delegates = {}), !e.delegates[t])
                if (e.settings.event_root) {
                    if (a || (a = {}, e.editorManager.on("removeEditor", function() {
                            var t;
                            if (!e.editorManager.activeEditor && a) {
                                for (t in a) e.dom.unbind(r(e, t));
                                a = null
                            }
                        })), a[t]) return;
                    i = function(n) {
                        for (var r = n.target, i = e.editorManager.editors, a = i.length; a--;) {
                            var s = i[a].getBody();
                            (s === r || o.isChildOf(r, s)) && (i[a].hidden || i[a].fire(t, n))
                        }
                    }, a[t] = i, o.bind(n, t, i)
                } else i = function(n) {
                    e.hidden || e.fire(t, n)
                }, o.bind(n, t, i), e.delegates[t] = i
        }
        var o = t.DOM,
            a, s = {
                bindPendingEventDelegates: function() {
                    var e = this;
                    n.each(e._pendingNativeEvents, function(t) {
                        i(e, t)
                    })
                },
                toggleNativeEvent: function(e, t) {
                    var n = this;
                    n.settings.readonly || "focus" != e && "blur" != e && (t ? n.initialized ? i(n, e) : n._pendingNativeEvents ? n._pendingNativeEvents.push(e) : n._pendingNativeEvents = [e] : n.initialized && (n.dom.unbind(r(n, e), e, n.delegates[e]), delete n.delegates[e]))
                },
                unbindAllNativeEvents: function() {
                    var e = this,
                        t;
                    if (e.delegates) {
                        for (t in e.delegates) e.dom.unbind(r(e, t), t, e.delegates[t]);
                        delete e.delegates
                    }
                    e.inline || (e.getBody().onload = null, e.dom.unbind(e.getWin()), e.dom.unbind(e.getDoc())), e.dom.unbind(e.getBody()), e.dom.unbind(e.getContainer())
                }
            };
        return s = n.extend({}, e, s)
    }), r(me, [d, u], function(e, t) {
        var n = e.each,
            r = e.explode,
            i = {
                f9: 120,
                f10: 121,
                f11: 122
            },
            o = e.makeMap("alt,ctrl,shift,meta,access");
        return function(a) {
            function s(e, s, l, c) {
                var u, d, f;
                f = {
                    func: l,
                    scope: c || a,
                    desc: a.translate(s)
                }, n(r(e, "+"), function(e) {
                    e in o ? f[e] = !0 : /^[0-9]{2,}$/.test(e) ? f.keyCode = parseInt(e, 10) : (f.charCode = e.charCodeAt(0), f.keyCode = i[e] || e.toUpperCase().charCodeAt(0))
                }), u = [f.keyCode];
                for (d in o) f[d] ? u.push(d) : f[d] = !1;
                return f.id = u.join(","), f.access && (f.alt = !0, t.mac ? f.ctrl = !0 : f.shift = !0), f.meta && (t.mac ? f.meta = !0 : (f.ctrl = !0, f.meta = !1)), f
            }
            var l = this,
                c = {};
            a.on("keyup keypress keydown", function(e) {
                (e.altKey || e.ctrlKey || e.metaKey) && !e.isDefaultPrevented() && n(c, function(t) {
                    return t.ctrl == e.ctrlKey && t.meta == e.metaKey && t.alt == e.altKey && t.shift == e.shiftKey && (e.keyCode == t.keyCode || e.charCode && e.charCode == t.charCode) ? (e.preventDefault(), "keydown" == e.type && t.func.call(t.scope), !0) : void 0
                })
            }), l.add = function(t, i, o, l) {
                var u;
                return u = o, "string" == typeof o ? o = function() {
                    a.execCommand(u, !1, null)
                } : e.isArray(u) && (o = function() {
                    a.execCommand(u[0], u[1], u[2])
                }), n(r(t.toLowerCase()), function(e) {
                    var t = s(e, i, o, l);
                    c[t.id] = t
                }), !0
            }, l.remove = function(e) {
                var t = s(e);
                return c[t.id] ? (delete c[t.id], !0) : !1
            }
        }
    }), r(ge, [], function() {
        function e(e, t) {
            return function() {
                e.apply(t, arguments)
            }
        }

        function t(t) {
            if ("object" != typeof this) throw new TypeError("Promises must be constructed via new");
            if ("function" != typeof t) throw new TypeError("not a function");
            this._state = null, this._value = null, this._deferreds = [], s(t, e(r, this), e(i, this))
        }

        function n(e) {
            var t = this;
            return null === this._state ? void this._deferreds.push(e) : void l(function() {
                var n = t._state ? e.onFulfilled : e.onRejected;
                if (null === n) return void(t._state ? e.resolve : e.reject)(t._value);
                var r;
                try {
                    r = n(t._value)
                } catch (i) {
                    return void e.reject(i)
                }
                e.resolve(r)
            })
        }

        function r(t) {
            try {
                if (t === this) throw new TypeError("A promise cannot be resolved with itself.");
                if (t && ("object" == typeof t || "function" == typeof t)) {
                    var n = t.then;
                    if ("function" == typeof n) return void s(e(n, t), e(r, this), e(i, this))
                }
                this._state = !0, this._value = t, o.call(this)
            } catch (a) {
                i.call(this, a)
            }
        }

        function i(e) {
            this._state = !1, this._value = e, o.call(this)
        }

        function o() {
            for (var e = 0, t = this._deferreds.length; t > e; e++) n.call(this, this._deferreds[e]);
            this._deferreds = null
        }

        function a(e, t, n, r) {
            this.onFulfilled = "function" == typeof e ? e : null, this.onRejected = "function" == typeof t ? t : null, this.resolve = n, this.reject = r
        }

        function s(e, t, n) {
            var r = !1;
            try {
                e(function(e) {
                    r || (r = !0, t(e))
                }, function(e) {
                    r || (r = !0, n(e))
                })
            } catch (i) {
                if (r) return;
                r = !0, n(i)
            }
        }
        if (window.Promise) return window.Promise;
        var l = t.immediateFn || "function" == typeof setImmediate && setImmediate || function(e) {
                setTimeout(e, 1)
            },
            c = Array.isArray || function(e) {
                return "[object Array]" === Object.prototype.toString.call(e)
            };
        return t.prototype["catch"] = function(e) {
            return this.then(null, e)
        }, t.prototype.then = function(e, r) {
            var i = this;
            return new t(function(t, o) {
                n.call(i, new a(e, r, t, o))
            })
        }, t.all = function() {
            var e = Array.prototype.slice.call(1 === arguments.length && c(arguments[0]) ? arguments[0] : arguments);
            return new t(function(t, n) {
                function r(o, a) {
                    try {
                        if (a && ("object" == typeof a || "function" == typeof a)) {
                            var s = a.then;
                            if ("function" == typeof s) return void s.call(a, function(e) {
                                r(o, e)
                            }, n)
                        }
                        e[o] = a, 0 === --i && t(e)
                    } catch (l) {
                        n(l)
                    }
                }
                if (0 === e.length) return t([]);
                for (var i = e.length, o = 0; o < e.length; o++) r(o, e[o])
            })
        }, t.resolve = function(e) {
            return e && "object" == typeof e && e.constructor === t ? e : new t(function(t) {
                t(e)
            })
        }, t.reject = function(e) {
            return new t(function(t, n) {
                n(e)
            })
        }, t.race = function(e) {
            return new t(function(t, n) {
                for (var r = 0, i = e.length; i > r; r++) e[r].then(t, n)
            })
        }, t
    }), r(ve, [ge, d], function(e, t) {
        return function(n) {
            function r(e) {
                var t, n;
                return n = {
                    "image/jpeg": "jpg",
                    "image/jpg": "jpg",
                    "image/gif": "gif",
                    "image/png": "png"
                }, t = n[e.blob().type.toLowerCase()] || "dat", e.id() + "." + t
            }

            function i(e, t) {
                return e ? e.replace(/\/$/, "") + "/" + t.replace(/^\//, "") : t
            }

            function o(e) {
                return {
                    id: e.id,
                    blob: e.blob,
                    base64: e.base64,
                    filename: t.constant(r(e))
                }
            }

            function a(e, t, o) {
                var a, s;
                a = new XMLHttpRequest, a.withCredentials = n.credentials, a.open("POST", n.url), a.onload = function() {
                    var e;
                    return 200 != a.status ? void o("HTTP Error: " + a.status) : (e = JSON.parse(a.responseText), e && "string" == typeof e.location ? void t(i(n.basePath, e.location)) : void o("Invalid JSON: " + a.responseText))
                }, s = new FormData, s.append("file", e.blob(), r(e)), a.send(s)
            }

            function s(r) {
                return new e(function(e, i) {
                    function s() {
                        var t, n = c[u++];
                        return n ? (t = d[n.blobInfo.id()]) ? (n.url = t, n.status = !0, void s()) : void l(o(n.blobInfo), function(e) {
                            d[n.blobInfo.id()] = e, n.url = e, n.status = !0, s()
                        }, function(e) {
                            n.status = !1, i(e)
                        }) : void e(c)
                    }
                    var l = n.handler,
                        c, u = 0,
                        d = {};
                    return n.url || l !== a ? (c = t.map(r, function(e) {
                        return {
                            status: !1,
                            blobInfo: e,
                            url: ""
                        }
                    }), void s()) : void e([])
                })
            }
            return n = t.extend({
                credentials: !1,
                handler: a
            }, n), {
                upload: s
            }
        }
    }), r(ye, [ge], function(e) {
        function t(t) {
            return new e(function(e) {
                var n = new XMLHttpRequest;
                n.open("GET", t, !0), n.responseType = "blob", n.onload = function() {
                    200 == this.status && e(this.response)
                }, n.send()
            })
        }

        function n(e) {
            var t, n;
            return e = decodeURIComponent(e).split(","), n = /data:([^;]+)/.exec(e[0]), n && (t = n[1]), {
                type: t,
                data: e[1]
            }
        }

        function r(t) {
            return new e(function(e) {
                var r, i, o;
                t = n(t);
                try {
                    r = atob(t.data)
                } catch (a) {
                    return void e(new Blob([]))
                }
                for (i = new Uint8Array(r.length), o = 0; o < i.length; o++) i[o] = r.charCodeAt(o);
                e(new Blob([i], {
                    type: t.type
                }))
            })
        }

        function i(e) {
            return 0 === e.indexOf("blob:") ? t(e) : 0 === e.indexOf("data:") ? r(e) : null
        }

        function o(t) {
            return new e(function(e) {
                var n = new FileReader;
                n.onloadend = function() {
                    e(n.result)
                }, n.readAsDataURL(t)
            })
        }
        return {
            uriToBlob: i,
            blobToDataUri: o,
            parseDataUri: n
        }
    }), r(be, [ge, d, ye], function(e, t, n) {
        function r(t, n) {
            return new e(function(e) {
                function r(o) {
                    n(t[o], function(n) {
                        i.push(n), o < t.length - 1 ? r(o + 1) : e(i)
                    })
                }
                var i = [];
                0 === t.length ? e(i) : r(0)
            })
        }
        var i = 0;
        return {
            findAll: function(e, o) {
                function a(e, t) {
                    var r, a, s;
                    return 0 === e.src.indexOf("blob:") ? (a = o.getByUri(e.src), void(a && t({
                        image: e,
                        blobInfo: a
                    }))) : (s = "blobid" + i++, r = n.parseDataUri(e.src).data, a = o.findFirst(function(e) {
                        return e.base64() === r
                    }), void(a ? t({
                        image: e,
                        blobInfo: a
                    }) : n.uriToBlob(e.src).then(function(n) {
                        var i = o.create(s, n, r);
                        o.add(i), t({
                            image: e,
                            blobInfo: i
                        })
                    })))
                }
                return r(t.filter(e.getElementsByTagName("img"), function(e) {
                    return e.src && (0 === e.src.indexOf("data:") || 0 === e.src.indexOf("blob:"))
                }), a)
            }
        }
    }), r(xe, [d], function(e) {
        return function() {
            function t(e, t, n) {
                return {
                    id: l(e),
                    blob: l(t),
                    base64: l(n),
                    blobUri: l(URL.createObjectURL(t))
                }
            }

            function n(e) {
                r(e.id()) || s.push(e)
            }

            function r(e) {
                return i(function(t) {
                    return t.id() === e
                })
            }

            function i(t) {
                return e.grep(s, t)[0]
            }

            function o(e) {
                return i(function(t) {
                    return t.blobUri() == e
                })
            }

            function a() {
                e.each(s, function(e) {
                    URL.revokeObjectURL(e.blobUri())
                }), s = []
            }
            var s = [],
                l = e.constant;
            return {
                create: t,
                add: n,
                get: r,
                getByUri: o,
                findFirst: i,
                destroy: a
            }
        }
    }), r(Ce, [d, ve, be, xe], function(e, t, n, r) {
        return function(i) {
            function o(e, t, n) {
                var r = 0;
                do r = e.indexOf(t, r), -1 !== r && (e = e.substring(0, r) + n + e.substr(r + t.length), r += n.length - t.length + 1); while (-1 !== r);
                return e
            }

            function a(e, t, n) {
                return e = o(e, 'src="' + t + '"', 'src="' + n + '"'), e = o(e, 'data-mce-src="' + t + '"', 'data-mce-src="' + n + '"')
            }

            function s(t, n) {
                e.each(i.undoManager.data, function(e) {
                    e.content = a(e.content, t, n)
                })
            }

            function l(n) {
                function r(t) {
                    return e.map(t, function(e) {
                        return e.blobInfo
                    })
                }
                var o = new t({
                    url: i.settings.images_upload_url,
                    basePath: i.settings.images_upload_base_path,
                    credentials: i.settings.images_upload_credentials,
                    handler: i.settings.images_upload_handler
                });
                return c().then(r).then(o.upload).then(function(t) {
                    return t = e.map(t, function(e) {
                        var t;
                        return t = i.dom.select('img[src="' + e.blobInfo.blobUri() + '"]')[0], t && (s(t.src, e.url), i.$(t).attr({
                            src: e.url,
                            "data-mce-src": i.convertURL(e.url, "src")
                        })), {
                            element: t,
                            status: e.status
                        }
                    }), n && n(t), t
                }, function() {})
            }

            function c() {
                return n.findAll(i.getBody(), f).then(function(t) {
                    return e.each(t, function(e) {
                        s(e.image.src, e.blobInfo.blobUri()), e.image.src = e.blobInfo.blobUri()
                    }), t
                })
            }

            function u() {
                f.destroy()
            }

            function d(e) {
                return e.replace(/src="(blob:[^"]+)"/g, function(e, t) {
                    var n = f.getByUri(t);
                    return 'src="data:' + n.blob().type + ";base64," + n.base64() + '"'
                })
            }
            var f = new r;
            return i.on("setContent paste", c), i.on("RawSaveContent", function(e) {
                e.content = d(e.content)
            }), i.on("getContent", function(e) {
                e.source_view || "raw" == e.format || (e.content = d(e.content))
            }), {
                blobCache: f,
                uploadImages: l,
                scanForImages: c,
                destroy: u
            }
        }
    }), r(we, [y, f, x, w, _, R, T, M, O, I, F, z, W, V, b, l, fe, E, S, he, u, d, pe, me, Ce], function(e, n, r, i, o, a, s, l, c, u, d, f, h, p, m, g, v, y, b, x, C, w, _, E, N) {
        function S(e, t, i) {
            var o = this,
                a, s;
            a = o.documentBaseUrl = i.documentBaseURL, s = i.baseURI, o.settings = t = A({
                id: e,
                theme: "modern",
                delta_width: 0,
                delta_height: 0,
                popup_css: "",
                plugins: "",
                document_base_url: a,
                add_form_submit_trigger: !0,
                submit_patch: !0,
                add_unload_trigger: !0,
                convert_urls: !0,
                relative_urls: !0,
                remove_script_host: !0,
                object_resizing: !0,
                doctype: "<!DOCTYPE html>",
                visual: !0,
                font_size_style_values: "xx-small,x-small,small,medium,large,x-large,xx-large",
                font_size_legacy_values: "xx-small,small,medium,large,x-large,xx-large,300%",
                forced_root_block: "p",
                hidden_input: !0,
                padd_empty_editor: !0,
                render_ui: !0,
                indentation: "30px",
                inline_styles: !0,
                convert_fonts_to_spans: !0,
                indent: "simple",
                indent_before: "p,h1,h2,h3,h4,h5,h6,blockquote,div,title,style,pre,script,td,th,ul,ol,li,dl,dt,dd,area,table,thead,tfoot,tbody,tr,section,article,hgroup,aside,figure,option,optgroup,datalist",
                indent_after: "p,h1,h2,h3,h4,h5,h6,blockquote,div,title,style,pre,script,td,th,ul,ol,li,dl,dt,dd,area,table,thead,tfoot,tbody,tr,section,article,hgroup,aside,figure,option,optgroup,datalist",
                validate: !0,
                entity_encoding: "named",
                url_converter: o.convertURL,
                url_converter_scope: o,
                ie7_compat: !0
            }, t), r.language = t.language || "en", r.languageLoad = t.language_load, r.baseURL = i.baseURL, o.id = t.id = e, o.isNotDirty = !0, o.plugins = {}, o.documentBaseURI = new p(t.document_base_url || a, {
                base_uri: s
            }), o.baseURI = s, o.contentCSS = [], o.contentStyles = [], o.shortcuts = new E(o), o.loadedCSS = {}, o.editorCommands = new h(o), t.target && (o.targetElm = t.target), o.suffix = i.suffix, o.editorManager = i, o.inline = t.inline, t.cache_suffix && (C.cacheSuffix = t.cache_suffix.replace(/^[\?\&]+/, "")), t.override_viewport === !1 && (C.overrideViewPort = !1), i.fire("SetupEditor", o), o.execCallback("setup", o), o.$ = n.overrideDefaults(function() {
                return {
                    context: o.inline ? o.getBody() : o.getDoc(),
                    element: o.getBody()
                }
            })
        }
        var k = e.DOM,
            T = r.ThemeManager,
            R = r.PluginManager,
            A = w.extend,
            B = w.each,
            D = w.explode,
            L = w.inArray,
            M = w.trim,
            H = w.resolve,
            P = g.Event,
            O = C.gecko,
            I = C.ie;
        return S.prototype = {
            render: function() {
                function e() {
                    k.unbind(window, "ready", e), n.render()
                }

                function t() {
                    var e = m.ScriptLoader;
                    if (r.language && "en" != r.language && !r.language_url && (r.language_url = n.editorManager.baseURL + "/langs/" + r.language + ".js"), r.language_url && e.add(r.language_url), r.theme && "function" != typeof r.theme && "-" != r.theme.charAt(0) && !T.urls[r.theme]) {
                        var t = r.theme_url;
                        t = t ? n.documentBaseURI.toAbsolute(t) : "themes/" + r.theme + "/theme" + o + ".js", T.load(r.theme, t)
                    }
                    w.isArray(r.plugins) && (r.plugins = r.plugins.join(" ")), B(r.external_plugins, function(e, t) {
                        R.load(t, e), r.plugins += " " + t
                    }), B(r.plugins.split(/[ ,]/), function(e) {
                        if (e = M(e), e && !R.urls[e])
                            if ("-" == e.charAt(0)) {
                                e = e.substr(1, e.length);
                                var t = R.dependencies(e);
                                B(t, function(e) {
                                    var t = {
                                        prefix: "plugins/",
                                        resource: e,
                                        suffix: "/plugin" + o + ".js"
                                    };
                                    e = R.createUrl(t, e), R.load(e.resource, e)
                                })
                            } else R.load(e, {
                                prefix: "plugins/",
                                resource: e,
                                suffix: "/plugin" + o + ".js"
                            })
                    }), e.loadQueue(function() {
                        n.removed || n.init()
                    })
                }
                var n = this,
                    r = n.settings,
                    i = n.id,
                    o = n.suffix;
                if (!P.domLoaded) return void k.bind(window, "ready", e);
                if (n.getElement() && C.contentEditable) {
                    r.inline ? n.inline = !0 : (n.orgVisibility = n.getElement().style.visibility, n.getElement().style.visibility = "hidden");
                    var a = n.getElement().form || k.getParent(i, "form");
                    a && (n.formElement = a, r.hidden_input && !/TEXTAREA|INPUT/i.test(n.getElement().nodeName) && (k.insertAfter(k.create("input", {
                        type: "hidden",
                        name: i
                    }), i), n.hasHiddenInput = !0), n.formEventDelegate = function(e) {
                        n.fire(e.type, e)
                    }, k.bind(a, "submit reset", n.formEventDelegate), n.on("reset", function() {
                        n.setContent(n.startContent, {
                            format: "raw"
                        })
                    }), !r.submit_patch || a.submit.nodeType || a.submit.length || a._mceOldSubmit || (a._mceOldSubmit = a.submit, a.submit = function() {
                        return n.editorManager.triggerSave(), n.isNotDirty = !0, a._mceOldSubmit(a)
                    })), n.windowManager = new v(n), "xml" == r.encoding && n.on("GetContent", function(e) {
                        e.save && (e.content = k.encode(e.content))
                    }), r.add_form_submit_trigger && n.on("submit", function() {
                        n.initialized && n.save()
                    }), r.add_unload_trigger && (n._beforeUnload = function() {
                        !n.initialized || n.destroyed || n.isHidden() || n.save({
                            format: "raw",
                            no_events: !0,
                            set_dirty: !1
                        })
                    }, n.editorManager.on("BeforeUnload", n._beforeUnload)), t()
                }
            },
            init: function() {
                function e(n) {
                    var r = R.get(n),
                        i, o;
                    i = R.urls[n] || t.documentBaseUrl.replace(/\/$/, ""), n = M(n), r && -1 === L(m, n) && (B(R.dependencies(n), function(t) {
                        e(t)
                    }), o = new r(t, i, t.$), t.plugins[n] = o, o.init && (o.init(t, i), m.push(n)))
                }
                var t = this,
                    n = t.settings,
                    r = t.getElement(),
                    i, o, a, s, l, c, u, d, f, h, p, m = [];
                if (this.editorManager.i18n.setCode(n.language), t.rtl = n.rtl_ui || this.editorManager.i18n.rtl, t.editorManager.add(t), n.aria_label = n.aria_label || k.getAttrib(r, "aria-label", t.getLang("aria.rich_text_area")), n.theme && ("function" != typeof n.theme ? (n.theme = n.theme.replace(/-/, ""), c = T.get(n.theme), t.theme = new c(t, T.urls[n.theme]), t.theme.init && t.theme.init(t, T.urls[n.theme] || t.documentBaseUrl.replace(/\/$/, ""), t.$)) : t.theme = n.theme), B(n.plugins.replace(/\-/g, "").split(/[ ,]/), e), n.render_ui && t.theme && (t.orgDisplay = r.style.display, "function" != typeof n.theme ? (i = n.width || r.style.width || r.offsetWidth, o = n.height || r.style.height || r.offsetHeight, a = n.min_height || 100, h = /^[0-9\.]+(|px)$/i, h.test("" + i) && (i = Math.max(parseInt(i, 10), 100)), h.test("" + o) && (o = Math.max(parseInt(o, 10), a)), l = t.theme.renderUI({
                        targetNode: r,
                        width: i,
                        height: o,
                        deltaWidth: n.delta_width,
                        deltaHeight: n.delta_height
                    }), n.content_editable || (o = (l.iframeHeight || o) + ("number" == typeof o ? l.deltaHeight || 0 : ""), a > o && (o = a))) : (l = n.theme(t, r), l.editorContainer.nodeType && (l.editorContainer = l.editorContainer.id = l.editorContainer.id || t.id + "_parent"), l.iframeContainer.nodeType && (l.iframeContainer = l.iframeContainer.id = l.iframeContainer.id || t.id + "_iframecontainer"), o = l.iframeHeight || r.offsetHeight), t.editorContainer = l.editorContainer), n.content_css && B(D(n.content_css), function(e) {
                        t.contentCSS.push(t.documentBaseURI.toAbsolute(e))
                    }), n.content_style && t.contentStyles.push(n.content_style), n.content_editable) return r = s = l = null, t.initContentBody();
                for (t.iframeHTML = n.doctype + "<html><head>", n.document_base_url != t.documentBaseUrl && (t.iframeHTML += '<base href="' + t.documentBaseURI.getURI() + '" />'), !C.caretAfter && n.ie7_compat && (t.iframeHTML += '<meta http-equiv="X-UA-Compatible" content="IE=7" />'), t.iframeHTML += '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />', p = 0; p < t.contentCSS.length; p++) {
                    var g = t.contentCSS[p];
                    t.iframeHTML += '<link type="text/css" rel="stylesheet" href="' + w._addCacheSuffix(g) + '" />', t.loadedCSS[g] = !0
                }
                d = n.body_id || "tinymce", -1 != d.indexOf("=") && (d = t.getParam("body_id", "", "hash"), d = d[t.id] || d), f = n.body_class || "", -1 != f.indexOf("=") && (f = t.getParam("body_class", "", "hash"), f = f[t.id] || ""), n.content_security_policy && (t.iframeHTML += '<meta http-equiv="Content-Security-Policy" content="' + n.content_security_policy + '" />'), t.iframeHTML += '</head><body id="' + d + '" class="mce-content-body ' + f + '" data-id="' + t.id + '"><br></body></html>';
                var v = 'javascript:(function(){document.open();document.domain="' + document.domain + '";var ed = window.parent.tinymce.get("' + t.id + '");document.write(ed.iframeHTML);document.close();ed.initContentBody(true);})()';
                document.domain != location.hostname && (u = v);
                var y = k.create("iframe", {
                    id: t.id + "_ifr",
                    frameBorder: "0",
                    allowTransparency: "true",
                    title: t.editorManager.translate("Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help"),
                    style: {
                        width: "100%",
                        height: o,
                        display: "block"
                    }
                });
                if (y.onload = function() {
                        y.onload = null, t.fire("load")
                    }, k.setAttrib(y, "src", u || 'javascript:""'), t.contentAreaContainer = l.iframeContainer, t.iframeElement = y, s = k.add(l.iframeContainer, y), I) try {
                    t.getDoc()
                } catch (b) {
                    s.src = u = v
                }
                l.editorContainer && (k.get(l.editorContainer).style.display = t.orgDisplay, t.hidden = k.isHidden(l.editorContainer)), t.getElement().style.display = "none", k.setAttrib(t.id, "aria-hidden", !0), u || t.initContentBody(), r = s = l = null
            },
            initContentBody: function(t) {
                var n = this,
                    r = n.settings,
                    s = n.getElement(),
                    h = n.getDoc(),
                    p, m;
                r.inline || (n.getElement().style.visibility = n.orgVisibility), t || r.content_editable || (h.open(), h.write(n.iframeHTML), h.close()), r.content_editable && (n.on("remove", function() {
                    var e = this.getBody();
                    k.removeClass(e, "mce-content-body"), k.removeClass(e, "mce-edit-focus"), k.setAttrib(e, "contentEditable", null)
                }), k.addClass(s, "mce-content-body"), n.contentDocument = h = r.content_document || document, n.contentWindow = r.content_window || window, n.bodyElement = s, r.content_document = r.content_window = null, r.root_name = s.nodeName.toLowerCase()), p = n.getBody(), p.disabled = !0, r.readonly || (n.inline && "static" == k.getStyle(p, "position", !0) && (p.style.position = "relative"), p.contentEditable = n.getParam("content_editable_state", !0)), p.disabled = !1, n.editorUpload = new N(n), n.schema = new y(r), n.dom = new e(h, {
                    keep_values: !0,
                    url_converter: n.convertURL,
                    url_converter_scope: n,
                    hex_colors: r.force_hex_style_colors,
                    class_filter: r.class_filter,
                    update_styles: !0,
                    root_element: n.inline ? n.getBody() : null,
                    collect: r.content_editable,
                    schema: n.schema,
                    onSetAttrib: function(e) {
                        n.fire("SetAttrib", e)
                    }
                }), n.parser = new b(r, n.schema), n.parser.addAttributeFilter("src,href,style,tabindex", function(e, t) {
                    for (var r = e.length, i, o = n.dom, a, s; r--;)
                        if (i = e[r], a = i.attr(t), s = "data-mce-" + t, !i.attributes.map[s]) {
                            if (0 === a.indexOf("data:") || 0 === a.indexOf("blob:")) continue;
                            "style" === t ? (a = o.serializeStyle(o.parseStyle(a), i.name), a.length || (a = null), i.attr(s, a), i.attr(t, a)) : "tabindex" === t ? (i.attr(s, a), i.attr(t, null)) : i.attr(s, n.convertURL(a, t, i.name))
                        }
                }), n.parser.addNodeFilter("script", function(e) {
                    for (var t = e.length, n; t--;) n = e[t], n.attr("type", "mce-" + (n.attr("type") || "no/type"))
                }), n.parser.addNodeFilter("#cdata", function(e) {
                    for (var t = e.length, n; t--;) n = e[t], n.type = 8, n.name = "#comment", n.value = "[CDATA[" + n.value + "]]"
                }), n.parser.addNodeFilter("p,h1,h2,h3,h4,h5,h6,div", function(e) {
                    for (var t = e.length, r, i = n.schema.getNonEmptyElements(); t--;) r = e[t], r.isEmpty(i) && (r.append(new o("br", 1)).shortEnded = !0)
                }), n.serializer = new a(r, n), n.selection = new l(n.dom, n.getWin(), n.serializer, n), n.formatter = new c(n), n.undoManager = new u(n), n.forceBlocks = new f(n), n.enterKey = new d(n), n._nodeChangeDispatcher = new i(n), n.fire("PreInit"), r.browser_spellcheck || r.gecko_spellcheck || (h.body.spellcheck = !1, k.setAttrib(p, "spellcheck", "false")), n.fire("PostRender"), n.quirks = new x(n), r.directionality && (p.dir = r.directionality), r.nowrap && (p.style.whiteSpace = "nowrap"), r.protect && n.on("BeforeSetContent", function(e) {
                    B(r.protect, function(t) {
                        e.content = e.content.replace(t, function(e) {
                            return "<!--mce:protected " + escape(e) + "-->"
                        })
                    })
                }), n.on("SetContent", function() {
                    n.addVisual(n.getBody())
                }), r.padd_empty_editor && n.on("PostProcess", function(e) {
                    e.content = e.content.replace(/^(<p[^>]*>(&nbsp;|&#160;|\s|\u00a0|)<\/p>[\r\n]*|<br \/>[\r\n]*)$/, "")
                }), n.load({
                    initial: !0,
                    format: "html"
                }), n.startContent = n.getContent({
                    format: "raw"
                }), n.initialized = !0, n.bindPendingEventDelegates(), n.fire("init"), n.focus(!0), n.nodeChanged({
                    initial: !0
                }), n.execCallback("init_instance_callback", n), n.contentStyles.length > 0 && (m = "", B(n.contentStyles, function(e) {
                    m += e + "\r\n"
                }), n.dom.addStyle(m)), B(n.contentCSS, function(e) {
                    n.loadedCSS[e] || (n.dom.loadCSS(e), n.loadedCSS[e] = !0)
                }), r.auto_focus && setTimeout(function() {
                    var e;
                    e = r.auto_focus === !0 ? n : n.editorManager.get(r.auto_focus), e.destroyed || e.focus()
                }, 100), s = h = p = null
            },
            focus: function(e) {
                var t = this,
                    n = t.selection,
                    r = t.settings.content_editable,
                    i, o, a = t.getDoc(),
                    s;
                if (!e) {
                    if (i = n.getRng(), i.item && (o = i.item(0)), t._refreshContentEditable(), r || (C.opera || t.getBody().focus(), t.getWin().focus()), O || r) {
                        if (s = t.getBody(), s.setActive) try {
                            s.setActive()
                        } catch (l) {
                            s.focus()
                        } else s.focus();
                        r && n.normalize()
                    }
                    o && o.ownerDocument == a && (i = a.body.createControlRange(), i.addElement(o), i.select())
                }
                t.editorManager.setActive(t)
            },
            execCallback: function(e) {
                var t = this,
                    n = t.settings[e],
                    r;
                if (n) return t.callbackLookup && (r = t.callbackLookup[e]) && (n = r.func, r = r.scope), "string" == typeof n && (r = n.replace(/\.\w+$/, ""), r = r ? H(r) : 0, n = H(n), t.callbackLookup = t.callbackLookup || {}, t.callbackLookup[e] = {
                    func: n,
                    scope: r
                }), n.apply(r || t, Array.prototype.slice.call(arguments, 1))
            },
            translate: function(e) {
                var t = this.settings.language || "en",
                    n = this.editorManager.i18n;
                return e ? n.data[t + "." + e] || e.replace(/\{\#([^\}]+)\}/g, function(e, r) {
                    return n.data[t + "." + r] || "{#" + r + "}"
                }) : ""
            },
            getLang: function(e, n) {
                return this.editorManager.i18n.data[(this.settings.language || "en") + "." + e] || (n !== t ? n : "{#" + e + "}")
            },
            getParam: function(e, t, n) {
                var r = e in this.settings ? this.settings[e] : t,
                    i;
                return "hash" === n ? (i = {}, "string" == typeof r ? B(r.split(r.indexOf("=") > 0 ? /[;,](?![^=;,]*(?:[;,]|$))/ : ","), function(e) {
                    e = e.split("="), e.length > 1 ? i[M(e[0])] = M(e[1]) : i[M(e[0])] = M(e)
                }) : i = r, i) : r
            },
            nodeChanged: function(e) {
                this._nodeChangeDispatcher.nodeChanged(e)
            },
            addButton: function(e, t) {
                var n = this;
                t.cmd && (t.onclick = function() {
                    n.execCommand(t.cmd)
                }), t.text || t.icon || (t.icon = e), n.buttons = n.buttons || {}, t.tooltip = t.tooltip || t.title, n.buttons[e] = t
            },
            addMenuItem: function(e, t) {
                var n = this;
                t.cmd && (t.onclick = function() {
                    n.execCommand(t.cmd)
                }), n.menuItems = n.menuItems || {}, n.menuItems[e] = t
            },
            addContextToolbar: function(e, t) {
                var n = this,
                    r;
                n.contextToolbars = n.contextToolbars || [], "string" == typeof e && (r = e, e = function(e) {
                    return n.dom.is(e, r)
                }), n.contextToolbars.push({
                    predicate: e,
                    items: t
                })
            },
            addCommand: function(e, t, n) {
                this.editorCommands.addCommand(e, t, n)
            },
            addQueryStateHandler: function(e, t, n) {
                this.editorCommands.addQueryStateHandler(e, t, n)
            },
            addQueryValueHandler: function(e, t, n) {
                this.editorCommands.addQueryValueHandler(e, t, n)
            },
            addShortcut: function(e, t, n, r) {
                this.shortcuts.add(e, t, n, r)
            },
            execCommand: function(e, t, n, r) {
                return this.editorCommands.execCommand(e, t, n, r)
            },
            queryCommandState: function(e) {
                return this.editorCommands.queryCommandState(e)
            },
            queryCommandValue: function(e) {
                return this.editorCommands.queryCommandValue(e)
            },
            queryCommandSupported: function(e) {
                return this.editorCommands.queryCommandSupported(e)
            },
            show: function() {
                var e = this;
                e.hidden && (e.hidden = !1, e.inline ? e.getBody().contentEditable = !0 : (k.show(e.getContainer()), k.hide(e.id)), e.load(), e.fire("show"))
            },
            hide: function() {
                var e = this,
                    t = e.getDoc();
                e.hidden || (I && t && !e.inline && t.execCommand("SelectAll"), e.save(), e.inline ? (e.getBody().contentEditable = !1, e == e.editorManager.focusedEditor && (e.editorManager.focusedEditor = null)) : (k.hide(e.getContainer()), k.setStyle(e.id, "display", e.orgDisplay)), e.hidden = !0, e.fire("hide"))
            },
            isHidden: function() {
                return !!this.hidden
            },
            setProgressState: function(e, t) {
                this.fire("ProgressState", {
                    state: e,
                    time: t
                })
            },
            load: function(e) {
                var n = this,
                    r = n.getElement(),
                    i;
                return r ? (e = e || {}, e.load = !0, i = n.setContent(r.value !== t ? r.value : r.innerHTML, e), e.element = r, e.no_events || n.fire("LoadContent", e), e.element = r = null, i) : void 0
            },
            save: function(e) {
                var t = this,
                    n = t.getElement(),
                    r, i;
                if (n && t.initialized) return e = e || {}, e.save = !0, e.element = n, r = e.content = t.getContent(e), e.no_events || t.fire("SaveContent", e), "raw" == e.format && t.fire("RawSaveContent", e), r = e.content, /TEXTAREA|INPUT/i.test(n.nodeName) ? n.value = r : (t.inline || (n.innerHTML = r), (i = k.getParent(t.id, "form")) && B(i.elements, function(e) {
                    return e.name == t.id ? (e.value = r, !1) : void 0
                })), e.element = n = null, e.set_dirty !== !1 && (t.isNotDirty = !0), r
            },
            setContent: function(e, t) {
                var n = this,
                    r = n.getBody(),
                    i;
                return t = t || {}, t.format = t.format || "html", t.set = !0, t.content = e, t.no_events || n.fire("BeforeSetContent", t), e = t.content, 0 === e.length || /^\s+$/.test(e) ? (i = n.settings.forced_root_block, i && n.schema.isValidChild(r.nodeName.toLowerCase(), i.toLowerCase()) ? (e = I && 11 > I ? "" : '<br data-mce-bogus="1">', e = n.dom.createHTML(i, n.settings.forced_root_block_attrs, e)) : I || (e = '<br data-mce-bogus="1">'), n.dom.setHTML(r, e), n.fire("SetContent", t)) : ("raw" !== t.format && (e = new s({}, n.schema).serialize(n.parser.parse(e, {
                    isRootContent: !0
                }))), t.content = M(e), n.dom.setHTML(r, t.content), t.no_events || n.fire("SetContent", t)), t.content
            },
            getContent: function(e) {
                var t = this,
                    n, r = t.getBody();
                return e = e || {}, e.format = e.format || "html", e.get = !0, e.getInner = !0, e.no_events || t.fire("BeforeGetContent", e), n = "raw" == e.format ? r.innerHTML : "text" == e.format ? r.innerText || r.textContent : t.serializer.serialize(r, e), "text" != e.format ? e.content = M(n) : e.content = n, e.no_events || t.fire("GetContent", e), e.content
            },
            insertContent: function(e, t) {
                t && (e = A({
                    content: e
                }, t)), this.execCommand("mceInsertContent", !1, e)
            },
            isDirty: function() {
                return !this.isNotDirty
            },
            getContainer: function() {
                var e = this;
                return e.container || (e.container = k.get(e.editorContainer || e.id + "_parent")), e.container
            },
            getContentAreaContainer: function() {
                return this.contentAreaContainer
            },
            getElement: function() {
                return this.targetElm || (this.targetElm = k.get(this.id)), this.targetElm
            },
            getWin: function() {
                var e = this,
                    t;
                return e.contentWindow || (t = e.iframeElement, t && (e.contentWindow = t.contentWindow)), e.contentWindow
            },
            getDoc: function() {
                var e = this,
                    t;
                return e.contentDocument || (t = e.getWin(), t && (e.contentDocument = t.document)), e.contentDocument
            },
            getBody: function() {
                return this.bodyElement || this.getDoc().body
            },
            convertURL: function(e, t, n) {
                var r = this,
                    i = r.settings;
                return i.urlconverter_callback ? r.execCallback("urlconverter_callback", e, n, !0, t) : !i.convert_urls || n && "LINK" == n.nodeName || 0 === e.indexOf("file:") || 0 === e.length ? e : i.relative_urls ? r.documentBaseURI.toRelative(e) : e = r.documentBaseURI.toAbsolute(e, i.remove_script_host)
            },
            addVisual: function(e) {
                var n = this,
                    r = n.settings,
                    i = n.dom,
                    o;
                e = e || n.getBody(), n.hasVisual === t && (n.hasVisual = r.visual), B(i.select("table,a", e), function(e) {
                    var t;
                    switch (e.nodeName) {
                        case "TABLE":
                            return o = r.visual_table_class || "mce-item-table", t = i.getAttrib(e, "border"), void(t && "0" != t || !n.hasVisual ? i.removeClass(e, o) : i.addClass(e, o));
                        case "A":
                            return void(i.getAttrib(e, "href", !1) || (t = i.getAttrib(e, "name") || e.id, o = r.visual_anchor_class || "mce-item-anchor", t && n.hasVisual ? i.addClass(e, o) : i.removeClass(e, o)))
                    }
                }), n.fire("VisualAid", {
                    element: e,
                    hasVisual: n.hasVisual
                })
            },
            remove: function() {
                var e = this;
                e.removed || (e.save(), e.removed = 1, e.unbindAllNativeEvents(), e.hasHiddenInput && k.remove(e.getElement().nextSibling), e.inline || (I && 10 > I && e.getDoc().execCommand("SelectAll", !1, null), k.setStyle(e.id, "display", e.orgDisplay), e.getBody().onload = null), e.fire("remove"), e.editorManager.remove(e), k.remove(e.getContainer()), e.editorUpload.destroy(), e.destroy())
            },
            destroy: function(e) {
                var t = this,
                    n;
                if (!t.destroyed) {
                    if (!e && !t.removed) return void t.remove();
                    e || (t.editorManager.off("beforeunload", t._beforeUnload), t.theme && t.theme.destroy && t.theme.destroy(), t.selection.destroy(), t.dom.destroy()), n = t.formElement, n && (n._mceOldSubmit && (n.submit = n._mceOldSubmit, n._mceOldSubmit = null), k.unbind(n, "submit reset", t.formEventDelegate)), t.contentAreaContainer = t.formElement = t.container = t.editorContainer = null, t.bodyElement = t.contentDocument = t.contentWindow = null, t.iframeElement = t.targetElm = null, t.selection && (t.selection = t.selection.win = t.selection.dom = t.selection.dom.doc = null), t.destroyed = 1
                }
            },
            uploadImages: function(e) {
                return this.editorUpload.uploadImages(e)
            },
            _scanForImages: function() {
                return this.editorUpload.scanForImages()
            },
            _refreshContentEditable: function() {
                var e = this,
                    t, n;
                e._isHidden() && (t = e.getBody(), n = t.parentNode, n.removeChild(t), n.appendChild(t), t.focus())
            },
            _isHidden: function() {
                var e;
                return O ? (e = this.selection.getSel(), !e || !e.rangeCount || 0 === e.rangeCount) : 0
            }
        }, A(S.prototype, _), S
    }), r(_e, [], function() {
        var e = {},
            t = "en";
        return {
            setCode: function(e) {
                e && (t = e, this.rtl = this.data[e] ? "rtl" === this.data[e]._dir : !1)
            },
            getCode: function() {
                return t
            },
            rtl: !1,
            add: function(t, n) {
                var r = e[t];
                r || (e[t] = r = {});
                for (var i in n) r[i] = n[i];
                this.setCode(t)
            },
            translate: function(n) {
                var r;
                if (r = e[t], r || (r = {}), "undefined" == typeof n) return n;
                if ("string" != typeof n && n.raw) return n.raw;
                if (n.push) {
                    var i = n.slice(1);
                    n = (r[n[0]] || n[0]).replace(/\{([0-9]+)\}/g, function(e, t) {
                        return i[t]
                    })
                }
                return (r[n] || n).replace(/{context:\w+}$/, "")
            },
            data: e
        }
    }), r(Ee, [y, u], function(e, t) {
        function n(e) {
            function s() {
                try {
                    return document.activeElement
                } catch (e) {
                    return document.body
                }
            }

            function l(e, t) {
                if (t && t.startContainer) {
                    if (!e.isChildOf(t.startContainer, e.getRoot()) || !e.isChildOf(t.endContainer, e.getRoot())) return;
                    return {
                        startContainer: t.startContainer,
                        startOffset: t.startOffset,
                        endContainer: t.endContainer,
                        endOffset: t.endOffset
                    }
                }
                return t
            }

            function c(e, t) {
                var n;
                return t.startContainer ? (n = e.getDoc().createRange(), n.setStart(t.startContainer, t.startOffset), n.setEnd(t.endContainer, t.endOffset)) : n = t, n
            }

            function u(e) {
                return !!a.getParent(e, n.isEditorUIElement)
            }

            function d(n) {
                var d = n.editor;
                d.on("init", function() {
                    (d.inline || t.ie) && ("onbeforedeactivate" in document && t.ie < 9 ? d.dom.bind(d.getBody(), "beforedeactivate", function(e) {
                        if (e.target == d.getBody()) try {
                            d.lastRng = d.selection.getRng()
                        } catch (t) {}
                    }) : d.on("nodechange mouseup keyup", function(e) {
                        var t = s();
                        "nodechange" == e.type && e.selectionChange || (t && t.id == d.id + "_ifr" && (t = d.getBody()), d.dom.isChildOf(t, d.getBody()) && (d.lastRng = d.selection.getRng()))
                    }), t.webkit && !r && (r = function() {
                        var t = e.activeEditor;
                        if (t && t.selection) {
                            var n = t.selection.getRng();
                            n && !n.collapsed && (d.lastRng = n)
                        }
                    }, a.bind(document, "selectionchange", r)))
                }), d.on("setcontent", function() {
                    d.lastRng = null
                }), d.on("mousedown", function() {
                    d.selection.lastFocusBookmark = null
                }), d.on("focusin", function() {
                    var t = e.focusedEditor;
                    d.selection.lastFocusBookmark && (d.selection.setRng(c(d, d.selection.lastFocusBookmark)), d.selection.lastFocusBookmark = null), t != d && (t && t.fire("blur", {
                        focusedEditor: d
                    }), e.setActive(d), e.focusedEditor = d, d.fire("focus", {
                        blurredEditor: t
                    }), d.focus(!0)), d.lastRng = null
                }), d.on("focusout", function() {
                    window.setTimeout(function() {
                        var t = e.focusedEditor;
                        u(s()) || t != d || (d.fire("blur", {
                            focusedEditor: null
                        }), e.focusedEditor = null, d.selection && (d.selection.lastFocusBookmark = null))
                    }, 0)
                }), i || (i = function(t) {
                    var n = e.activeEditor;
                    n && t.target.ownerDocument == document && (n.selection && t.target != n.getBody() && (n.selection.lastFocusBookmark = l(n.dom, n.lastRng)), t.target == document.body || u(t.target) || e.focusedEditor != n || (n.fire("blur", {
                        focusedEditor: null
                    }), e.focusedEditor = null))
                }, a.bind(document, "focusin", i)), d.inline && !o && (o = function(t) {
                    var n = e.activeEditor;
                    if (n.inline && !n.dom.isChildOf(t.target, n.getBody())) {
                        var r = n.selection.getRng();
                        r.collapsed || (n.lastRng = r)
                    }
                }, a.bind(document, "mouseup", o))
            }

            function f(t) {
                e.focusedEditor == t.editor && (e.focusedEditor = null), e.activeEditor || (a.unbind(document, "selectionchange", r), a.unbind(document, "focusin", i), a.unbind(document, "mouseup", o), r = i = o = null)
            }
            e.on("AddEditor", d), e.on("RemoveEditor", f)
        }
        var r, i, o, a = e.DOM;
        return n.isEditorUIElement = function(e) {
            return -1 !== e.className.toString().indexOf("mce-")
        }, n
    }), r(Ne, [we, f, y, V, u, d, j, _e, Ee], function(e, t, n, r, i, o, a, s, l) {
        function c(e) {
            m(b.editors, function(t) {
                t.fire("ResizeWindow", e)
            })
        }

        function u(e, n) {
            n !== x && (n ? t(window).on("resize", c) : t(window).off("resize", c), x = n)
        }

        function d(e) {
            var t = b.editors,
                n;
            delete t[e.id];
            for (var r = 0; r < t.length; r++)
                if (t[r] == e) {
                    t.splice(r, 1), n = !0;
                    break
                }
            return b.activeEditor == e && (b.activeEditor = t[0]), b.focusedEditor == e && (b.focusedEditor = null), n
        }

        function f(e) {
            return e && !(e.getContainer() || e.getBody()).parentNode && (d(e), e.unbindAllNativeEvents(), e.destroy(!0), e = null), e
        }
        var h = n.DOM,
            p = o.explode,
            m = o.each,
            g = o.extend,
            v = 0,
            y, b, x = !1;
        return b = {
            $: t,
            majorVersion: "4",
            minorVersion: "2.1",
            releaseDate: "2015-06-29",
            editors: [],
            i18n: s,
            activeEditor: null,
            setup: function() {
                var e = this,
                    t, n, i = "",
                    o, a;
                if (n = document.location.href, /^[^:]+:\/\/\/?[^\/]+\//.test(n) && (n = n.replace(/[\?#].*$/, "").replace(/[\/\\][^\/]+$/, ""), /[\/\\]$/.test(n) || (n += "/")), o = window.tinymce || window.tinyMCEPreInit) t = o.base || o.baseURL, i = o.suffix;
                else {
                    for (var s = document.getElementsByTagName("script"), c = 0; c < s.length; c++)
                        if (a = s[c].src, /tinymce(\.full|\.jquery|)(\.min|\.dev|)\.js/.test(a)) {
                            -1 != a.indexOf(".min") && (i = ".min"), t = a.substring(0, a.lastIndexOf("/"));
                            break
                        }!t && document.currentScript && (a = document.currentScript.src, -1 != a.indexOf(".min") && (i = ".min"), t = a.substring(0, a.lastIndexOf("/")))
                }
                e.baseURL = new r(n).toAbsolute(t), e.documentBaseURL = n, e.baseURI = new r(e.baseURL), e.suffix = i, e.focusManager = new l(e)
            },
            init: function(t) {
                function n(e) {
                    var t = e.id;
                    return t || (t = e.name, t = t && !h.get(t) ? e.name : h.uniqueId(), e.setAttribute("id", t)), t
                }

                function r(t, n, r) {
                    if (!f(s.get(t))) {
                        var i = new e(t, n, s);
                        i.targetElm = i.targetElm || r, l.push(i), i.render()
                    }
                }

                function i(e) {
                    var n = t[e];
                    if (n) return n.apply(s, Array.prototype.slice.call(arguments, 2))
                }

                function o(e, t) {
                    return t.constructor === RegExp ? t.test(e.className) : h.hasClass(e, t)
                }

                function a() {
                    var e, s;
                    if (h.unbind(window, "ready", a), i("onpageload"), t.types) return void m(t.types, function(e) {
                        m(h.select(e.selector), function(i) {
                            r(n(i), g({}, t, e), i)
                        })
                    });
                    if (t.selector) return void m(h.select(t.selector), function(e) {
                        r(n(e), t, e)
                    });
                    switch (t.target && r(n(t.target), t), t.mode) {
                        case "exact":
                            e = t.elements || "", e.length > 0 && m(p(e), function(e) {
                                var n;
                                (n = h.get(e)) ? r(e, t, n): m(document.forms, function(n) {
                                    m(n.elements, function(n) {
                                        n.name === e && (e = "mce_editor_" + v++, h.setAttrib(n, "id", e), r(e, t, n))
                                    })
                                })
                            });
                            break;
                        case "textareas":
                        case "specific_textareas":
                            m(h.select("textarea"), function(e) {
                                t.editor_deselector && o(e, t.editor_deselector) || (!t.editor_selector || o(e, t.editor_selector)) && r(n(e), t, e)
                            })
                    }
                    t.oninit && (e = s = 0, m(l, function(t) {
                        s++, t.initialized ? e++ : t.on("init", function() {
                            e++, e == s && i("oninit")
                        }), e == s && i("oninit")
                    }))
                }
                var s = this,
                    l = [];
                s.settings = t, h.bind(window, "ready", a)
            },
            get: function(e) {
                return arguments.length ? e in this.editors ? this.editors[e] : null : this.editors
            },
            add: function(e) {
                var t = this,
                    n = t.editors;
                return n[e.id] = e, n.push(e), u(n, !0), t.activeEditor = e, t.fire("AddEditor", {
                    editor: e
                }), y || (y = function() {
                    t.fire("BeforeUnload")
                }, h.bind(window, "beforeunload", y)), e
            },
            createEditor: function(t, n) {
                return this.add(new e(t, n, this))
            },
            remove: function(e) {
                var t = this,
                    n, r = t.editors,
                    i; {
                    if (e) return "string" == typeof e ? (e = e.selector || e, void m(h.select(e), function(e) {
                        i = r[e.id], i && t.remove(i)
                    })) : (i = e, r[i.id] ? (d(i) && t.fire("RemoveEditor", {
                        editor: i
                    }), r.length || h.unbind(window, "beforeunload", y), i.remove(), u(r, r.length > 0), i) : null);
                    for (n = r.length - 1; n >= 0; n--) t.remove(r[n])
                }
            },
            execCommand: function(t, n, r) {
                var i = this,
                    o = i.get(r);
                switch (t) {
                    case "mceAddEditor":
                        return i.get(r) || new e(r, i.settings, i).render(), !0;
                    case "mceRemoveEditor":
                        return o && o.remove(), !0;
                    case "mceToggleEditor":
                        return o ? (o.isHidden() ? o.show() : o.hide(), !0) : (i.execCommand("mceAddEditor", 0, r), !0)
                }
                return i.activeEditor ? i.activeEditor.execCommand(t, n, r) : !1
            },
            triggerSave: function() {
                m(this.editors, function(e) {
                    e.save()
                })
            },
            addI18n: function(e, t) {
                s.add(e, t)
            },
            translate: function(e) {
                return s.translate(e)
            },
            setActive: function(e) {
                var t = this.activeEditor;
                this.activeEditor != e && (t && t.fire("deactivate", {
                    relatedTarget: e
                }), e.fire("activate", {
                    relatedTarget: t
                })), this.activeEditor = e
            }
        }, g(b, a), b.setup(), window.tinymce = window.tinyMCE = b, b
    }), r(Se, [Ne, d], function(e, t) {
        var n = t.each,
            r = t.explode;
        e.on("AddEditor", function(e) {
            var t = e.editor;
            t.on("preInit", function() {
                function e(e, t) {
                    n(t, function(t, n) {
                        t && s.setStyle(e, n, t)
                    }), s.rename(e, "span")
                }

                function i(e) {
                    s = t.dom, l.convert_fonts_to_spans && n(s.select("font,u,strike", e.node), function(e) {
                        o[e.nodeName.toLowerCase()](s, e)
                    })
                }
                var o, a, s, l = t.settings;
                l.inline_styles && (a = r(l.font_size_legacy_values), o = {
                    font: function(t, n) {
                        e(n, {
                            backgroundColor: n.style.backgroundColor,
                            color: n.color,
                            fontFamily: n.face,
                            fontSize: a[parseInt(n.size, 10) - 1]
                        })
                    },
                    u: function(n, r) {
                        "html4" === t.settings.schema && e(r, {
                            textDecoration: "underline"
                        })
                    },
                    strike: function(t, n) {
                        e(n, {
                            textDecoration: "line-through"
                        })
                    }
                }, t.on("PreProcess SetContent", i))
            })
        })
    }), r(ke, [j, d], function(e, t) {
        var n = {
            send: function(e) {
                function t() {
                    !e.async || 4 == r.readyState || i++ > 1e4 ? (e.success && 1e4 > i && 200 == r.status ? e.success.call(e.success_scope, "" + r.responseText, r, e) : e.error && e.error.call(e.error_scope, i > 1e4 ? "TIMED_OUT" : "GENERAL", r, e), r = null) : setTimeout(t, 10)
                }
                var r, i = 0;
                if (e.scope = e.scope || this, e.success_scope = e.success_scope || e.scope, e.error_scope = e.error_scope || e.scope, e.async = e.async === !1 ? !1 : !0, e.data = e.data || "", r = new XMLHttpRequest) {
                    if (r.overrideMimeType && r.overrideMimeType(e.content_type), r.open(e.type || (e.data ? "POST" : "GET"), e.url, e.async), e.crossDomain && (r.withCredentials = !0), e.content_type && r.setRequestHeader("Content-Type", e.content_type), r.setRequestHeader("X-Requested-With", "XMLHttpRequest"), r = n.fire("beforeSend", {
                            xhr: r,
                            settings: e
                        }).xhr, r.send(e.data), !e.async) return t();
                    setTimeout(t, 10)
                }
            }
        };
        return t.extend(n, e), n
    }), r(Te, [], function() {
        function e(t, n) {
            var r, i, o, a;
            if (n = n || '"', null === t) return "null";
            if (o = typeof t, "string" == o) return i = "\bb	t\nn\ff\rr\"\"''\\\\", n + t.replace(/([\u0080-\uFFFF\x00-\x1f\"\'\\])/g, function(e, t) {
                return '"' === n && "'" === e ? e : (r = i.indexOf(t), r + 1 ? "\\" + i.charAt(r + 1) : (e = t.charCodeAt().toString(16), "\\u" + "0000".substring(e.length) + e))
            }) + n;
            if ("object" == o) {
                if (t.hasOwnProperty && "[object Array]" === Object.prototype.toString.call(t)) {
                    for (r = 0, i = "["; r < t.length; r++) i += (r > 0 ? "," : "") + e(t[r], n);
                    return i + "]"
                }
                i = "{";
                for (a in t) t.hasOwnProperty(a) && (i += "function" != typeof t[a] ? (i.length > 1 ? "," + n : n) + a + n + ":" + e(t[a], n) : "");
                return i + "}"
            }
            return "" + t
        }
        return {
            serialize: e,
            parse: function(e) {
                try {
                    return window[String.fromCharCode(101) + "val"]("(" + e + ")")
                } catch (t) {}
            }
        }
    }), r(Re, [Te, ke, d], function(e, t, n) {
        function r(e) {
            this.settings = i({}, e), this.count = 0
        }
        var i = n.extend;
        return r.sendRPC = function(e) {
            return (new r).send(e)
        }, r.prototype = {
            send: function(n) {
                var r = n.error,
                    o = n.success;
                n = i(this.settings, n), n.success = function(t, i) {
                    t = e.parse(t), "undefined" == typeof t && (t = {
                        error: "JSON Parse error."
                    }), t.error ? r.call(n.error_scope || n.scope, t.error, i) : o.call(n.success_scope || n.scope, t.result)
                }, n.error = function(e, t) {
                    r && r.call(n.error_scope || n.scope, e, t)
                }, n.data = e.serialize({
                    id: n.id || "c" + this.count++,
                    method: n.method,
                    params: n.params
                }), n.content_type = "application/json", t.send(n)
            }
        }, r
    }), r(Ae, [y], function(e) {
        return {
            callbacks: {},
            count: 0,
            send: function(n) {
                var r = this,
                    i = e.DOM,
                    o = n.count !== t ? n.count : r.count,
                    a = "tinymce_jsonp_" + o;
                r.callbacks[o] = function(e) {
                    i.remove(a), delete r.callbacks[o], n.callback(e)
                }, i.add(i.doc.body, "script", {
                    id: a,
                    src: n.url,
                    type: "text/javascript"
                }), r.count++
            }
        }
    }), r(Be, [], function() {
        function e() {
            s = [];
            for (var e in a) s.push(e);
            i.length = s.length
        }

        function n() {
            function n(e) {
                var n, r;
                return r = e !== t ? u + e : i.indexOf(",", u), -1 === r || r > i.length ? null : (n = i.substring(u, r), u = r + 1, n)
            }
            var r, i, s, u = 0;
            if (a = {}, c) {
                o.load(l), i = o.getAttribute(l) || "";
                do {
                    var d = n();
                    if (null === d) break;
                    if (r = n(parseInt(d, 32) || 0), null !== r) {
                        if (d = n(), null === d) break;
                        s = n(parseInt(d, 32) || 0), r && (a[r] = s)
                    }
                } while (null !== r);
                e()
            }
        }

        function r() {
            var t, n = "";
            if (c) {
                for (var r in a) t = a[r], n += (n ? "," : "") + r.length.toString(32) + "," + r + "," + t.length.toString(32) + "," + t;
                o.setAttribute(l, n);
                try {
                    o.save(l)
                } catch (i) {}
                e()
            }
        }
        var i, o, a, s, l, c;
        try {
            if (window.localStorage) return localStorage
        } catch (u) {}
        return l = "tinymce", o = document.documentElement, c = !!o.addBehavior, c && o.addBehavior("#default#userData"), i = {
            key: function(e) {
                return s[e]
            },
            getItem: function(e) {
                return e in a ? a[e] : null
            },
            setItem: function(e, t) {
                a[e] = "" + t, r()
            },
            removeItem: function(e) {
                delete a[e], r()
            },
            clear: function() {
                a = {}, r()
            }
        }, n(), i
    }), r(De, [y, l, b, x, d, u], function(e, t, n, r, i, o) {
        var a = window.tinymce;
        return a.DOM = e.DOM, a.ScriptLoader = n.ScriptLoader, a.PluginManager = r.PluginManager, a.ThemeManager = r.ThemeManager, a.dom = a.dom || {}, a.dom.Event = t.Event, i.each(i, function(e, t) {
            a[t] = e
        }), i.each("isOpera isWebKit isIE isGecko isMac".split(" "), function(e) {
            a[e] = o[e.substr(2).toLowerCase()]
        }), {}
    }), r(Le, [U, d], function(e, t) {
        return e.extend({
            Defaults: {
                firstControlClass: "first",
                lastControlClass: "last"
            },
            init: function(e) {
                this.settings = t.extend({}, this.Defaults, e)
            },
            preRender: function(e) {
                e.bodyClasses.add(this.settings.containerClass)
            },
            applyClasses: function(e) {
                var t = this,
                    n = t.settings,
                    r, i, o, a;
                r = n.firstControlClass, i = n.lastControlClass, e.each(function(e) {
                    e.classes.remove(r).remove(i).add(n.controlClass), e.visible() && (o || (o = e), a = e)
                }), o && o.classes.add(r), a && a.classes.add(i)
            },
            renderHtml: function(e) {
                var t = this,
                    n = "";
                return t.applyClasses(e.items()), e.items().each(function(e) {
                    n += e.renderHtml()
                }), n
            },
            recalc: function() {},
            postRender: function() {},
            isNative: function() {
                return !1
            }
        })
    }), r(Me, [Le], function(e) {
        return e.extend({
            Defaults: {
                containerClass: "abs-layout",
                controlClass: "abs-layout-item"
            },
            recalc: function(e) {
                e.items().filter(":visible").each(function(e) {
                    var t = e.settings;
                    e.layoutRect({
                        x: t.x,
                        y: t.y,
                        w: t.w,
                        h: t.h
                    }), e.recalc && e.recalc()
                })
            },
            renderHtml: function(e) {
                return '<div id="' + e._id + '-absend" class="' + e.classPrefix + 'abs-end"></div>' + this._super(e)
            }
        })
    }), r(He, [ee, se], function(e, t) {
        return e.extend({
            Mixins: [t],
            Defaults: {
                classes: "widget tooltip tooltip-n"
            },
            renderHtml: function() {
                var e = this,
                    t = e.classPrefix;
                return '<div id="' + e._id + '" class="' + e.classes + '" role="presentation"><div class="' + t + 'tooltip-arrow"></div><div class="' + t + 'tooltip-inner">' + e.encode(e.state.get("text")) + "</div></div>"
            },
            bindStates: function() {
                var e = this;
                return e.state.on("change:text", function(t) {
                    e.getEl().lastChild.innerHTML = e.encode(t.value)
                }), e._super()
            },
            repaint: function() {
                var e = this,
                    t, n;
                t = e.getEl().style, n = e._layoutRect, t.left = n.x + "px", t.top = n.y + "px", t.zIndex = 131070
            }
        })
    }), r(Pe, [ee, He], function(e, t) {
        var n, r = e.extend({
            init: function(e) {
                var t = this;
                t._super(e), e = t.settings, t.canFocus = !0, e.tooltip && r.tooltips !== !1 && (t.on("mouseenter", function(n) {
                    var r = t.tooltip().moveTo(-65535);
                    if (n.control == t) {
                        var i = r.text(e.tooltip).show().testMoveRel(t.getEl(), ["bc-tc", "bc-tl", "bc-tr"]);
                        r.classes.toggle("tooltip-n", "bc-tc" == i), r.classes.toggle("tooltip-nw", "bc-tl" == i), r.classes.toggle("tooltip-ne", "bc-tr" == i), r.moveRel(t.getEl(), i)
                    } else r.hide()
                }), t.on("mouseleave mousedown click", function() {
                    t.tooltip().hide()
                })), t.aria("label", e.ariaLabel || e.tooltip)
            },
            tooltip: function() {
                return n || (n = new t({
                    type: "tooltip"
                }), n.renderTo()), n
            },
            postRender: function() {
                var e = this,
                    t = e.settings;
                e._super(), e.parent() || !t.width && !t.height || (e.initLayoutRect(), e.repaint()), t.autofocus && e.focus()
            },
            bindStates: function() {
                function e(e) {
                    n.aria("disabled", e), n.classes.toggle("disabled", e)
                }

                function t(e) {
                    n.aria("pressed", e), n.classes.toggle("active", e)
                }
                var n = this;
                return n.state.on("change:disabled", function(t) {
                    e(t.value)
                }), n.state.on("change:active", function(e) {
                    t(e.value)
                }), n.state.get("disabled") && e(!0), n.state.get("active") && t(!0), n._super()
            },
            remove: function() {
                this._super(), n && (n.remove(), n = null)
            }
        });
        return r
    }), r(Oe, [Pe], function(e) {
        return e.extend({
            Defaults: {
                classes: "widget btn",
                role: "button"
            },
            init: function(e) {
                var t = this,
                    n;
                t._super(e), e = t.settings, n = t.settings.size, t.on("click mousedown", function(e) {
                    e.preventDefault()
                }), t.on("touchstart", function(e) {
                    t.fire("click", e), e.preventDefault()
                }), e.subtype && t.classes.add(e.subtype), n && t.classes.add("btn-" + n), e.icon && t.icon(e.icon)
            },
            icon: function(e) {
                return arguments.length ? (this.state.set("icon", e), this) : this.state.get("icon")
            },
            repaint: function() {
                var e = this.getEl().firstChild.style;
                e.width = e.height = "100%", this._super()
            },
            renderHtml: function() {
                var e = this,
                    t = e._id,
                    n = e.classPrefix,
                    r = e.state.get("icon"),
                    i, o = e.state.get("text");
                return i = e.settings.image, i ? (r = "none", "string" != typeof i && (i = window.getSelection ? i[0] : i[1]), i = " style=\"background-image: url('" + i + "')\"") : i = "", o && e.classes.add("btn-has-text"), r = e.settings.icon ? n + "ico " + n + "i-" + r : "", '<div id="' + t + '" class="' + e.classes + '" tabindex="-1" aria-labelledby="' + t + '"><button role="presentation" type="button" tabindex="-1">' + (r ? '<i class="' + r + '"' + i + "></i>" : "") + (o ? e.encode(o) : "") + "</button></div>"
            },
            bindStates: function() {
                function e(e) {
                    for (var n = t.getEl().firstChild.firstChild; n; n = n.nextSibling) 3 == n.nodeType && (n.data = t.translate(e));
                    t.classes.toggle("btn-has-text", !!e)
                }
                var t = this;
                return t.state.on("change:text", function(t) {
                    e(t.value)
                }), t.state.on("change:icon", function(n) {
                    var r = n.value,
                        i = t.classPrefix;
                    t.settings.icon = r, r = r ? i + "ico " + i + "i-" + t.settings.icon : "";
                    var o = t.getEl().firstChild,
                        a = o.getElementsByTagName("i")[0];
                    r ? (a && a == o.firstChild || (a = document.createElement("i"), o.insertBefore(a, o.firstChild)), a.className = r) : a && o.removeChild(a), e(t.state.get("text"))
                }), t._super()
            }
        })
    }), r(Ie, [re], function(e) {
        return e.extend({
            Defaults: {
                defaultType: "button",
                role: "group"
            },
            renderHtml: function() {
                var e = this,
                    t = e._layout;
                return e.classes.add("btn-group"), e.preRender(), t.preRender(e), '<div id="' + e._id + '" class="' + e.classes + '"><div id="' + e._id + '-body">' + (e.settings.html || "") + t.renderHtml(e) + "</div></div>"
            }
        })
    }), r(Fe, [Pe], function(e) {
        return e.extend({
            Defaults: {
                classes: "checkbox",
                role: "checkbox",
                checked: !1
            },
            init: function(e) {
                var t = this;
                t._super(e), t.on("click mousedown", function(e) {
                    e.preventDefault()
                }), t.on("click", function(e) {
                    e.preventDefault(), t.disabled() || t.checked(!t.checked())
                }), t.checked(t.settings.checked)
            },
            checked: function(e) {
                return arguments.length ? (this.state.set("checked", e), this) : this.state.get("checked")
            },
            value: function(e) {
                return arguments.length ? this.checked(e) : this.checked()
            },
            renderHtml: function() {
                var e = this,
                    t = e._id,
                    n = e.classPrefix;
                return '<div id="' + t + '" class="' + e.classes + '" unselectable="on" aria-labelledby="' + t + '-al" tabindex="-1"><i class="' + n + "ico " + n + 'i-checkbox"></i><span id="' + t + '-al" class="' + n + 'label">' + e.encode(e.state.get("text")) + "</span></div>"
            },
            bindStates: function() {
                function e(e) {
                    t.classes.toggle("checked", e), t.aria("checked", e)
                }
                var t = this;
                return t.state.on("change:text", function(e) {
                    t.getEl("al").firstChild.data = t.translate(e.value)
                }), t.state.on("change:checked change:value", function(n) {
                    t.fire("change"), e(n.value)
                }), t.state.on("change:icon", function(e) {
                    var n = e.value,
                        r = t.classPrefix;
                    if ("undefined" == typeof n) return t.settings.icon;
                    t.settings.icon = n, n = n ? r + "ico " + r + "i-" + t.settings.icon : "";
                    var i = t.getEl().firstChild,
                        o = i.getElementsByTagName("i")[0];
                    n ? (o && o == i.firstChild || (o = document.createElement("i"), i.insertBefore(o, i.firstChild)), o.className = n) : o && i.removeChild(o)
                }), t.state.get("checked") && e(!0), t._super()
            }
        })
    }), r(ze, [Pe, te, X, f], function(e, t, n, r) {
        return e.extend({
            init: function(e) {
                var t = this;
                t._super(e), e = t.settings, t.classes.add("combobox"), t.subinput = !0, t.ariaTarget = "inp", e.menu = e.menu || e.values, e.menu && (e.icon = "caret"), t.on("click", function(n) {
                    var i = n.target,
                        o = t.getEl();
                    if (r.contains(o, i) || i == o)
                        for (; i && i != o;) i.id && -1 != i.id.indexOf("-open") && (t.fire("action"), e.menu && (t.showMenu(), n.aria && t.menu.items()[0].focus())), i = i.parentNode
                }), t.on("keydown", function(e) {
                    "INPUT" == e.target.nodeName && 13 == e.keyCode && t.parents().reverse().each(function(n) {
                        var r = t.state.get("value"),
                            i = t.getEl("inp").value;
                        return e.preventDefault(), t.state.set("value", i), r != i && t.fire("change"), n.hasEventListeners("submit") && n.toJSON ? (n.fire("submit", {
                            data: n.toJSON()
                        }), !1) : void 0
                    })
                }), t.on("keyup", function(e) {
                    "INPUT" == e.target.nodeName && t.state.set("value", e.target.value)
                })
            },
            showMenu: function() {
                var e = this,
                    n = e.settings,
                    r;
                e.menu || (r = n.menu || [], r.length ? r = {
                    type: "menu",
                    items: r
                } : r.type = r.type || "menu", e.menu = t.create(r).parent(e).renderTo(e.getContainerElm()), e.fire("createmenu"), e.menu.reflow(), e.menu.on("cancel", function(t) {
                    t.control === e.menu && e.focus()
                }), e.menu.on("show hide", function(t) {
                    t.control.items().each(function(t) {
                        t.active(t.value() == e.value())
                    })
                }).fire("show"), e.menu.on("select", function(t) {
                    e.value(t.control.value())
                }), e.on("focusin", function(t) {
                    "INPUT" == t.target.tagName.toUpperCase() && e.menu.hide()
                }), e.aria("expanded", !0)), e.menu.show(), e.menu.layoutRect({
                    w: e.layoutRect().w
                }), e.menu.moveRel(e.getEl(), e.isRtl() ? ["br-tr", "tr-br"] : ["bl-tl", "tl-bl"])
            },
            focus: function() {
                this.getEl("inp").focus()
            },
            repaint: function() {
                var e = this,
                    t = e.getEl(),
                    i = e.getEl("open"),
                    o = e.layoutRect(),
                    a, s;
                a = i ? o.w - n.getSize(i).width - 10 : o.w - 10;
                var l = document;
                return l.all && (!l.documentMode || l.documentMode <= 8) && (s = e.layoutRect().h - 2 + "px"), r(t.firstChild).css({
                    width: a,
                    lineHeight: s
                }), e._super(), e
            },
            postRender: function() {
                var e = this;
                return r(this.getEl("inp")).on("change", function(t) {
                    e.state.set("value", t.target.value), e.fire("change", t)
                }), e._super()
            },
            renderHtml: function() {
                var e = this,
                    t = e._id,
                    n = e.settings,
                    r = e.classPrefix,
                    i = e.state.get("value") || "",
                    o, a, s = "",
                    l = "";
                return "spellcheck" in n && (l += ' spellcheck="' + n.spellcheck + '"'), n.maxLength && (l += ' maxlength="' + n.maxLength + '"'), n.size && (l += ' size="' + n.size + '"'), n.subtype && (l += ' type="' + n.subtype + '"'), e.disabled() && (l += ' disabled="disabled"'), o = n.icon, o && "caret" != o && (o = r + "ico " + r + "i-" + n.icon), a = e.state.get("text"), (o || a) && (s = '<div id="' + t + '-open" class="' + r + "btn " + r + 'open" tabIndex="-1" role="button"><button id="' + t + '-action" type="button" hidefocus="1" tabindex="-1">' + ("caret" != o ? '<i class="' + o + '"></i>' : '<i class="' + r + 'caret"></i>') + (a ? (o ? " " : "") + a : "") + "</button></div>", e.classes.add("has-open")), '<div id="' + t + '" class="' + e.classes + '"><input id="' + t + '-inp" class="' + r + 'textbox" value="' + e.encode(i, !1) + '" hidefocus="1"' + l + ' placeholder="' + e.encode(n.placeholder) + '" />' + s + "</div>"
            },
            bindStates: function() {
                var e = this;
                return e.state.on("change:value", function(t) {
                    e.getEl("inp").value = t.value
                }), e.state.on("change:disabled", function(t) {
                    e.getEl("inp").disabled = t.value
                }), e._super()
            },
            remove: function() {
                r(this.getEl("inp")).off(), this._super()
            }
        })
    }), r(We, [ze], function(e) {
        return e.extend({
            init: function(e) {
                var t = this;
                e.spellcheck = !1, e.onaction && (e.icon = "none"), t._super(e), t.classes.add("colorbox"), t.on("change keyup postrender", function() {
                    t.repaintColor(t.value())
                })
            },
            repaintColor: function(e) {
                var t = this.getEl().getElementsByTagName("i")[0];
                if (t) try {
                    t.style.background = e
                } catch (n) {}
            },
            bindStates: function() {
                var e = this;
                return e.state.on("change:value", function(t) {
                    e._rendered && e.repaintColor(t.value)
                }), e._super()
            }
        })
    }), r(Ve, [Oe, ce], function(e, t) {
        return e.extend({
            showPanel: function() {
                var e = this,
                    n = e.settings;
                if (e.active(!0), e.panel) e.panel.show();
                else {
                    var r = n.panel;
                    r.type && (r = {
                        layout: "grid",
                        items: r
                    }), r.role = r.role || "dialog", r.popover = !0, r.autohide = !0, r.ariaRoot = !0, e.panel = new t(r).on("hide", function() {
                        e.active(!1)
                    }).on("cancel", function(t) {
                        t.stopPropagation(), e.focus(), e.hidePanel()
                    }).parent(e).renderTo(e.getContainerElm()), e.panel.fire("show"), e.panel.reflow()
                }
                e.panel.moveRel(e.getEl(), n.popoverAlign || (e.isRtl() ? ["bc-tr", "bc-tc"] : ["bc-tl", "bc-tc"]))
            },
            hidePanel: function() {
                var e = this;
                e.panel && e.panel.hide()
            },
            postRender: function() {
                var e = this;
                return e.aria("haspopup", !0), e.on("click", function(t) {
                    t.control === e && (e.panel && e.panel.visible() ? e.hidePanel() : (e.showPanel(), e.panel.focus(!!t.aria)))
                }), e._super()
            },
            remove: function() {
                return this.panel && (this.panel.remove(), this.panel = null), this._super()
            }
        })
    }), r(Ue, [Ve, y], function(e, t) {
        var n = t.DOM;
        return e.extend({
            init: function(e) {
                this._super(e), this.classes.add("colorbutton")
            },
            color: function(e) {
                return e ? (this._color = e, this.getEl("preview").style.backgroundColor = e, this) : this._color
            },
            resetColor: function() {
                return this._color = null, this.getEl("preview").style.backgroundColor = null, this
            },
            renderHtml: function() {
                var e = this,
                    t = e._id,
                    n = e.classPrefix,
                    r = e.state.get("text"),
                    i = e.settings.icon ? n + "ico " + n + "i-" + e.settings.icon : "",
                    o = e.settings.image ? " style=\"background-image: url('" + e.settings.image + "')\"" : "";
                return '<div id="' + t + '" class="' + e.classes + '" role="button" tabindex="-1" aria-haspopup="true"><button role="presentation" hidefocus="1" type="button" tabindex="-1">' + (i ? '<i class="' + i + '"' + o + "></i>" : "") + '<span id="' + t + '-preview" class="' + n + 'preview"></span>' + (r ? (i ? " " : "") + r : "") + '</button><button type="button" class="' + n + 'open" hidefocus="1" tabindex="-1"> <i class="' + n + 'caret"></i></button></div>'
            },
            postRender: function() {
                var e = this,
                    t = e.settings.onclick;
                return e.on("click", function(r) {
                    r.aria && "down" == r.aria.key || r.control != e || n.getParent(r.target, "." + e.classPrefix + "open") || (r.stopImmediatePropagation(), t.call(e, r))
                }), delete e.settings.onclick, e._super()
            }
        })
    }), r($e, [], function() {
        function e(e) {
            function i(e, i, o) {
                var a, s, l, c, u, d;
                return a = 0, s = 0, l = 0, e /= 255, i /= 255, o /= 255, u = t(e, t(i, o)), d = n(e, n(i, o)), u == d ? (l = u, {
                    h: 0,
                    s: 0,
                    v: 100 * l
                }) : (c = e == u ? i - o : o == u ? e - i : o - e, a = e == u ? 3 : o == u ? 1 : 5, a = 60 * (a - c / (d - u)), s = (d - u) / d, l = d, {
                    h: r(a),
                    s: r(100 * s),
                    v: r(100 * l)
                })
            }

            function o(e, i, o) {
                var a, s, l, c;
                if (e = (parseInt(e, 10) || 0) % 360, i = parseInt(i, 10) / 100, o = parseInt(o, 10) / 100, i = n(0, t(i, 1)), o = n(0, t(o, 1)), 0 === i) return void(d = f = h = r(255 * o));
                switch (a = e / 60, s = o * i, l = s * (1 - Math.abs(a % 2 - 1)), c = o - s, Math.floor(a)) {
                    case 0:
                        d = s, f = l, h = 0;
                        break;
                    case 1:
                        d = l, f = s, h = 0;
                        break;
                    case 2:
                        d = 0, f = s, h = l;
                        break;
                    case 3:
                        d = 0, f = l, h = s;
                        break;
                    case 4:
                        d = l, f = 0, h = s;
                        break;
                    case 5:
                        d = s, f = 0, h = l;
                        break;
                    default:
                        d = f = h = 0
                }
                d = r(255 * (d + c)), f = r(255 * (f + c)), h = r(255 * (h + c))
            }

            function a() {
                function e(e) {
                    return e = parseInt(e, 10).toString(16), e.length > 1 ? e : "0" + e
                }
                return "#" + e(d) + e(f) + e(h)
            }

            function s() {
                return {
                    r: d,
                    g: f,
                    b: h
                }
            }

            function l() {
                return i(d, f, h)
            }

            function c(e) {
                var t;
                return "object" == typeof e ? "r" in e ? (d = e.r, f = e.g, h = e.b) : "v" in e && o(e.h, e.s, e.v) : (t = /rgb\s*\(\s*([0-9]+)\s*,\s*([0-9]+)\s*,\s*([0-9]+)[^\)]*\)/gi.exec(e)) ? (d = parseInt(t[1], 10), f = parseInt(t[2], 10), h = parseInt(t[3], 10)) : (t = /#([0-F]{2})([0-F]{2})([0-F]{2})/gi.exec(e)) ? (d = parseInt(t[1], 16), f = parseInt(t[2], 16), h = parseInt(t[3], 16)) : (t = /#([0-F])([0-F])([0-F])/gi.exec(e)) && (d = parseInt(t[1] + t[1], 16), f = parseInt(t[2] + t[2], 16), h = parseInt(t[3] + t[3], 16)), d = 0 > d ? 0 : d > 255 ? 255 : d, f = 0 > f ? 0 : f > 255 ? 255 : f, h = 0 > h ? 0 : h > 255 ? 255 : h, u
            }
            var u = this,
                d = 0,
                f = 0,
                h = 0;
            e && c(e), u.toRgb = s, u.toHsv = l, u.toHex = a, u.parse = c
        }
        var t = Math.min,
            n = Math.max,
            r = Math.round;
        return e
    }), r(qe, [Pe, ie, X, $e], function(e, t, n, r) {
        return e.extend({
            Defaults: {
                classes: "widget colorpicker"
            },
            init: function(e) {
                this._super(e)
            },
            postRender: function() {
                function e(e, t) {
                    var r = n.getPos(e),
                        i, o;
                    return i = t.pageX - r.x, o = t.pageY - r.y, i = Math.max(0, Math.min(i / e.clientWidth, 1)), o = Math.max(0, Math.min(o / e.clientHeight, 1)), {
                        x: i,
                        y: o
                    }
                }

                function i(e, t) {
                    var i = (360 - e.h) / 360;
                    n.css(d, {
                        top: 100 * i + "%"
                    }), t || n.css(h, {
                        left: e.s + "%",
                        top: 100 - e.v + "%"
                    }), f.style.background = new r({
                        s: 100,
                        v: 100,
                        h: e.h
                    }).toHex(), s.color().parse({
                        s: e.s,
                        v: e.v,
                        h: e.h
                    })
                }

                function o(t) {
                    var n;
                    n = e(f, t), c.s = 100 * n.x, c.v = 100 * (1 - n.y), i(c), s.fire("change")
                }

                function a(t) {
                    var n;
                    n = e(u, t), c = l.toHsv(), c.h = 360 * (1 - n.y), i(c, !0), s.fire("change")
                }
                var s = this,
                    l = s.color(),
                    c, u, d, f, h;
                u = s.getEl("h"), d = s.getEl("hp"), f = s.getEl("sv"), h = s.getEl("svp"), s._repaint = function() {
                    c = l.toHsv(), i(c)
                }, s._super(), s._svdraghelper = new t(s._id + "-sv", {
                    start: o,
                    drag: o
                }), s._hdraghelper = new t(s._id + "-h", {
                    start: a,
                    drag: a
                }), s._repaint()
            },
            rgb: function() {
                return this.color().toRgb()
            },
            value: function(e) {
                var t = this;
                return arguments.length ? (t.color().parse(e), void(t._rendered && t._repaint())) : t.color().toHex()
            },
            color: function() {
                return this._color || (this._color = new r),
                    this._color
            },
            renderHtml: function() {
                function e() {
                    var e, t, n = "",
                        i, a;
                    for (i = "filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=", a = o.split(","), e = 0, t = a.length - 1; t > e; e++) n += '<div class="' + r + 'colorpicker-h-chunk" style="height:' + 100 / t + "%;" + i + a[e] + ",endColorstr=" + a[e + 1] + ");-ms-" + i + a[e] + ",endColorstr=" + a[e + 1] + ')"></div>';
                    return n
                }
                var t = this,
                    n = t._id,
                    r = t.classPrefix,
                    i, o = "#ff0000,#ff0080,#ff00ff,#8000ff,#0000ff,#0080ff,#00ffff,#00ff80,#00ff00,#80ff00,#ffff00,#ff8000,#ff0000",
                    a = "background: -ms-linear-gradient(top," + o + ");background: linear-gradient(to bottom," + o + ");";
                return i = '<div id="' + n + '-h" class="' + r + 'colorpicker-h" style="' + a + '">' + e() + '<div id="' + n + '-hp" class="' + r + 'colorpicker-h-marker"></div></div>', '<div id="' + n + '" class="' + t.classes + '"><div id="' + n + '-sv" class="' + r + 'colorpicker-sv"><div class="' + r + 'colorpicker-overlay1"><div class="' + r + 'colorpicker-overlay2"><div id="' + n + '-svp" class="' + r + 'colorpicker-selector1"><div class="' + r + 'colorpicker-selector2"></div></div></div></div></div>' + i + "</div>"
            }
        })
    }), r(je, [Pe], function(e) {
        return e.extend({
            init: function(e) {
                var t = this;
                e.delimiter || (e.delimiter = "\xbb"), t._super(e), t.classes.add("path"), t.canFocus = !0, t.on("click", function(e) {
                    var n, r = e.target;
                    (n = r.getAttribute("data-index")) && t.fire("select", {
                        value: t.row()[n],
                        index: n
                    })
                }), t.row(t.settings.row)
            },
            focus: function() {
                var e = this;
                return e.getEl().firstChild.focus(), e
            },
            row: function(e) {
                return arguments.length ? (this.state.set("row", e), this) : this.state.get("row")
            },
            renderHtml: function() {
                var e = this;
                return '<div id="' + e._id + '" class="' + e.classes + '">' + e._getDataPathHtml(e.state.get("row")) + "</div>"
            },
            bindStates: function() {
                var e = this;
                return e.state.on("change:row", function(t) {
                    e.innerHtml(e._getDataPathHtml(t.value))
                }), e._super()
            },
            _getDataPathHtml: function(e) {
                var t = this,
                    n = e || [],
                    r, i, o = "",
                    a = t.classPrefix;
                for (r = 0, i = n.length; i > r; r++) o += (r > 0 ? '<div class="' + a + 'divider" aria-hidden="true"> ' + t.settings.delimiter + " </div>" : "") + '<div role="button" class="' + a + "path-item" + (r == i - 1 ? " " + a + "last" : "") + '" data-index="' + r + '" tabindex="-1" id="' + t._id + "-" + r + '" aria-level="' + r + '">' + n[r].name + "</div>";
                return o || (o = '<div class="' + a + 'path-item">\xa0</div>'), o
            }
        })
    }), r(Ke, [je, Ne], function(e, t) {
        return e.extend({
            postRender: function() {
                function e(e) {
                    if (1 === e.nodeType) {
                        if ("BR" == e.nodeName || e.getAttribute("data-mce-bogus")) return !0;
                        if ("bookmark" === e.getAttribute("data-mce-type")) return !0
                    }
                    return !1
                }
                var n = this,
                    r = t.activeEditor;
                return r.settings.elementpath !== !1 && (n.on("select", function(e) {
                    r.focus(), r.selection.select(this.data()[e.index].element), r.nodeChanged()
                }), r.on("nodeChange", function(t) {
                    for (var i = [], o = t.parents, a = o.length; a--;)
                        if (1 == o[a].nodeType && !e(o[a])) {
                            var s = r.fire("ResolveName", {
                                name: o[a].nodeName.toLowerCase(),
                                target: o[a]
                            });
                            if (s.isDefaultPrevented() || i.push({
                                    name: s.name,
                                    element: o[a]
                                }), s.isPropagationStopped()) break
                        }
                    n.row(i)
                })), n._super()
            }
        })
    }), r(Ye, [re], function(e) {
        return e.extend({
            Defaults: {
                layout: "flex",
                align: "center",
                defaults: {
                    flex: 1
                }
            },
            renderHtml: function() {
                var e = this,
                    t = e._layout,
                    n = e.classPrefix;
                return e.classes.add("formitem"), t.preRender(e), '<div id="' + e._id + '" class="' + e.classes + '" hidefocus="1" tabindex="-1">' + (e.settings.title ? '<div id="' + e._id + '-title" class="' + n + 'title">' + e.settings.title + "</div>" : "") + '<div id="' + e._id + '-body" class="' + e.bodyClasses + '">' + (e.settings.html || "") + t.renderHtml(e) + "</div></div>"
            }
        })
    }), r(Ge, [re, Ye, d], function(e, t, n) {
        return e.extend({
            Defaults: {
                containerCls: "form",
                layout: "flex",
                direction: "column",
                align: "stretch",
                flex: 1,
                padding: 20,
                labelGap: 30,
                spacing: 10,
                callbacks: {
                    submit: function() {
                        this.submit()
                    }
                }
            },
            preRender: function() {
                var e = this,
                    r = e.items();
                e.settings.formItemDefaults || (e.settings.formItemDefaults = {
                    layout: "flex",
                    autoResize: "overflow",
                    defaults: {
                        flex: 1
                    }
                }), r.each(function(r) {
                    var i, o = r.settings.label;
                    o && (i = new t(n.extend({
                        items: {
                            type: "label",
                            id: r._id + "-l",
                            text: o,
                            flex: 0,
                            forId: r._id,
                            disabled: r.disabled()
                        }
                    }, e.settings.formItemDefaults)), i.type = "formitem", r.aria("labelledby", r._id + "-l"), "undefined" == typeof r.settings.flex && (r.settings.flex = 1), e.replace(r, i), i.add(r))
                })
            },
            submit: function() {
                return this.fire("submit", {
                    data: this.toJSON()
                })
            },
            postRender: function() {
                var e = this;
                e._super(), e.fromJSON(e.settings.data)
            },
            bindStates: function() {
                function e() {
                    var e = 0,
                        n = [],
                        r, i, o;
                    if (t.settings.labelGapCalc !== !1)
                        for (o = "children" == t.settings.labelGapCalc ? t.find("formitem") : t.items(), o.filter("formitem").each(function(t) {
                            var r = t.items()[0],
                                i = r.getEl().clientWidth;
                            e = i > e ? i : e, n.push(r)
                        }), i = t.settings.labelGap || 0, r = n.length; r--;) n[r].settings.minWidth = e + i
                }
                var t = this;
                t._super(), t.on("show", e), e()
            }
        })
    }), r(Xe, [Ge], function(e) {
        return e.extend({
            Defaults: {
                containerCls: "fieldset",
                layout: "flex",
                direction: "column",
                align: "stretch",
                flex: 1,
                padding: "25 15 5 15",
                labelGap: 30,
                spacing: 10,
                border: 1
            },
            renderHtml: function() {
                var e = this,
                    t = e._layout,
                    n = e.classPrefix;
                return e.preRender(), t.preRender(e), '<fieldset id="' + e._id + '" class="' + e.classes + '" hidefocus="1" tabindex="-1">' + (e.settings.title ? '<legend id="' + e._id + '-title" class="' + n + 'fieldset-title">' + e.settings.title + "</legend>" : "") + '<div id="' + e._id + '-body" class="' + e.bodyClasses + '">' + (e.settings.html || "") + t.renderHtml(e) + "</div></fieldset>"
            }
        })
    }), r(Je, [ze, d], function(e, t) {
        return e.extend({
            init: function(e) {
                var n = this,
                    r = tinymce.activeEditor,
                    i = r.settings,
                    o, a, s;
                e.spellcheck = !1, s = i.file_picker_types || i.file_browser_callback_types, s && (s = t.makeMap(s, /[, ]/)), (!s || s[e.filetype]) && (a = i.file_picker_callback, !a || s && !s[e.filetype] ? (a = i.file_browser_callback, !a || s && !s[e.filetype] || (o = function() {
                    a(n.getEl("inp").id, n.value(), e.filetype, window)
                })) : o = function() {
                    var i = n.fire("beforecall").meta;
                    i = t.extend({
                        filetype: e.filetype
                    }, i), a.call(r, function(e, t) {
                        n.value(e).fire("change", {
                            meta: t
                        })
                    }, n.value(), i)
                }), o && (e.icon = "browse", e.onaction = o), n._super(e)
            }
        })
    }), r(Qe, [Me], function(e) {
        return e.extend({
            recalc: function(e) {
                var t = e.layoutRect(),
                    n = e.paddingBox;
                e.items().filter(":visible").each(function(e) {
                    e.layoutRect({
                        x: n.left,
                        y: n.top,
                        w: t.innerW - n.right - n.left,
                        h: t.innerH - n.top - n.bottom
                    }), e.recalc && e.recalc()
                })
            }
        })
    }), r(Ze, [Me], function(e) {
        return e.extend({
            recalc: function(e) {
                var t, n, r, i, o, a, s, l, c, u, d, f, h, p, m, g, v = [],
                    y, b, x, C, w, _, E, N, S, k, T, R, A, B, D, L, M, H, P, O, I, F, z = Math.max,
                    W = Math.min;
                for (r = e.items().filter(":visible"), i = e.layoutRect(), o = e.paddingBox, a = e.settings, f = e.isRtl() ? a.direction || "row-reversed" : a.direction, s = a.align, l = e.isRtl() ? a.pack || "end" : a.pack, c = a.spacing || 0, ("row-reversed" == f || "column-reverse" == f) && (r = r.set(r.toArray().reverse()), f = f.split("-")[0]), "column" == f ? (S = "y", E = "h", N = "minH", k = "maxH", R = "innerH", T = "top", A = "deltaH", B = "contentH", P = "left", M = "w", D = "x", L = "innerW", H = "minW", O = "right", I = "deltaW", F = "contentW") : (S = "x", E = "w", N = "minW", k = "maxW", R = "innerW", T = "left", A = "deltaW", B = "contentW", P = "top", M = "h", D = "y", L = "innerH", H = "minH", O = "bottom", I = "deltaH", F = "contentH"), d = i[R] - o[T] - o[T], _ = u = 0, t = 0, n = r.length; n > t; t++) h = r[t], p = h.layoutRect(), m = h.settings, g = m.flex, d -= n - 1 > t ? c : 0, g > 0 && (u += g, p[k] && v.push(h), p.flex = g), d -= p[N], y = o[P] + p[H] + o[O], y > _ && (_ = y);
                if (C = {}, 0 > d ? C[N] = i[N] - d + i[A] : C[N] = i[R] - d + i[A], C[H] = _ + i[I], C[B] = i[R] - d, C[F] = _, C.minW = W(C.minW, i.maxW), C.minH = W(C.minH, i.maxH), C.minW = z(C.minW, i.startMinWidth), C.minH = z(C.minH, i.startMinHeight), !i.autoResize || C.minW == i.minW && C.minH == i.minH) {
                    for (x = d / u, t = 0, n = v.length; n > t; t++) h = v[t], p = h.layoutRect(), b = p[k], y = p[N] + p.flex * x, y > b ? (d -= p[k] - p[N], u -= p.flex, p.flex = 0, p.maxFlexSize = b) : p.maxFlexSize = 0;
                    for (x = d / u, w = o[T], C = {}, 0 === u && ("end" == l ? w = d + o[T] : "center" == l ? (w = Math.round(i[R] / 2 - (i[R] - d) / 2) + o[T], 0 > w && (w = o[T])) : "justify" == l && (w = o[T], c = Math.floor(d / (r.length - 1)))), C[D] = o[P], t = 0, n = r.length; n > t; t++) h = r[t], p = h.layoutRect(), y = p.maxFlexSize || p[N], "center" === s ? C[D] = Math.round(i[L] / 2 - p[M] / 2) : "stretch" === s ? (C[M] = z(p[H] || 0, i[L] - o[P] - o[O]), C[D] = o[P]) : "end" === s && (C[D] = i[L] - p[M] - o.top), p.flex > 0 && (y += p.flex * x), C[E] = y, C[S] = w, h.layoutRect(C), h.recalc && h.recalc(), w += y + c
                } else if (C.w = C.minW, C.h = C.minH, e.layoutRect(C), this.recalc(e), null === e._lastRect) {
                    var V = e.parent();
                    V && (V._lastRect = null, V.recalc())
                }
            }
        })
    }), r(et, [Le], function(e) {
        return e.extend({
            Defaults: {
                containerClass: "flow-layout",
                controlClass: "flow-layout-item",
                endClass: "break"
            },
            recalc: function(e) {
                e.items().filter(":visible").each(function(e) {
                    e.recalc && e.recalc()
                })
            },
            isNative: function() {
                return !0
            }
        })
    }), r(tt, [ee, Pe, ce, d, Ne, u], function(e, t, n, r, i, o) {
        function a(e) {
            function t(t, n) {
                return function() {
                    var r = this;
                    e.on("nodeChange", function(i) {
                        var o = e.formatter,
                            a = null;
                        s(i.parents, function(e) {
                            return s(t, function(t) {
                                return n ? o.matchNode(e, n, {
                                    value: t.value
                                }) && (a = t.value) : o.matchNode(e, t.value) && (a = t.value), a ? !1 : void 0
                            }), a ? !1 : void 0
                        }), r.value(a)
                    })
                }
            }

            function r(e) {
                e = e.replace(/;$/, "").split(";");
                for (var t = e.length; t--;) e[t] = e[t].split("=");
                return e
            }

            function i() {
                function t(e) {
                    var n = [];
                    if (e) return s(e, function(e) {
                        var o = {
                            text: e.title,
                            icon: e.icon
                        };
                        if (e.items) o.menu = t(e.items);
                        else {
                            var a = e.format || "custom" + r++;
                            e.format || (e.name = a, i.push(e)), o.format = a, o.cmd = e.cmd
                        }
                        n.push(o)
                    }), n
                }

                function n() {
                    var n;
                    return n = t(e.settings.style_formats_merge ? e.settings.style_formats ? o.concat(e.settings.style_formats) : o : e.settings.style_formats || o)
                }
                var r = 0,
                    i = [],
                    o = [{
                        title: "Headings",
                        items: [{
                            title: "Heading 1",
                            format: "h1"
                        }, {
                            title: "Heading 2",
                            format: "h2"
                        }, {
                            title: "Heading 3",
                            format: "h3"
                        }, {
                            title: "Heading 4",
                            format: "h4"
                        }, {
                            title: "Heading 5",
                            format: "h5"
                        }, {
                            title: "Heading 6",
                            format: "h6"
                        }]
                    }, {
                        title: "Inline",
                        items: [{
                            title: "Bold",
                            icon: "bold",
                            format: "bold"
                        }, {
                            title: "Italic",
                            icon: "italic",
                            format: "italic"
                        }, {
                            title: "Underline",
                            icon: "underline",
                            format: "underline"
                        }, {
                            title: "Strikethrough",
                            icon: "strikethrough",
                            format: "strikethrough"
                        }, {
                            title: "Superscript",
                            icon: "superscript",
                            format: "superscript"
                        }, {
                            title: "Subscript",
                            icon: "subscript",
                            format: "subscript"
                        }, {
                            title: "Code",
                            icon: "code",
                            format: "code"
                        }]
                    }, {
                        title: "Blocks",
                        items: [{
                            title: "Paragraph",
                            format: "p"
                        }, {
                            title: "Blockquote",
                            format: "blockquote"
                        }, {
                            title: "Div",
                            format: "div"
                        }, {
                            title: "Pre",
                            format: "pre"
                        }]
                    }, {
                        title: "Alignment",
                        items: [{
                            title: "Left",
                            icon: "alignleft",
                            format: "alignleft"
                        }, {
                            title: "Center",
                            icon: "aligncenter",
                            format: "aligncenter"
                        }, {
                            title: "Right",
                            icon: "alignright",
                            format: "alignright"
                        }, {
                            title: "Justify",
                            icon: "alignjustify",
                            format: "alignjustify"
                        }]
                    }];
                return e.on("init", function() {
                    s(i, function(t) {
                        e.formatter.register(t.name, t)
                    })
                }), {
                    type: "menu",
                    items: n(),
                    onPostRender: function(t) {
                        e.fire("renderFormatsMenu", {
                            control: t.control
                        })
                    },
                    itemDefaults: {
                        preview: !0,
                        textStyle: function() {
                            return this.settings.format ? e.formatter.getCssText(this.settings.format) : void 0
                        },
                        onPostRender: function() {
                            var t = this;
                            t.parent().on("show", function() {
                                var n, r;
                                n = t.settings.format, n && (t.disabled(!e.formatter.canApply(n)), t.active(e.formatter.match(n))), r = t.settings.cmd, r && t.active(e.queryCommandState(r))
                            })
                        },
                        onclick: function() {
                            this.settings.format && l(this.settings.format), this.settings.cmd && e.execCommand(this.settings.cmd)
                        }
                    }
                }
            }

            function o(t) {
                return function() {
                    function n() {
                        return e.undoManager ? e.undoManager[t]() : !1
                    }
                    var r = this;
                    t = "redo" == t ? "hasRedo" : "hasUndo", r.disabled(!n()), e.on("Undo Redo AddUndo TypingUndo ClearUndos", function() {
                        r.disabled(!n())
                    })
                }
            }

            function a() {
                var t = this;
                e.on("VisualAid", function(e) {
                    t.active(e.hasVisual)
                }), t.active(e.hasVisual)
            }

            function l(t) {
                t.control && (t = t.control.value()), t && e.execCommand("mceToggleFormat", !1, t)
            }
            var c;
            c = i(), s({
                bold: "Bold",
                italic: "Italic",
                underline: "Underline",
                strikethrough: "Strikethrough",
                subscript: "Subscript",
                superscript: "Superscript"
            }, function(t, n) {
                e.addButton(n, {
                    tooltip: t,
                    onPostRender: function() {
                        var t = this;
                        e.formatter ? e.formatter.formatChanged(n, function(e) {
                            t.active(e)
                        }) : e.on("init", function() {
                            e.formatter.formatChanged(n, function(e) {
                                t.active(e)
                            })
                        })
                    },
                    onclick: function() {
                        l(n)
                    }
                })
            }), s({
                outdent: ["Decrease indent", "Outdent"],
                indent: ["Increase indent", "Indent"],
                cut: ["Cut", "Cut"],
                copy: ["Copy", "Copy"],
                paste: ["Paste", "Paste"],
                help: ["Help", "mceHelp"],
                selectall: ["Select all", "SelectAll"],
                removeformat: ["Clear formatting", "RemoveFormat"],
                visualaid: ["Visual aids", "mceToggleVisualAid"],
                newdocument: ["New document", "mceNewDocument"]
            }, function(t, n) {
                e.addButton(n, {
                    tooltip: t[0],
                    cmd: t[1]
                })
            }), s({
                blockquote: ["Blockquote", "mceBlockQuote"],
                numlist: ["Numbered list", "InsertOrderedList"],
                bullist: ["Bullet list", "InsertUnorderedList"],
                subscript: ["Subscript", "Subscript"],
                superscript: ["Superscript", "Superscript"],
                alignleft: ["Align left", "JustifyLeft"],
                aligncenter: ["Align center", "JustifyCenter"],
                alignright: ["Align right", "JustifyRight"],
                alignjustify: ["Justify", "JustifyFull"],
                alignnone: ["No alignment", "JustifyNone"]
            }, function(t, n) {
                e.addButton(n, {
                    tooltip: t[0],
                    cmd: t[1],
                    onPostRender: function() {
                        var t = this;
                        e.formatter ? e.formatter.formatChanged(n, function(e) {
                            t.active(e)
                        }) : e.on("init", function() {
                            e.formatter.formatChanged(n, function(e) {
                                t.active(e)
                            })
                        })
                    }
                })
            }), e.addButton("undo", {
                tooltip: "Undo",
                onPostRender: o("undo"),
                cmd: "undo"
            }), e.addButton("redo", {
                tooltip: "Redo",
                onPostRender: o("redo"),
                cmd: "redo"
            }), e.addMenuItem("newdocument", {
                text: "New document",
                icon: "newdocument",
                cmd: "mceNewDocument"
            }), e.addMenuItem("undo", {
                text: "Undo",
                icon: "undo",
                shortcut: "Meta+Z",
                onPostRender: o("undo"),
                cmd: "undo"
            }), e.addMenuItem("redo", {
                text: "Redo",
                icon: "redo",
                shortcut: "Meta+Y",
                onPostRender: o("redo"),
                cmd: "redo"
            }), e.addMenuItem("visualaid", {
                text: "Visual aids",
                selectable: !0,
                onPostRender: a,
                cmd: "mceToggleVisualAid"
            }), e.addButton("remove", {
                tooltip: "Remove",
                icon: "remove",
                cmd: "Delete"
            }), s({
                cut: ["Cut", "Cut", "Meta+X"],
                copy: ["Copy", "Copy", "Meta+C"],
                paste: ["Paste", "Paste", "Meta+V"],
                selectall: ["Select all", "SelectAll", "Meta+A"],
                bold: ["Bold", "Bold", "Meta+B"],
                italic: ["Italic", "Italic", "Meta+I"],
                underline: ["Underline", "Underline"],
                strikethrough: ["Strikethrough", "Strikethrough"],
                subscript: ["Subscript", "Subscript"],
                superscript: ["Superscript", "Superscript"],
                removeformat: ["Clear formatting", "RemoveFormat"]
            }, function(t, n) {
                e.addMenuItem(n, {
                    text: t[0],
                    icon: n,
                    shortcut: t[2],
                    cmd: t[1]
                })
            }), e.on("mousedown", function() {
                n.hideAll()
            }), e.addButton("styleselect", {
                type: "menubutton",
                text: "Formats",
                menu: c
            }), e.addButton("formatselect", function() {
                var n = [],
                    i = r(e.settings.block_formats || "Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre");
                return s(i, function(t) {
                    n.push({
                        text: t[0],
                        value: t[1],
                        textStyle: function() {
                            return e.formatter.getCssText(t[1])
                        }
                    })
                }), {
                    type: "listbox",
                    text: i[0][0],
                    values: n,
                    fixedWidth: !0,
                    onselect: l,
                    onPostRender: t(n)
                }
            }), e.addButton("fontselect", function() {
                var n = "Andale Mono=andale mono,monospace;Arial=arial,helvetica,sans-serif;Arial Black=arial black,sans-serif;Book Antiqua=book antiqua,palatino,serif;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier,monospace;Georgia=georgia,palatino,serif;Helvetica=helvetica,arial,sans-serif;Impact=impact,sans-serif;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco,monospace;Times New Roman=times new roman,times,serif;Trebuchet MS=trebuchet ms,geneva,sans-serif;Verdana=verdana,geneva,sans-serif;Webdings=webdings;Wingdings=wingdings,zapf dingbats",
                    i = [],
                    o = r(e.settings.font_formats || n);
                return s(o, function(e) {
                    i.push({
                        text: {
                            raw: e[0]
                        },
                        value: e[1],
                        textStyle: -1 == e[1].indexOf("dings") ? "font-family:" + e[1] : ""
                    })
                }), {
                    type: "listbox",
                    text: "Font Family",
                    tooltip: "Font Family",
                    values: i,
                    fixedWidth: !0,
                    onPostRender: t(i, "fontname"),
                    onselect: function(t) {
                        t.control.settings.value && e.execCommand("FontName", !1, t.control.settings.value)
                    }
                }
            }), e.addButton("fontsizeselect", function() {
                var n = [],
                    r = "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
                    i = e.settings.fontsize_formats || r;
                return s(i.split(" "), function(e) {
                    var t = e,
                        r = e,
                        i = e.split("=");
                    i.length > 1 && (t = i[0], r = i[1]), n.push({
                        text: t,
                        value: r
                    })
                }), {
                    type: "listbox",
                    text: "Font Sizes",
                    tooltip: "Font Sizes",
                    values: n,
                    fixedWidth: !0,
                    onPostRender: t(n, "fontsize"),
                    onclick: function(t) {
                        t.control.settings.value && e.execCommand("FontSize", !1, t.control.settings.value)
                    }
                }
            }), e.addMenuItem("formats", {
                text: "Formats",
                menu: c
            })
        }
        var s = r.each;
        i.on("AddEditor", function(t) {
            t.editor.rtl && (e.rtl = !0), a(t.editor)
        }), e.translate = function(e) {
            return i.translate(e)
        }, t.tooltips = !o.iOS
    }), r(nt, [Me], function(e) {
        return e.extend({
            recalc: function(e) {
                var t = e.settings,
                    n, r, i, o, a, s, l, c, u, d, f, h, p, m, g, v, y, b, x, C, w, _, E = [],
                    N = [],
                    S, k, T, R, A, B;
                t = e.settings, i = e.items().filter(":visible"), o = e.layoutRect(), r = t.columns || Math.ceil(Math.sqrt(i.length)), n = Math.ceil(i.length / r), y = t.spacingH || t.spacing || 0, b = t.spacingV || t.spacing || 0, x = t.alignH || t.align, C = t.alignV || t.align, g = e.paddingBox, A = "reverseRows" in t ? t.reverseRows : e.isRtl(), x && "string" == typeof x && (x = [x]), C && "string" == typeof C && (C = [C]);
                for (d = 0; r > d; d++) E.push(0);
                for (f = 0; n > f; f++) N.push(0);
                for (f = 0; n > f; f++)
                    for (d = 0; r > d && (u = i[f * r + d], u); d++) c = u.layoutRect(), S = c.minW, k = c.minH, E[d] = S > E[d] ? S : E[d], N[f] = k > N[f] ? k : N[f];
                for (T = o.innerW - g.left - g.right, w = 0, d = 0; r > d; d++) w += E[d] + (d > 0 ? y : 0), T -= (d > 0 ? y : 0) + E[d];
                for (R = o.innerH - g.top - g.bottom, _ = 0, f = 0; n > f; f++) _ += N[f] + (f > 0 ? b : 0), R -= (f > 0 ? b : 0) + N[f];
                if (w += g.left + g.right, _ += g.top + g.bottom, l = {}, l.minW = w + (o.w - o.innerW), l.minH = _ + (o.h - o.innerH), l.contentW = l.minW - o.deltaW, l.contentH = l.minH - o.deltaH, l.minW = Math.min(l.minW, o.maxW), l.minH = Math.min(l.minH, o.maxH), l.minW = Math.max(l.minW, o.startMinWidth), l.minH = Math.max(l.minH, o.startMinHeight), !o.autoResize || l.minW == o.minW && l.minH == o.minH) {
                    o.autoResize && (l = e.layoutRect(l), l.contentW = l.minW - o.deltaW, l.contentH = l.minH - o.deltaH);
                    var D;
                    D = "start" == t.packV ? 0 : R > 0 ? Math.floor(R / n) : 0;
                    var L = 0,
                        M = t.flexWidths;
                    if (M)
                        for (d = 0; d < M.length; d++) L += M[d];
                    else L = r;
                    var H = T / L;
                    for (d = 0; r > d; d++) E[d] += M ? M[d] * H : H;
                    for (p = g.top, f = 0; n > f; f++) {
                        for (h = g.left, s = N[f] + D, d = 0; r > d && (B = A ? f * r + r - 1 - d : f * r + d, u = i[B], u); d++) m = u.settings, c = u.layoutRect(), a = Math.max(E[d], c.startMinWidth), c.x = h, c.y = p, v = m.alignH || (x ? x[d] || x[0] : null), "center" == v ? c.x = h + a / 2 - c.w / 2 : "right" == v ? c.x = h + a - c.w : "stretch" == v && (c.w = a), v = m.alignV || (C ? C[d] || C[0] : null), "center" == v ? c.y = p + s / 2 - c.h / 2 : "bottom" == v ? c.y = p + s - c.h : "stretch" == v && (c.h = s), u.layoutRect(c), h += a + y, u.recalc && u.recalc();
                        p += s + b
                    }
                } else if (l.w = l.minW, l.h = l.minH, e.layoutRect(l), this.recalc(e), null === e._lastRect) {
                    var P = e.parent();
                    P && (P._lastRect = null, P.recalc())
                }
            }
        })
    }), r(rt, [Pe], function(e) {
        return e.extend({
            renderHtml: function() {
                var e = this;
                return e.classes.add("iframe"), e.canFocus = !1, '<iframe id="' + e._id + '" class="' + e.classes + '" tabindex="-1" src="' + (e.settings.url || "javascript:''") + '" frameborder="0"></iframe>'
            },
            src: function(e) {
                this.getEl().src = e
            },
            html: function(e, t) {
                var n = this,
                    r = this.getEl().contentWindow.document.body;
                return r ? (r.innerHTML = e, t && t()) : setTimeout(function() {
                    n.html(e)
                }, 0), this
            }
        })
    }), r(it, [Pe, X], function(e, t) {
        return e.extend({
            init: function(e) {
                var t = this;
                t._super(e), t.classes.add("widget").add("label"), t.canFocus = !1, e.multiline && t.classes.add("autoscroll"), e.strong && t.classes.add("strong")
            },
            initLayoutRect: function() {
                var e = this,
                    n = e._super();
                if (e.settings.multiline) {
                    var r = t.getSize(e.getEl());
                    r.width > n.maxW && (n.minW = n.maxW, e.classes.add("multiline")), e.getEl().style.width = n.minW + "px", n.startMinH = n.h = n.minH = Math.min(n.maxH, t.getSize(e.getEl()).height)
                }
                return n
            },
            repaint: function() {
                var e = this;
                return e.settings.multiline || (e.getEl().style.lineHeight = e.layoutRect().h + "px"), e._super()
            },
            renderHtml: function() {
                var e = this,
                    t = e.settings.forId;
                return '<label id="' + e._id + '" class="' + e.classes + '"' + (t ? ' for="' + t + '"' : "") + ">" + e.encode(e.state.get("text")) + "</label>"
            },
            bindStates: function() {
                var e = this;
                return e.state.on("change:text", function(t) {
                    e.innerHtml(e.encode(t.value))
                }), e._super()
            }
        })
    }), r(ot, [re], function(e) {
        return e.extend({
            Defaults: {
                role: "toolbar",
                layout: "flow"
            },
            init: function(e) {
                var t = this;
                t._super(e), t.classes.add("toolbar")
            },
            postRender: function() {
                var e = this;
                return e.items().each(function(e) {
                    e.classes.add("toolbar-item")
                }), e._super()
            }
        })
    }), r(at, [ot], function(e) {
        return e.extend({
            Defaults: {
                role: "menubar",
                containerCls: "menubar",
                ariaRoot: !0,
                defaults: {
                    type: "menubutton"
                }
            }
        })
    }), r(st, [Oe, te, at], function(e, t, n) {
        function r(e, t) {
            for (; e;) {
                if (t === e) return !0;
                e = e.parentNode
            }
            return !1
        }
        var i = e.extend({
            init: function(e) {
                var t = this;
                t._renderOpen = !0, t._super(e), e = t.settings, t.classes.add("menubtn"), e.fixedWidth && t.classes.add("fixed-width"), t.aria("haspopup", !0), t.state.set("menu", e.menu || t.render())
            },
            showMenu: function() {
                var e = this,
                    n;
                return e.menu && e.menu.visible() ? e.hideMenu() : (e.menu || (n = e.state.get("menu") || [], n.length ? n = {
                    type: "menu",
                    items: n
                } : n.type = n.type || "menu", n.renderTo ? e.menu = n.parent(e).show().renderTo() : e.menu = t.create(n).parent(e).renderTo(), e.fire("createmenu"), e.menu.reflow(), e.menu.on("cancel", function(t) {
                    t.control.parent() === e.menu && (t.stopPropagation(), e.focus(), e.hideMenu())
                }), e.menu.on("select", function() {
                    e.focus()
                }), e.menu.on("show hide", function(t) {
                    t.control == e.menu && e.activeMenu("show" == t.type), e.aria("expanded", "show" == t.type)
                }).fire("show")), e.menu.show(), e.menu.layoutRect({
                    w: e.layoutRect().w
                }), void e.menu.moveRel(e.getEl(), e.isRtl() ? ["br-tr", "tr-br"] : ["bl-tl", "tl-bl"]))
            },
            hideMenu: function() {
                var e = this;
                e.menu && (e.menu.items().each(function(e) {
                    e.hideMenu && e.hideMenu()
                }), e.menu.hide())
            },
            activeMenu: function(e) {
                this.classes.toggle("active", e)
            },
            renderHtml: function() {
                var e = this,
                    t = e._id,
                    r = e.classPrefix,
                    i = e.settings.icon,
                    o, a = e.state.get("text");
                return o = e.settings.image, o ? (i = "none", "string" != typeof o && (o = window.getSelection ? o[0] : o[1]), o = " style=\"background-image: url('" + o + "')\"") : o = "", i = e.settings.icon ? r + "ico " + r + "i-" + i : "", e.aria("role", e.parent() instanceof n ? "menuitem" : "button"), '<div id="' + t + '" class="' + e.classes + '" tabindex="-1" aria-labelledby="' + t + '"><button id="' + t + '-open" role="presentation" type="button" tabindex="-1">' + (i ? '<i class="' + i + '"' + o + "></i>" : "") + (a ? (i ? "\xa0" : "") + e.encode(a) : "") + ' <i class="' + r + 'caret"></i></button></div>'
            },
            postRender: function() {
                var e = this;
                return e.on("click", function(t) {
                    t.control === e && r(t.target, e.getEl()) && (e.showMenu(), t.aria && e.menu.items()[0].focus())
                }), e.on("mouseenter", function(t) {
                    var n = t.control,
                        r = e.parent(),
                        o;
                    n && r && n instanceof i && n.parent() == r && (r.items().filter("MenuButton").each(function(e) {
                        e.hideMenu && e != n && (e.menu && e.menu.visible() && (o = !0), e.hideMenu())
                    }), o && (n.focus(), n.showMenu()))
                }), e._super()
            },
            bindStates: function() {
                var e = this;
                return e.state.on("change:menu", function() {
                    e.menu && e.menu.remove(), e.menu = null
                }), e._super()
            },
            remove: function() {
                this._super(), this.menu && this.menu.remove()
            }
        });
        return i
    }), r(lt, [Pe, te, u], function(e, t, n) {
        return e.extend({
            Defaults: {
                border: 0,
                role: "menuitem"
            },
            init: function(e) {
                var t = this,
                    n;
                t._super(e), e = t.settings, t.classes.add("menu-item"), e.menu && t.classes.add("menu-item-expand"), e.preview && t.classes.add("menu-item-preview"), n = t.state.get("text"), ("-" === n || "|" === n) && (t.classes.add("menu-item-sep"), t.aria("role", "separator"), t.state.set("text", "-")), e.selectable && (t.aria("role", "menuitemcheckbox"), t.classes.add("menu-item-checkbox"), e.icon = "selected"), e.preview || e.selectable || t.classes.add("menu-item-normal"), t.on("mousedown", function(e) {
                    e.preventDefault()
                }), e.menu && !e.ariaHideMenu && t.aria("haspopup", !0)
            },
            hasMenus: function() {
                return !!this.settings.menu
            },
            showMenu: function() {
                var e = this,
                    n = e.settings,
                    r, i = e.parent();
                if (i.items().each(function(t) {
                        t !== e && t.hideMenu()
                    }), n.menu) {
                    r = e.menu, r ? r.show() : (r = n.menu, r.length ? r = {
                        type: "menu",
                        items: r
                    } : r.type = r.type || "menu", i.settings.itemDefaults && (r.itemDefaults = i.settings.itemDefaults), r = e.menu = t.create(r).parent(e).renderTo(), r.reflow(), r.on("cancel", function(t) {
                        t.stopPropagation(), e.focus(), r.hide()
                    }), r.on("show hide", function(e) {
                        e.control.items().each(function(e) {
                            e.active(e.settings.selected)
                        })
                    }).fire("show"), r.on("hide", function(t) {
                        t.control === r && e.classes.remove("selected")
                    }), r.submenu = !0), r._parentMenu = i, r.classes.add("menu-sub");
                    var o = r.testMoveRel(e.getEl(), e.isRtl() ? ["tl-tr", "bl-br", "tr-tl", "br-bl"] : ["tr-tl", "br-bl", "tl-tr", "bl-br"]);
                    r.moveRel(e.getEl(), o), r.rel = o, o = "menu-sub-" + o, r.classes.remove(r._lastRel).add(o), r._lastRel = o, e.classes.add("selected"), e.aria("expanded", !0)
                }
            },
            hideMenu: function() {
                var e = this;
                return e.menu && (e.menu.items().each(function(e) {
                    e.hideMenu && e.hideMenu()
                }), e.menu.hide(), e.aria("expanded", !1)), e
            },
            renderHtml: function() {
                function e(e) {
                    var t, r, i = {};
                    for (i = n.mac ? {
                        alt: "&#x2325;",
                        ctrl: "&#x2318;",
                        shift: "&#x21E7;",
                        meta: "&#x2318;"
                    } : {
                        meta: "Ctrl"
                    }, e = e.split("+"), t = 0; t < e.length; t++) r = i[e[t].toLowerCase()], r && (e[t] = r);
                    return e.join("+")
                }
                var t = this,
                    r = t._id,
                    i = t.settings,
                    o = t.classPrefix,
                    a = t.encode(t.state.get("text")),
                    s = t.settings.icon,
                    l = "",
                    c = i.shortcut;
                return s && t.parent().classes.add("menu-has-icons"), i.image && (s = "none", l = " style=\"background-image: url('" + i.image + "')\""), c && (c = e(c)), s = o + "ico " + o + "i-" + (t.settings.icon || "none"), '<div id="' + r + '" class="' + t.classes + '" tabindex="-1">' + ("-" !== a ? '<i class="' + s + '"' + l + "></i>\xa0" : "") + ("-" !== a ? '<span id="' + r + '-text" class="' + o + 'text">' + a + "</span>" : "") + (c ? '<div id="' + r + '-shortcut" class="' + o + 'menu-shortcut">' + c + "</div>" : "") + (i.menu ? '<div class="' + o + 'caret"></div>' : "") + "</div>"
            },
            postRender: function() {
                var e = this,
                    t = e.settings,
                    n = t.textStyle;
                if ("function" == typeof n && (n = n.call(this)), n) {
                    var r = e.getEl("text");
                    r && r.setAttribute("style", n)
                }
                return e.on("mouseenter click", function(n) {
                    n.control === e && (t.menu || "click" !== n.type ? (e.showMenu(), n.aria && e.menu.focus(!0)) : (e.fire("select"), e.parent().hideAll()))
                }), e._super(), e
            },
            active: function(e) {
                return "undefined" != typeof e && this.aria("checked", e), this._super(e)
            },
            remove: function() {
                this._super(), this.menu && this.menu.remove()
            }
        })
    }), r(ct, [ce, lt, d], function(e, t, n) {
        var r = e.extend({
            Defaults: {
                defaultType: "menuitem",
                border: 1,
                layout: "stack",
                role: "application",
                bodyRole: "menu",
                ariaRoot: !0
            },
            init: function(e) {
                var t = this;
                if (e.autohide = !0, e.constrainToViewport = !0, e.itemDefaults)
                    for (var r = e.items, i = r.length; i--;) r[i] = n.extend({}, e.itemDefaults, r[i]);
                t._super(e), t.classes.add("menu")
            },
            repaint: function() {
                return this.classes.toggle("menu-align", !0), this._super(), this.getEl().style.height = "", this.getEl("body").style.height = "", this
            },
            cancel: function() {
                var e = this;
                e.hideAll(), e.fire("select")
            },
            hideAll: function() {
                var e = this;
                return this.find("menuitem").exec("hideMenu"), e._super()
            },
            preRender: function() {
                var e = this;
                return e.items().each(function(t) {
                    var n = t.settings;
                    return n.icon || n.selectable ? (e._hasIcons = !0, !1) : void 0
                }), e._super()
            }
        });
        return r
    }), r(ut, [st, ct], function(e, t) {
        return e.extend({
            init: function(e) {
                function t(r) {
                    for (var a = 0; a < r.length; a++) {
                        if (i = r[a].selected || e.value === r[a].value) return o = o || r[a].text, n.state.set("value", r[a].value), !0;
                        if (r[a].menu && t(r[a].menu)) return !0
                    }
                }
                var n = this,
                    r, i, o, a;
                n._super(e), e = n.settings, n._values = r = e.values, r && ("undefined" != typeof e.value && t(r), !i && r.length > 0 && (o = r[0].text, n.state.set("value", r[0].value)), n.state.set("menu", r)), n.state.set("text", e.text || o || r[0].text), n.classes.add("listbox"), n.on("select", function(t) {
                    var r = t.control;
                    a && (t.lastControl = a), e.multiple ? r.active(!r.active()) : n.value(t.control.value()), a = r
                })
            },
            bindStates: function() {
                function e(e, n) {
                    e instanceof t && e.items().each(function(e) {
                        e.hasMenus() || e.active(e.value() === n)
                    })
                }

                function n(e, t) {
                    var r;
                    if (e)
                        for (var i = 0; i < e.length; i++) {
                            if (e[i].value === t) return e[i];
                            if (e[i].menu && (r = n(e[i].menu, t))) return r
                        }
                }
                var r = this;
                return r.on("show", function(t) {
                    e(t.control, r.value())
                }), r.state.on("change:value", function(e) {
                    var t = n(r.state.get("menu"), e.value);
                    r.text(t ? t.text : r.settings.text)
                }), r._super()
            }
        })
    }), r(dt, [Fe], function(e) {
        return e.extend({
            Defaults: {
                classes: "radio",
                role: "radio"
            }
        })
    }), r(ft, [], function() {
        function e(e, t, n) {
            var r, i, o, a, l, c;
            return r = t.x, i = t.y, o = e.w, a = e.h, l = t.w, c = t.h, n = (n || "").split(""), "b" === n[0] && (i += c), "r" === n[1] && (r += l), "c" === n[0] && (i += s(c / 2)), "c" === n[1] && (r += s(l / 2)), "b" === n[3] && (i -= a), "r" === n[4] && (r -= o), "c" === n[3] && (i -= s(a / 2)), "c" === n[4] && (r -= s(o / 2)), {
                x: r,
                y: i,
                w: o,
                h: a
            }
        }

        function t(t, n, r, i) {
            var o, a;
            for (a = 0; a < i.length; a++)
                if (o = e(t, n, i[a]), o.x >= r.x && o.x + o.w <= r.w + r.x && o.y >= r.y && o.y + o.h <= r.h + r.y) return i[a]
        }

        function n(e, t, n) {
            return {
                x: e.x - t,
                y: e.y - n,
                w: e.w + 2 * t,
                h: e.h + 2 * n
            }
        }

        function r(e, t) {
            var n, r, i, s;
            return n = a(e.x, t.x), r = a(e.y, t.y), i = o(e.x + e.w, t.x + t.w), s = o(e.y + e.h, t.y + t.h), 0 > i - n || 0 > s - r ? null : {
                x: n,
                y: r,
                w: i - n,
                h: s - r
            }
        }

        function i(e, t, n) {
            var r, i, o, s, l, c, u, d, f, h;
            return l = e.x, c = e.y, u = e.x + e.w, d = e.y + e.h, f = t.x + t.w, h = t.y + t.h, r = a(0, t.x - l), i = a(0, t.y - c), o = a(0, u - f), s = a(0, d - h), l += r, c += i, n && (u += r, d += i, l -= o, c -= s), u -= o, d -= s, {
                x: l,
                y: c,
                w: u - l,
                h: d - c
            }
        }
        var o = Math.min,
            a = Math.max,
            s = Math.round;
        return {
            inflate: n,
            relativePosition: e,
            findBestRelativePosition: t,
            intersect: r,
            clamp: i
        }
    }), r(ht, [Pe, ie], function(e, t) {
        return e.extend({
            renderHtml: function() {
                var e = this,
                    t = e.classPrefix;
                return e.classes.add("resizehandle"), "both" == e.settings.direction && e.classes.add("resizehandle-both"), e.canFocus = !1, '<div id="' + e._id + '" class="' + e.classes + '"><i class="' + t + "ico " + t + 'i-resize"></i></div>'
            },
            postRender: function() {
                var e = this;
                e._super(), e.resizeDragHelper = new t(this._id, {
                    start: function() {
                        e.fire("ResizeStart")
                    },
                    drag: function(t) {
                        "both" != e.settings.direction && (t.deltaX = 0), e.fire("Resize", t)
                    },
                    stop: function() {
                        e.fire("ResizeEnd")
                    }
                })
            },
            remove: function() {
                return this.resizeDragHelper && this.resizeDragHelper.destroy(), this._super()
            }
        })
    }), r(pt, [Pe, ie, X], function(e, t, n) {
        function r(e, t, n) {
            return t > e && (e = t), e > n && (e = n), e
        }

        function i(e, t) {
            var r, i, o, a, s;
            "v" == e.settings.orientation ? (a = "top", o = "height", i = "h") : (a = "left", o = "width", i = "w"), r = (e.layoutRect()[i] || 100) - n.getSize(e.getEl("handle"))[o], s = r * ((t - e._minValue) / (e._maxValue - e._minValue)) + "px", e.getEl("handle").style[a] = s, e.getEl("handle").style.height = e.layoutRect().h + "px"
        }
        return e.extend({
            init: function(e) {
                var t = this;
                e.previewFilter || (e.previewFilter = function(e) {
                    return Math.round(100 * e) / 100
                }), t._super(e), t.classes.add("slider"), "v" == e.orientation && t.classes.add("vertical"), t._minValue = e.minValue || 0, t._maxValue = e.maxValue || 100, t._initValue = t.state.get("value")
            },
            renderHtml: function() {
                var e = this,
                    t = e._id,
                    n = e.classPrefix;
                return '<div id="' + t + '" class="' + e.classes + '"><div id="' + t + '-handle" class="' + n + 'slider-handle"></div></div>'
            },
            reset: function() {
                this.value(this._initValue).repaint()
            },
            postRender: function() {
                var e = this,
                    i, o, a = 0,
                    s, l, c, u, d, f, h, p;
                l = e._minValue, c = e._maxValue, s = e.value(), "v" == e.settings.orientation ? (d = "screenY", f = "top", h = "height", p = "h") : (d = "screenX", f = "left", h = "width", p = "w"), e._super(), e._dragHelper = new t(e._id, {
                    handle: e._id + "-handle",
                    start: function(t) {
                        i = t[d], o = parseInt(e.getEl("handle").style[f], 10), u = (e.layoutRect()[p] || 100) - n.getSize(e.getEl("handle"))[h], e.fire("dragstart", {
                            value: s
                        })
                    },
                    drag: function(t) {
                        var n = t[d] - i,
                            h = e.getEl("handle");
                        a = r(o + n, 0, u), h.style[f] = a + "px", s = l + a / u * (c - l), e.value(s), e.tooltip().text("" + e.settings.previewFilter(s)).show().moveRel(h, "bc tc"), e.fire("drag", {
                            value: s
                        })
                    },
                    stop: function() {
                        e.tooltip().hide(), e.fire("dragend", {
                            value: s
                        })
                    }
                })
            },
            repaint: function() {
                this._super(), i(this, this.value())
            },
            bindStates: function() {
                var e = this;
                return e.state.on("change:value", function(t) {
                    i(e, t.value)
                }), e._super()
            }
        })
    }), r(mt, [Pe], function(e) {
        return e.extend({
            renderHtml: function() {
                var e = this;
                return e.classes.add("spacer"), e.canFocus = !1, '<div id="' + e._id + '" class="' + e.classes + '"></div>'
            }
        })
    }), r(gt, [st, X, f], function(e, t, n) {
        return e.extend({
            Defaults: {
                classes: "widget btn splitbtn",
                role: "button"
            },
            repaint: function() {
                var e = this,
                    r = e.getEl(),
                    i = e.layoutRect(),
                    o, a;
                return e._super(), o = r.firstChild, a = r.lastChild, n(o).css({
                    width: i.w - t.getSize(a).width,
                    height: i.h - 2
                }), n(a).css({
                    height: i.h - 2
                }), e
            },
            activeMenu: function(e) {
                var t = this;
                n(t.getEl().lastChild).toggleClass(t.classPrefix + "active", e)
            },
            renderHtml: function() {
                var e = this,
                    t = e._id,
                    n = e.classPrefix,
                    r, i = e.state.get("icon"),
                    o = e.state.get("text");
                return r = e.settings.image, r ? (i = "none", "string" != typeof r && (r = window.getSelection ? r[0] : r[1]), r = " style=\"background-image: url('" + r + "')\"") : r = "", i = e.settings.icon ? n + "ico " + n + "i-" + i : "", '<div id="' + t + '" class="' + e.classes + '" role="button" tabindex="-1"><button type="button" hidefocus="1" tabindex="-1">' + (i ? '<i class="' + i + '"' + r + "></i>" : "") + (o ? (i ? " " : "") + o : "") + '</button><button type="button" class="' + n + 'open" hidefocus="1" tabindex="-1">' + (e._menuBtnText ? (i ? "\xa0" : "") + e._menuBtnText : "") + ' <i class="' + n + 'caret"></i></button></div>'
            },
            postRender: function() {
                var e = this,
                    t = e.settings.onclick;
                return e.on("click", function(e) {
                    var n = e.target;
                    if (e.control == this)
                        for (; n;) {
                            if (e.aria && "down" != e.aria.key || "BUTTON" == n.nodeName && -1 == n.className.indexOf("open")) return e.stopImmediatePropagation(), void(t && t.call(this, e));
                            n = n.parentNode
                        }
                }), delete e.settings.onclick, e._super()
            }
        })
    }), r(vt, [et], function(e) {
        return e.extend({
            Defaults: {
                containerClass: "stack-layout",
                controlClass: "stack-layout-item",
                endClass: "break"
            },
            isNative: function() {
                return !0
            }
        })
    }), r(yt, [ae, f, X], function(e, t, n) {
        return e.extend({
            Defaults: {
                layout: "absolute",
                defaults: {
                    type: "panel"
                }
            },
            activateTab: function(e) {
                var n;
                this.activeTabId && (n = this.getEl(this.activeTabId), t(n).removeClass(this.classPrefix + "active"), n.setAttribute("aria-selected", "false")), this.activeTabId = "t" + e, n = this.getEl("t" + e), n.setAttribute("aria-selected", "true"), t(n).addClass(this.classPrefix + "active"), this.items()[e].show().fire("showtab"), this.reflow(), this.items().each(function(t, n) {
                    e != n && t.hide()
                })
            },
            renderHtml: function() {
                var e = this,
                    t = e._layout,
                    n = "",
                    r = e.classPrefix;
                return e.preRender(), t.preRender(e), e.items().each(function(t, i) {
                    var o = e._id + "-t" + i;
                    t.aria("role", "tabpanel"), t.aria("labelledby", o), n += '<div id="' + o + '" class="' + r + 'tab" unselectable="on" role="tab" aria-controls="' + t._id + '" aria-selected="false" tabIndex="-1">' + e.encode(t.settings.title) + "</div>"
                }), '<div id="' + e._id + '" class="' + e.classes + '" hidefocus="1" tabindex="-1"><div id="' + e._id + '-head" class="' + r + 'tabs" role="tablist">' + n + '</div><div id="' + e._id + '-body" class="' + e.bodyClasses + '">' + t.renderHtml(e) + "</div></div>"
            },
            postRender: function() {
                var e = this;
                e._super(), e.settings.activeTab = e.settings.activeTab || 0, e.activateTab(e.settings.activeTab), this.on("click", function(t) {
                    var n = t.target.parentNode;
                    if (t.target.parentNode.id == e._id + "-head")
                        for (var r = n.childNodes.length; r--;) n.childNodes[r] == t.target && e.activateTab(r)
                })
            },
            initLayoutRect: function() {
                var e = this,
                    t, r, i;
                r = n.getSize(e.getEl("head")).width, r = 0 > r ? 0 : r, i = 0, e.items().each(function(e) {
                    r = Math.max(r, e.layoutRect().minW), i = Math.max(i, e.layoutRect().minH)
                }), e.items().each(function(e) {
                    e.settings.x = 0, e.settings.y = 0, e.settings.w = r, e.settings.h = i, e.layoutRect({
                        x: 0,
                        y: 0,
                        w: r,
                        h: i
                    })
                });
                var o = n.getSize(e.getEl("head")).height;
                return e.settings.minWidth = r, e.settings.minHeight = i + o, t = e._super(), t.deltaH += o, t.innerH = t.h - t.deltaH, t
            }
        })
    }), r(bt, [Pe], function(e) {
        return e.extend({
            init: function(e) {
                var t = this;
                t._super(e), t.classes.add("textbox"), e.multiline ? t.classes.add("multiline") : (t.on("keydown", function(e) {
                    var n;
                    13 == e.keyCode && (e.preventDefault(), t.parents().reverse().each(function(e) {
                        return e.toJSON ? (n = e, !1) : void 0
                    }), t.fire("submit", {
                        data: n.toJSON()
                    }))
                }), t.on("keyup", function(e) {
                    t.state.set("value", e.target.value)
                }))
            },
            repaint: function() {
                var e = this,
                    t, n, r, i = 0,
                    o = 0,
                    a;
                t = e.getEl().style, n = e._layoutRect, a = e._lastRepaintRect || {};
                var s = document;
                return !e.settings.multiline && s.all && (!s.documentMode || s.documentMode <= 8) && (t.lineHeight = n.h - o + "px"), r = e.borderBox, i = r.left + r.right + 8, o = r.top + r.bottom + (e.settings.multiline ? 8 : 0), n.x !== a.x && (t.left = n.x + "px", a.x = n.x), n.y !== a.y && (t.top = n.y + "px", a.y = n.y), n.w !== a.w && (t.width = n.w - i + "px", a.w = n.w), n.h !== a.h && (t.height = n.h - o + "px", a.h = n.h), e._lastRepaintRect = a, e.fire("repaint", {}, !1), e
            },
            renderHtml: function() {
                var e = this,
                    t = e._id,
                    n = e.settings,
                    r = e.encode(e.state.get("value"), !1),
                    i = "";
                return "spellcheck" in n && (i += ' spellcheck="' + n.spellcheck + '"'), n.maxLength && (i += ' maxlength="' + n.maxLength + '"'), n.size && (i += ' size="' + n.size + '"'), n.subtype && (i += ' type="' + n.subtype + '"'), e.disabled() && (i += ' disabled="disabled"'), n.multiline ? '<textarea id="' + t + '" class="' + e.classes + '" ' + (n.rows ? ' rows="' + n.rows + '"' : "") + ' hidefocus="1"' + i + ">" + r + "</textarea>" : '<input id="' + t + '" class="' + e.classes + '" value="' + r + '" hidefocus="1"' + i + " />"
            },
            value: function(e) {
                return arguments.length ? (this.state.set("value", e), this) : (this.state.get("rendered") && this.state.set("value", this.getEl().value), this.state.get("value"))
            },
            postRender: function() {
                var e = this;
                e._super(), e.$el.on("change", function(t) {
                    e.state.set("value", t.target.value), e.fire("change", t)
                })
            },
            bindStates: function() {
                var e = this;
                return e.state.on("change:value", function(t) {
                    e.getEl().value = t.value
                }), e.state.on("change:disabled", function(t) {
                    e.getEl().disabled = t.value
                }), e._super()
            },
            remove: function() {
                this.$el.off(), this._super()
            }
        })
    }), r(xt, [f, ee], function(e, t) {
        return function(n, r) {
            var i = this,
                o, a = t.classPrefix;
            i.show = function(t, s) {
                return i.hide(), o = !0, window.setTimeout(function() {
                    o && (e(n).append('<div class="' + a + "throbber" + (r ? " " + a + "throbber-inline" : "") + '"></div>'), s && s())
                }, t || 0), i
            }, i.hide = function() {
                var e = n.lastChild;
                return e && -1 != e.className.indexOf("throbber") && e.parentNode.removeChild(e), o = !1, i
            }
        }
    }), a([l, c, u, d, f, h, p, m, g, y, b, x, C, _, E, N, S, k, T, R, A, B, D, L, M, H, O, I, F, z, W, V, U, $, q, j, K, Y, G, X, J, Q, Z, ee, te, ne, re, ie, oe, ae, se, le, ce, ue, de, fe, he, pe, me, ge, ye, we, _e, Ee, Ne, Se, ke, Te, Re, Ae, Be, De, Le, Me, He, Pe, Oe, Ie, Fe, ze, We, Ve, Ue, $e, qe, je, Ke, Ye, Ge, Xe, Je, Qe, Ze, et, tt, nt, rt, it, ot, at, st, lt, ct, ut, dt, ft, ht, pt, mt, gt, vt, yt, bt, xt])
}(this);