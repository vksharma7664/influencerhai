

! function(e, t) { "object" == typeof exports && "undefined" != typeof module ? t(exports) : "function" == typeof define && define.amd ? define(["exports"], t) : t((e = e || self).window = e.window || {}) }(this, function(e) {
    "use strict";

    function H(e) { return e }

    function I() { return "undefined" != typeof window }

    function J() { return Me || I() && (Me = window.gsap) && Me.registerPlugin && Me }

    function K(e) { return !!~i.indexOf(e) }

    function L(e, t) { return ~Fe.indexOf(e) && Fe[Fe.indexOf(e) + 1][t] }

    function M(t, e) {
        var r = e.s,
            n = e.sc,
            o = h.indexOf(t),
            i = n === rt.sc ? 1 : 2;
        return ~o || (o = h.push(t) - 1), h[o + i] || (h[o + i] = L(t, r) || (K(t) ? n : function(e) { return arguments.length ? t[r] = e : t[r] }))
    }

    function N(e) { return L(e, "getBoundingClientRect") || (K(e) ? function() { return ut.width = ke.innerWidth, ut.height = ke.innerHeight, ut } : function() { return nt(e) }) }

    function Q(e, t) {
        var r = t.s,
            n = t.d2,
            o = t.d,
            i = t.a;
        return (r = "scroll" + n) && (i = L(e, r)) ? i() - N(e)()[o] : K(e) ? Math.max(_e[r], Oe[r]) - (ke["inner" + n] || _e["client" + n] || Oe["client" + n]) : e[r] - e["offset" + n]
    }

    function R(e, t) { for (var r = 0; r < p.length; r += 3) t && !~t.indexOf(p[r + 1]) || e(p[r], p[r + 1], p[r + 2]) }

    function S(e) { return "string" == typeof e }

    function T(e) { return "function" == typeof e }

    function U(e) { return "number" == typeof e }

    function V(e) { return "object" == typeof e }

    function W(e) { return T(e) && e() }

    function X(r, n) {
        return function() {
            var e = W(r),
                t = W(n);
            return function() { W(e), W(t) }
        }
    }

    function qa(e) { return ke.getComputedStyle(e) }

    function sa(e, t) { for (var r in t) r in e || (e[r] = t[r]); return e }

    function ua(e, t) { var r = t.d2; return e["offset" + r] || e["client" + r] || 0 }

    function wa(t, r, e, n) { return e.split(",").forEach(function(e) { return t(r, e, n) }) }

    function xa(e, t, r) { return e.addEventListener(t, r, { passive: !0 }) }

    function ya(e, t, r) { return e.removeEventListener(t, r) }

    function Ca(e, t) {
        if (S(e)) {
            var r = e.indexOf("="),
                n = ~r ? (e.charAt(r - 1) + 1) * parseFloat(e.substr(r + 1)) : 0;
            n && (e.indexOf("%") > r && (n *= t / 100), e = e.substr(0, r - 1)), e = n + (e in m ? m[e] * t : ~e.indexOf("%") ? parseFloat(e) * t / 100 : parseFloat(e) || 0)
        }
        return e
    }

    function Da(e, t, r, n, o, i, a) {
        var s = o.startColor,
            l = o.endColor,
            c = o.fontSize,
            u = o.indent,
            f = o.fontWeight,
            d = Pe.createElement("div"),
            p = K(r) || "fixed" === L(r, "pinType"),
            g = -1 !== e.indexOf("scroller"),
            h = p ? Oe : r,
            v = -1 !== e.indexOf("start"),
            b = v ? s : l,
            m = "border-color:" + b + ";font-size:" + c + ";color:" + b + ";font-weight:" + f + ";pointer-events:none;white-space:nowrap;font-family:sans-serif,Arial;z-index:1000;padding:4px 8px;border-width:0;border-style:solid;";
        return m += "position:" + (g && p ? "fixed;" : "absolute;"), !g && p || (m += (n === rt ? x : y) + ":" + (i + parseFloat(u)) + "px;"), a && (m += "box-sizing:border-box;text-align:left;width:" + a.offsetWidth + "px;"), d._isStart = v, d.setAttribute("class", "gsap-marker-" + e), d.style.cssText = m, d.innerText = t || 0 === t ? e + "-" + t : e, h.insertBefore(d, h.children[0]), d._offset = d["offset" + n.op.d2], w(d, 0, n, v), d
    }

    function Ha() { return l = l || s(B) }

    function Ia() { l || (l = s(B), De || _("scrollStart"), De = He()) }

    function Ja() { return !Re && a.restart(!0) }

    function Pa(e) {
        var t, r = Me.ticker.frame,
            n = [],
            o = 0;
        if (g !== r || Be) {
            for (A(); o < P.length; o += 4)(t = ke.matchMedia(P[o]).matches) !== P[o + 3] && ((P[o + 3] = t) ? n.push(o) : A(1, P[o]) || T(P[o + 2]) && P[o + 2]());
            for (E(), o = 0; o < n.length; o++) t = n[o], We = P[t], P[t + 2] = P[t + 1](e);
            z(We = 0, 1), g = r, _("matchMedia")
        }
    }

    function Qa() { return ya(Z, "scrollEnd", Qa) || z(!0) }

    function ab(e, t, r, n) {
        if (e.parentNode !== t) {
            for (var o, i = F.length, a = t.style, s = e.style; i--;) a[o = F[i]] = r[o];
            a.position = "absolute" === r.position ? "absolute" : "relative", "inline" === r.display && (a.display = "inline-block"), s[y] = s[x] = "auto", a.overflow = "visible", a.boxSizing = "border-box", a[Ke] = ua(e, tt) + et, a[je] = ua(e, rt) + et, a[Ze] = s[$e] = s.top = s[b] = "0", ct(n), s[Ke] = s.maxWidth = r[Ke], s[je] = s.maxHeight = r[je], s[Ze] = r[Ze], e.parentNode.insertBefore(t, e), t.appendChild(e)
        }
    }

    function db(e) { for (var t = D.length, r = e.style, n = [], o = 0; o < t; o++) n.push(D[o], r[D[o]]); return n.t = e, n }

    function gb(e, t, r, n, o, i, a, s, l, c, u, f) {
        if (T(e) && (e = e(s)), S(e) && "max" === e.substr(0, 3) && (e = f + ("=" === e.charAt(4) ? Ca("0" + e.substr(3), r) : 0)), U(e)) a && w(a, r, n, !0);
        else {
            T(t) && (t = t(s));
            var d, p, g, h = Ee(t)[0] || Oe,
                v = nt(h) || {},
                b = e.split(" ");
            v && (v.left || v.top) || "none" !== qa(h).display || (g = h.style.display, h.style.display = "block", v = nt(h), g ? h.style.display = g : h.style.removeProperty("display")), d = Ca(b[0], v[n.d]), p = Ca(b[1] || "0", r), e = v[n.p] - l[n.p] - c + d + o - p, a && w(a, p, n, r - p < 20 || a._isStart && 20 < p), r -= r - p
        }
        if (i) {
            var m = e + r,
                x = i._isStart;
            f = "scroll" + n.d2, w(i, m, n, x && 20 < m || !x && (u ? Math.max(Oe[f], _e[f]) : i.parentNode[f]) <= m + 1), u && (l = nt(a), u && (i.style[n.op.p] = l[n.op.p] - n.op.m - i._offset + et))
        }
        return Math.round(e)
    }

    function ib(e, t, r, n) {
        if (e.parentNode !== t) {
            var o, i, a = e.style;
            if (t === Oe) {
                for (o in e._stOrig = a.cssText, i = qa(e)) + o || Y.test(o) || !i[o] || "string" != typeof a[o] || "0" === o || (a[o] = i[o]);
                a.top = r, a.left = n
            } else a.cssText = e._stOrig;
            Me.core.getCache(e).uncache = 1, t.appendChild(e)
        }
    }

    function jb(l, e) {
        var c, u, f = M(l, e),
            d = "_scroll" + e.p2;
        return l[d] = f,
            function getTween(e, t, r, n, o) {
                var i = getTween.tween,
                    a = t.onComplete,
                    s = {};
                return i && i.kill(), c = Math.round(r), t[d] = e, (t.modifiers = s)[d] = function(e) { return (e = Math.round(f())) !== c && e !== u ? (i.kill(), getTween.tween = 0) : e = r + n * i.ratio + o * i.ratio * i.ratio, u = c, c = Math.round(e) }, t.onComplete = function() { getTween.tween = 0, a && a.call(i) }, i = getTween.tween = Me.to(l, t)
            }
    }
    var Me, o, ke, Pe, _e, Oe, i, a, s, l, Ee, Le, Ie, c, Re, Ae, u, ze, f, d, p, Ne, qe, We, g, Be = 1,
        Fe = [],
        h = [],
        He = Date.now,
        v = He(),
        De = 0,
        Je = 1,
        Qe = Math.abs,
        t = "scrollLeft",
        r = "scrollTop",
        b = "left",
        x = "right",
        y = "bottom",
        Ke = "width",
        je = "height",
        Ve = "Right",
        Xe = "Left",
        Ue = "Top",
        Ye = "Bottom",
        Ze = "padding",
        $e = "margin",
        Ge = "Width",
        n = "Height",
        et = "px",
        tt = { s: t, p: b, p2: Xe, os: x, os2: Ve, d: Ke, d2: Ge, a: "x", sc: function sc(e) { return arguments.length ? ke.scrollTo(e, rt.sc()) : ke.pageXOffset || Pe[t] || _e[t] || Oe[t] || 0 } },
        rt = { s: r, p: "top", p2: Ue, os: y, os2: Ye, d: je, d2: n, a: "y", op: tt, sc: function sc(e) { return arguments.length ? ke.scrollTo(tt.sc(), e) : ke.pageYOffset || Pe[r] || _e[r] || Oe[r] || 0 } },
        nt = function _getBounds(e, t) {
            var r = t && "matrix(1, 0, 0, 1, 0, 0)" !== qa(e)[u] && Me.to(e, { x: 0, y: 0, xPercent: 0, yPercent: 0, rotation: 0, rotationX: 0, rotationY: 0, scale: 1, skewX: 0, skewY: 0 }).progress(1),
                n = e.getBoundingClientRect();
            return r && r.progress(0).kill(), n
        },
        ot = { startColor: "green", endColor: "red", indent: 0, fontSize: "16px", fontWeight: "normal" },
        it = { toggleActions: "play", anticipatePin: 0 },
        m = { top: 0, left: 0, center: .5, bottom: 1, right: 1 },
        w = function _positionMarker(e, t, r, n) {
            var o = { display: "block" },
                i = r[n ? "os2" : "p2"],
                a = r[n ? "p2" : "os2"];
            e._isFlipped = n, o[r.a + "Percent"] = n ? -100 : 0, o[r.a] = n ? 1 : 0, o["border" + i + Ge] = 1, o["border" + a + Ge] = 0, o[r.p] = t, Me.set(e, o)
        },
        at = [],
        st = {},
        C = {},
        k = [],
        P = [],
        _ = function _dispatch(e) { return C[e] && C[e].map(function(e) { return e() }) || k },
        O = [],
        E = function _revertRecorded(e) { for (var t = 0; t < O.length; t += 4) e && O[t + 3] !== e || (O[t].style.cssText = O[t + 1], O[t + 2].uncache = 1) },
        A = function _revertAll(e, t) {
            var r;
            for (ze = 0; ze < at.length; ze++) r = at[ze], t && r.media !== t || (e ? r.kill(1) : (r.scroll.rec || (r.scroll.rec = r.scroll()), r.revert()));
            E(t), t || _("revert")
        },
        z = function _refreshAll(e, t) {
            if (!De || e) {
                var r = _("refreshInit");
                for (Ne && Z.sort(), t || A(), ze = 0; ze < at.length; ze++) at[ze].refresh();
                for (r.forEach(function(e) { return e && e.render && e.render(-1) }), ze = at.length; ze--;) at[ze].scroll.rec = 0;
                a.pause(), _("refresh")
            } else xa(Z, "scrollEnd", Qa)
        },
        q = 0,
        lt = 1,
        B = function _updateAll() {
            var e = at.length,
                t = He(),
                r = 50 <= t - v,
                n = e && at[0].scroll();
            if (lt = n < q ? -1 : 1, q = n, r && (De && !Ae && 200 < t - De && (De = 0, _("scrollEnd")), Ie = v, v = t), lt < 0) {
                for (ze = e; ze--;) at[ze] && at[ze].update(0, r);
                lt = 1
            } else
                for (ze = 0; ze < e; ze++) at[ze] && at[ze].update(0, r);
            l = 0
        },
        F = [b, "top", y, x, $e + Ye, $e + Ve, $e + Ue, $e + Xe, "display", "flexShrink", "float"],
        D = F.concat([Ke, je, "boxSizing", "max" + Ge, "max" + n, "position", $e, Ze, Ze + Ue, Ze + Ve, Ze + Ye, Ze + Xe]),
        j = /([A-Z])/g,
        ct = function _setState(e) {
            if (e)
                for (var t, r, n = e.t.style, o = e.length, i = 0; i < o; i += 2) r = e[i + 1], t = e[i], r ? n[t] = r : n[t] && n.removeProperty(t.replace(j, "-$1").toLowerCase())
        },
        ut = { left: 0, top: 0 },
        Y = /(?:webkit|moz|length|cssText)/i;
    tt.op = rt;
    var Z = (ScrollTrigger.prototype.init = function init(x, y) {
        if (this.progress = 0, this.vars && this.kill(1), Je) {
            var p, n, l, w, C, k, P, _, O, E, I, R, e, A, z, q, W, B, t, F, g, D, J, h, j, v, b, r, m, X, Y, o, c, Z, $, G, ee, te = (x = sa(S(x) || U(x) || x.nodeType ? { trigger: x } : x, it)).horizontal ? tt : rt,
                re = x.onUpdate,
                ne = x.toggleClass,
                i = x.id,
                oe = x.onToggle,
                ie = x.onRefresh,
                a = x.scrub,
                ae = x.trigger,
                se = x.pin,
                le = x.pinSpacing,
                ce = x.invalidateOnRefresh,
                ue = x.anticipatePin,
                s = x.onScrubComplete,
                u = x.onSnapComplete,
                fe = x.once,
                de = x.snap,
                pe = x.pinReparent,
                ge = !a && 0 !== a,
                he = Ee(x.scroller || ke)[0],
                f = Me.core.getCache(he),
                ve = K(he),
                be = "pinType" in x ? "fixed" === x.pinType : ve || "fixed" === L(he, "pinType"),
                me = [x.onEnter, x.onLeave, x.onEnterBack, x.onLeaveBack],
                xe = ge && x.toggleActions.split(" "),
                d = "markers" in x ? x.markers : it.markers,
                ye = ve ? 0 : parseFloat(qa(he)["border" + te.p2 + Ge]) || 0,
                Te = this,
                we = x.onRefreshInit && function() { return x.onRefreshInit(Te) },
                Se = function _getSizeFunc(e, t, r) {
                    var n = r.d,
                        o = r.d2,
                        i = r.a;
                    return (i = L(e, "getBoundingClientRect")) ? function() { return i()[n] } : function() { return (t ? ke["inner" + o] : e["client" + o]) || 0 }
                }(he, ve, te),
                Ce = function _getOffsetsFunc(e, t) { return !t || ~Fe.indexOf(e) ? N(e) : function() { return ut } }(he, ve);
            Te.media = We, ue *= 45, at.push(Te), Te.scroller = he, Te.scroll = M(he, te), C = Te.scroll(), Te.vars = x, y = y || x.animation, "refreshPriority" in x && (Ne = 1), f.tweenScroll = f.tweenScroll || { top: jb(he, rt), left: jb(he, tt) }, Te.tweenTo = p = f.tweenScroll[te.p], y && (y.vars.lazy = !1, y._initted || !1 !== y.vars.immediateRender && !1 !== x.immediateRender && y.render(0, !0, !0), Te.animation = y.pause(), y.scrollTrigger = Te, (o = U(a) && a) && (Y = Me.to(y, { ease: "power3", duration: o, onComplete: function onComplete() { return s && s(Te) } })), m = 0, i = i || y.vars.id), de && (V(de) || (de = { snapTo: de }), Me.set(ve ? [Oe, _e] : he, { scrollBehavior: "auto" }), l = T(de.snapTo) ? de.snapTo : "labels" === de.snapTo ? function _getLabels(i) {
                return function(e) {
                    var t, r = [],
                        n = i.labels,
                        o = i.duration();
                    for (t in n) r.push(n[t] / o);
                    return Me.utils.snap(r, e)
                }
            }(y) : Me.utils.snap(de.snapTo), c = de.duration || { min: .1, max: 2 }, c = V(c) ? Le(c.min, c.max) : Le(c, c), Z = Me.delayedCall(de.delay || o / 2 || .1, function() {
                if (Math.abs(Te.getVelocity()) < 10 && !Ae) {
                    var e = y && !ge ? y.totalProgress() : Te.progress,
                        t = (e - X) / (He() - Ie) * 1e3 || 0,
                        r = Qe(t / 2) * t / .185,
                        n = e + r,
                        o = Le(0, 1, l(n, Te)),
                        i = Te.scroll(),
                        a = Math.round(P + o * A),
                        s = p.tween;
                    if (i <= _ && P <= i && a !== i) {
                        if (s && !s._initted && s.data <= Math.abs(a - i)) return;
                        p(a, { duration: c(Qe(.185 * Math.max(Qe(n - e), Qe(o - e)) / t / .05 || 0)), ease: de.ease || "power3", data: Math.abs(a - i), onComplete: function onComplete() { m = X = y && !ge ? y.totalProgress() : Te.progress, u && u(Te) } }, i, r * A, a - i - r * A)
                    }
                } else Te.isActive && Z.restart(!0)
            }).pause()), i && (st[i] = Te), ae = Te.trigger = Ee(ae || se)[0], se = !0 === se ? ae : Ee(se)[0], S(ne) && (ne = { targets: ae, className: ne }), se && (!1 === le || le === $e || (le = !(!le && "flex" === qa(se.parentNode).display) && Ze), Te.pin = se, !1 !== x.force3D && Me.set(se, { force3D: !0 }), (n = Me.core.getCache(se)).spacer ? z = n.pinState : (n.spacer = B = Pe.createElement("div"), B.setAttribute("class", "pin-spacer" + (i ? " pin-spacer-" + i : "")), n.pinState = z = db(se)), Te.spacer = B = n.spacer, r = qa(se), h = r[le + te.os2], F = Me.getProperty(se), g = Me.quickSetter(se, te.a, et), ab(se, B, r), W = db(se)), d && (e = V(d) ? sa(d, ot) : ot, I = Da("scroller-start", i, he, te, e, 0), R = Da("scroller-end", i, he, te, e, 0, I), t = I["offset" + te.op.d2], O = Da("start", i, he, te, e, t), E = Da("end", i, he, te, e, t), be || (function _makePositionable(e) { e.style.position = "absolute" === qa(e).position ? "absolute" : "relative" }(he), Me.set([I, R], { force3D: !0 }), v = Me.quickSetter(I, te.a, et), b = Me.quickSetter(R, te.a, et))), Te.revert = function(e) {
                var t = !1 !== e || !Te.enabled,
                    r = Re;
                t !== w && (t && (G = Math.max(Te.scroll(), Te.scroll.rec || 0), $ = Te.progress, ee = y && y.progress()), O && [O, E, I, R].forEach(function(e) { return e.style.display = t ? "none" : "block" }), t && (Re = 1), Te.update(t), Re = r, se && (t ? function _swapPinOut(e, t, r) {
                    if (ct(r), e.parentNode === t) {
                        var n = t.parentNode;
                        n && (n.insertBefore(e, t), n.removeChild(t))
                    }
                }(se, B, z) : pe && Te.isActive || ab(se, B, qa(se), j)), w = t)
            }, Te.refresh = function(e) {
                if (!Re && Te.enabled)
                    if (se && e && De) xa(ScrollTrigger, "scrollEnd", Qa);
                    else {
                        Re = 1, Y && Y.kill(), ce && y && y.progress(0).invalidate(), w || Te.revert();
                        for (var t, r, n, o, i, a, s, l, c = Se(), u = Ce(), f = Q(he, te), d = 0, p = 0, g = x.end, h = x.endTrigger || ae, v = x.start || (0 === x.start ? 0 : se || !ae ? "0 0" : "0 100%"), b = ae && Math.max(0, at.indexOf(Te)) || 0, m = b; m--;) !(s = at[m].pin) || s !== ae && s !== se || at[m].revert();
                        for (P = gb(v, ae, c, te, Te.scroll(), O, I, Te, u, ye, be, f) || (se ? -.001 : 0), T(g) && (g = g(Te)), S(g) && !g.indexOf("+=") && (~g.indexOf(" ") ? g = (S(v) ? v.split(" ")[0] : "") + g : (d = Ca(g.substr(2), c), g = S(v) ? v : P + d, h = ae)), _ = Math.max(P, gb(g || (h ? "100% 0" : f), h, c, te, Te.scroll() + d, E, R, Te, u, ye, be, f)) || -.001, A = _ - P || (P -= .01) && .001, d = 0, m = b; m--;)(s = (a = at[m]).pin) && a.start - a._pinPush < P && (t = a.end - a.start, s === ae && (d += t), s === se && (p += t));
                        if (P += d, _ += d, Te._pinPush = p, O && d && ((t = {})[te.a] = "+=" + d, Me.set([O, E], t)), se) t = qa(se), o = te === rt, n = Te.scroll(), D = parseFloat(F(te.a)) + p, !f && 1 < _ && ((ve ? Oe : he).style["overflow-" + te.a] = "scroll"), ab(se, B, t), W = db(se), r = nt(se, !0), l = be && M(he, o ? tt : rt)(), le && ((j = [le + te.os2, A + p + et]).t = B, (m = le === Ze ? ua(se, te) + A + p : 0) && j.push(te.d, m + et), ct(j), be && Te.scroll(G)), be && ((i = { top: r.top + (o ? n - P : l) + et, left: r.left + (o ? l : n - P) + et, boxSizing: "border-box", position: "fixed" })[Ke] = i.maxWidth = Math.ceil(r.width) + et, i[je] = i.maxHeight = Math.ceil(r.height) + et, i[$e] = i[$e + Ue] = i[$e + Ve] = i[$e + Ye] = i[$e + Xe] = "0", i[Ze] = t[Ze], i[Ze + Ue] = t[Ze + Ue], i[Ze + Ve] = t[Ze + Ve], i[Ze + Ye] = t[Ze + Ye], i[Ze + Xe] = t[Ze + Xe], q = function _copyState(e, t, r) { for (var n, o = [], i = e.length, a = r ? 8 : 0; a < i; a += 2) n = e[a], o.push(n, n in t ? t[n] : e[a + 1]); return o.t = e.t, o }(z, i, pe)), y ? (y.progress(1, !0), J = F(te.a) - D + A + p, A !== J && q.splice(q.length - 2, 2), y.progress(0, !0)) : J = A;
                        else if (ae && Te.scroll())
                            for (r = ae.parentNode; r && r !== Oe;) r._pinOffset && (P -= r._pinOffset, _ -= r._pinOffset), r = r.parentNode;
                        for (m = 0; m < b; m++) !(a = at[m].pin) || a !== ae && a !== se || at[m].revert(!1);
                        Te.start = P, Te.end = _, (C = k = Te.scroll()) < G && Te.scroll(G), Te.revert(!1), Re = 0, ee && ge && y.progress(ee, !0), $ !== Te.progress && (Y && y.totalProgress($, !0), Te.progress = $, Te.update()), se && le && (B._pinOffset = Math.round(Te.progress * J)), ie && ie(Te)
                    }
            }, Te.getVelocity = function() { return (Te.scroll() - k) / (He() - Ie) * 1e3 || 0 }, Te.update = function(e, t) {
                var r, n, o, i, a, s = Te.scroll(),
                    l = e ? 0 : (s - P) / A,
                    c = l < 0 ? 0 : 1 < l ? 1 : l || 0,
                    u = Te.progress;
                if (t && (k = C, C = s, de && (X = m, m = y && !ge ? y.totalProgress() : c)), ue && !c && se && !Re && !Be && De && P < s + (s - k) / (He() - Ie) * ue && (c = 1e-4), c !== u && Te.enabled) {
                    if (i = (a = (r = Te.isActive = !!c && c < 1) != (!!u && u < 1)) || !!c != !!u, Te.direction = u < c ? 1 : -1, Te.progress = c, ge || (!Y || Re || Be ? y && y.totalProgress(c, !!Re) : (Y.vars.totalProgress = c, Y.invalidate().restart())), se)
                        if (e && le && (B.style[le + te.os2] = h), be) {
                            if (i) {
                                if (o = !e && u < c && s < _ + 1 && s + 1 >= Q(he, te), pe)
                                    if (e || !r && !o) ib(se, B);
                                    else {
                                        var f = nt(se, !0),
                                            d = s - P;
                                        ib(se, Oe, f.top + (te === rt ? d : 0) + et, f.left + (te === rt ? 0 : d) + et)
                                    }
                                ct(r || o ? q : W), J !== A && c < 1 && r || g(D + (1 !== c || o ? 0 : J))
                            }
                        } else g(D + J * c);
                        !de || p.tween || Re || Be || Z.restart(!0), ne && (a || fe && c && (c < 1 || !qe)) && Ee(ne.targets).forEach(function(e) { return e.classList[r || fe ? "add" : "remove"](ne.className) }), !re || ge || e || re(Te), i && !Re ? (n = c && !u ? 0 : 1 === c ? 1 : 1 === u ? 2 : 3, ge && (o = !a && "none" !== xe[n + 1] && xe[n + 1] || xe[n], y && ("complete" === o || "reset" === o || o in y) && ("complete" === o ? y.pause().totalProgress(1) : "reset" === o ? y.restart(!0).pause() : y[o]()), re && re(Te)), !a && qe || (oe && a && oe(Te), me[n] && me[n](Te), fe && (1 === c ? Te.kill(!1, 1) : me[n] = 0), a || me[n = 1 === c ? 1 : 3] && me[n](Te))) : ge && re && !Re && re(Te)
                }
                b && (v(s + (I._isFlipped ? 1 : 0)), b(s))
            }, Te.enable = function() { Te.enabled || (Te.enabled = !0, xa(he, "resize", Ja), xa(he, "scroll", Ia), we && xa(ScrollTrigger, "refreshInit", we), y && y.add ? Me.delayedCall(.01, function() { return P || _ || Te.refresh() }) && (A = .01) && (P = _ = 0) : Te.refresh()) }, Te.disable = function(e, t) {
                if (Te.enabled && (!1 !== e && Te.revert(), Te.enabled = Te.isActive = !1, t || Y && Y.pause(), G = 0, n && (n.uncache = 1), we && ya(ScrollTrigger, "refreshInit", we), Z && (Z.pause(), p.tween && p.tween.kill() && (p.tween = 0)), !ve)) {
                    for (var r = at.length; r--;)
                        if (at[r].scroller === he && at[r] !== Te) return;
                    ya(he, "resize", Ja), ya(he, "scroll", Ia)
                }
            }, Te.kill = function(e, t) {
                Te.disable(e, t), i && delete st[i];
                var r = at.indexOf(Te);
                at.splice(r, 1), r === ze && 0 < lt && ze--, y && (y.scrollTrigger = null, e && y.render(-1), t || y.kill()), O && [O, E, I, R].forEach(function(e) { return e.parentNode.removeChild(e) }), n && (n.uncache = 1)
            }, Te.enable()
        } else this.update = this.refresh = this.kill = H
    }, ScrollTrigger.register = function register(e) {
        if (!o && (Me = e || J(), I() && window.document && (ke = window, Pe = document, _e = Pe.documentElement, Oe = Pe.body), Me && (Ee = Me.utils.toArray, Le = Me.utils.clamp, Me.core.globals("ScrollTrigger", ScrollTrigger), Oe))) {
            s = ke.requestAnimationFrame || function(e) { return setTimeout(e, 16) }, xa(ke, "mousewheel", Ia), i = [ke, Pe, _e, Oe], xa(Pe, "scroll", Ia);
            var t, r = Oe.style,
                n = r.borderTop;
            r.borderTop = "1px solid #000", t = nt(Oe), rt.m = Math.round(t.top + rt.sc()) || 0, tt.m = Math.round(t.left + tt.sc()) || 0, n ? r.borderTop = n : r.removeProperty("border-top"), c = setInterval(Ha, 200), Me.delayedCall(.5, function() { return Be = 0 }), xa(Pe, "touchcancel", H), xa(Oe, "touchstart", H), wa(xa, Pe, "pointerdown,touchstart,mousedown", function() { return Ae = 1 }), wa(xa, Pe, "pointerup,touchend,mouseup", function() { return Ae = 0 }), u = Me.utils.checkPrefix("transform"), D.push(u), o = He(), a = Me.delayedCall(.2, z).pause(), p = [Pe, "visibilitychange", function() {
                var e = ke.innerWidth,
                    t = ke.innerHeight;
                Pe.hidden ? (f = e, d = t) : f === e && d === t || Ja()
            }, Pe, "DOMContentLoaded", z, ke, "load", function() { return De || z() }, ke, "resize", Ja], R(xa)
        }
        return o
    }, ScrollTrigger.defaults = function defaults(e) { for (var t in e) it[t] = e[t] }, ScrollTrigger.kill = function kill() { Je = 0, at.slice(0).forEach(function(e) { return e.kill(1) }) }, ScrollTrigger.config = function config(e) {
        "limitCallbacks" in e && (qe = !!e.limitCallbacks);
        var t = e.syncInterval;
        t && clearInterval(c) || (c = t) && setInterval(Ha, t), "autoRefreshEvents" in e && (R(ya) || R(xa, e.autoRefreshEvents || "none"))
    }, ScrollTrigger.scrollerProxy = function scrollerProxy(e, t) {
        var r = Ee(e)[0];
        K(r) ? Fe.unshift(ke, t, Oe, t, _e, t) : Fe.unshift(r, t)
    }, ScrollTrigger.matchMedia = function matchMedia(e) { var t, r, n, o, i; for (r in e) n = P.indexOf(r), o = e[r], "all" === (We = r) ? o() : (t = ke.matchMedia(r)) && (t.matches && (i = o()), ~n ? (P[n + 1] = X(P[n + 1], o), P[n + 2] = X(P[n + 2], i)) : (n = P.length, P.push(r, o, i), t.addListener ? t.addListener(Pa) : t.addEventListener("change", Pa)), P[n + 3] = t.matches), We = 0; return P }, ScrollTrigger.clearMatchMedia = function clearMatchMedia(e) { e || (P.length = 0), 0 <= (e = P.indexOf(e)) && P.splice(e, 4) }, ScrollTrigger);

    function ScrollTrigger(e, t) { o || ScrollTrigger.register(Me) || console.warn("Please gsap.registerPlugin(ScrollTrigger)"), this.init(e, t) }
    Z.version = "3.5.1", Z.saveStyles = function(e) {
        return e ? Ee(e).forEach(function(e) {
            var t = O.indexOf(e);
            0 <= t && O.splice(t, 4), O.push(e, e.style.cssText, Me.core.getCache(e), We)
        }) : O
    }, Z.revert = function(e, t) { return A(!e, t) }, Z.create = function(e, t) { return new Z(e, t) }, Z.refresh = function(e) { return e ? Ja() : z(!0) }, Z.update = B, Z.maxScroll = function(e, t) { return Q(e, t ? tt : rt) }, Z.getScrollFunc = function(e, t) { return M(Ee(e)[0], t ? tt : rt) }, Z.getById = function(e) { return st[e] }, Z.getAll = function() { return at.slice(0) }, Z.isScrolling = function() { return !!De }, Z.addEventListener = function(e, t) { var r = C[e] || (C[e] = []);~r.indexOf(t) || r.push(t) }, Z.removeEventListener = function(e, t) {
        var r = C[e],
            n = r && r.indexOf(t);
        0 <= n && r.splice(n, 1)
    }, Z.batch = function(e, t) {
        function bi(e, t) {
            var r = [],
                n = [],
                o = Me.delayedCall(i, function() { t(r, n), r = [], n = [] }).pause();
            return function(e) { r.length || o.restart(!0), r.push(e.trigger), n.push(e), a <= r.length && o.progress(1) }
        }
        var r, n = [],
            o = {},
            i = t.interval || .016,
            a = t.batchMax || 1e9;
        for (r in t) o[r] = "on" === r.substr(0, 2) && T(t[r]) && "onRefreshInit" !== r ? bi(0, t[r]) : t[r];
        return T(a) && (a = a(), xa(Z, "refresh", function() { return a = t.batchMax() })), Ee(e).forEach(function(e) {
            var t = {};
            for (r in o) t[r] = o[r];
            t.trigger = e, n.push(Z.create(t))
        }), n
    }, Z.sort = function(e) { return at.sort(e || function(e, t) { return -1e6 * (e.vars.refreshPriority || 0) + e.start - (t.start + -1e6 * (t.vars.refreshPriority || 0)) }) }, J() && Me.registerPlugin(Z), e.ScrollTrigger = Z, e.default = Z;
    if (typeof(window) === "undefined" || window !== e) { Object.defineProperty(e, "__esModule", { value: !0 }) } else { delete e.default }
});