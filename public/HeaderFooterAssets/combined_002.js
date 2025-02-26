﻿/* (c) JS Foundation and other contributors | jquery.org/license */
!function (a, b) {
    "object" == typeof module && "object" == typeof module.exports ? module.exports = a.document ? b(a, !0) : function (a) {
        if (!a.document) {
            throw new Error("jQuery requires a window with a document")
        }
        return b(a)
    } : b(a)
}("undefined" != typeof window ? window : this, function (a, b) {
    var c = [], d = c.slice, e = c.concat, f = c.push, g = c.indexOf, h = {}, i = h.toString, j = h.hasOwnProperty,
        k = {}, l = a.document, m = "2.1.1", n = function (a, b) {
            return new n.fn.init(a, b)
        }, o = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, p = /^-ms-/, q = /-([\da-z])/gi, r = function (a, b) {
            return b.toUpperCase()
        };
    n.fn = n.prototype = {
        jquery: m, constructor: n, selector: "", length: 0, toArray: function () {
            return d.call(this)
        }, get: function (a) {
            return null != a ? 0 > a ? this[a + this.length] : this[a] : d.call(this)
        }, pushStack: function (a) {
            var b = n.merge(this.constructor(), a);
            return b.prevObject = this, b.context = this.context, b
        }, each: function (a, b) {
            return n.each(this, a, b)
        }, map: function (a) {
            return this.pushStack(n.map(this, function (b, c) {
                return a.call(b, c, b)
            }))
        }, slice: function () {
            return this.pushStack(d.apply(this, arguments))
        }, first: function () {
            return this.eq(0)
        }, last: function () {
            return this.eq(-1)
        }, eq: function (a) {
            var b = this.length, c = +a + (0 > a ? b : 0);
            return this.pushStack(c >= 0 && b > c ? [this[c]] : [])
        }, end: function () {
            return this.prevObject || this.constructor(null)
        }, push: f, sort: c.sort, splice: c.splice
    }, n.extend = n.fn.extend = function () {
        var a, b, c, d, e, f, g = arguments[0] || {}, h = 1, i = arguments.length, j = !1;
        for ("boolean" == typeof g && (j = g, g = arguments[h] || {}, h++), "object" == typeof g || n.isFunction(g) || (g = {}), h === i && (g = this, h--); i > h; h++) {
            if (null != (a = arguments[h])) {
                for (b in a) {
                    c = g[b], d = a[b], g !== d && (j && d && (n.isPlainObject(d) || (e = n.isArray(d))) ? (e ? (e = !1, f = c && n.isArray(c) ? c : []) : f = c && n.isPlainObject(c) ? c : {}, g[b] = n.extend(j, f, d)) : void 0 !== d && (g[b] = d))
                }
            }
        }
        return g
    }, n.extend({
        expando: "jQuery" + (m + Math.random()).replace(/\D/g, ""), isReady: !0, error: function (a) {
            throw new Error(a)
        }, noop: function () {
        }, isFunction: function (a) {
            return "function" === n.type(a)
        }, isArray: Array.isArray, isWindow: function (a) {
            return null != a && a === a.window
        }, isNumeric: function (a) {
            return !n.isArray(a) && a - parseFloat(a) >= 0
        }, isPlainObject: function (a) {
            return "object" !== n.type(a) || a.nodeType || n.isWindow(a) ? !1 : a.constructor && !j.call(a.constructor.prototype, "isPrototypeOf") ? !1 : !0
        }, isEmptyObject: function (a) {
            var b;
            for (b in a) {
                return !1
            }
            return !0
        }, type: function (a) {
            return null == a ? a + "" : "object" == typeof a || "function" == typeof a ? h[i.call(a)] || "object" : typeof a
        }, globalEval: function (a) {
            var b, c = eval;
            a = n.trim(a), a && (1 === a.indexOf("use strict") ? (b = l.createElement("script"), b.text = a, l.head.appendChild(b).parentNode.removeChild(b)) : c(a))
        }, camelCase: function (a) {
            return a.replace(p, "ms-").replace(q, r)
        }, nodeName: function (a, b) {
            return a.nodeName && a.nodeName.toLowerCase() === b.toLowerCase()
        }, each: function (a, b, c) {
            var d, e = 0, f = a.length, g = s(a);
            if (c) {
                if (g) {
                    for (; f > e; e++) {
                        if (d = b.apply(a[e], c), d === !1) {
                            break
                        }
                    }
                } else {
                    for (e in a) {
                        if (d = b.apply(a[e], c), d === !1) {
                            break
                        }
                    }
                }
            } else {
                if (g) {
                    for (; f > e; e++) {
                        if (d = b.call(a[e], e, a[e]), d === !1) {
                            break
                        }
                    }
                } else {
                    for (e in a) {
                        if (d = b.call(a[e], e, a[e]), d === !1) {
                            break
                        }
                    }
                }
            }
            return a
        }, trim: function (a) {
            return null == a ? "" : (a + "").replace(o, "")
        }, makeArray: function (a, b) {
            var c = b || [];
            return null != a && (s(Object(a)) ? n.merge(c, "string" == typeof a ? [a] : a) : f.call(c, a)), c
        }, inArray: function (a, b, c) {
            return null == b ? -1 : g.call(b, a, c)
        }, merge: function (a, b) {
            for (var c = +b.length, d = 0, e = a.length; c > d; d++) {
                a[e++] = b[d]
            }
            return a.length = e, a
        }, grep: function (a, b, c) {
            for (var d, e = [], f = 0, g = a.length, h = !c; g > f; f++) {
                d = !b(a[f], f), d !== h && e.push(a[f])
            }
            return e
        }, map: function (a, b, c) {
            var d, f = 0, g = a.length, h = s(a), i = [];
            if (h) {
                for (; g > f; f++) {
                    d = b(a[f], f, c), null != d && i.push(d)
                }
            } else {
                for (f in a) {
                    d = b(a[f], f, c), null != d && i.push(d)
                }
            }
            return e.apply([], i)
        }, guid: 1, proxy: function (a, b) {
            var c, e, f;
            return "string" == typeof b && (c = a[b], b = a, a = c), n.isFunction(a) ? (e = d.call(arguments, 2), f = function () {
                return a.apply(b || this, e.concat(d.call(arguments)))
            }, f.guid = a.guid = a.guid || n.guid++, f) : void 0
        }, now: Date.now, support: k
    }), n.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function (a, b) {
        h["[object " + b + "]"] = b.toLowerCase()
    });

    function s(a) {
        var b = a.length, c = n.type(a);
        return "function" === c || n.isWindow(a) ? !1 : 1 === a.nodeType && b ? !0 : "array" === c || 0 === b || "number" == typeof b && b > 0 && b - 1 in a
    }

    var t = function (a) {
        var b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u = "sizzle" + -new Date, v = a.document, w = 0,
            x = 0, y = gb(), z = gb(), A = gb(), B = function (a, b) {
                return a === b && (l = !0), 0
            }, C = "undefined", D = 1 << 31, E = {}.hasOwnProperty, F = [], G = F.pop, H = F.push, I = F.push, J = F.slice,
            K = F.indexOf || function (a) {
                for (var b = 0, c = this.length; c > b; b++) {
                    if (this[b] === a) {
                        return b
                    }
                }
                return -1
            },
            L = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
            M = "[\\x20\\t\\r\\n\\f]", N = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+", O = N.replace("w", "w#"),
            P = "\\[" + M + "*(" + N + ")(?:" + M + "*([*^$|!~]?=)" + M + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + O + "))|)" + M + "*\\]",
            Q = ":(" + N + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + P + ")*)|.*)\\)|)",
            R = new RegExp("^" + M + "+|((?:^|[^\\\\])(?:\\\\.)*)" + M + "+$", "g"),
            S = new RegExp("^" + M + "*," + M + "*"), T = new RegExp("^" + M + "*([>+~]|" + M + ")" + M + "*"),
            U = new RegExp("=" + M + "*([^\\]'\"]*?)" + M + "*\\]", "g"), V = new RegExp(Q),
            W = new RegExp("^" + O + "$"), X = {
                ID: new RegExp("^#(" + N + ")"),
                CLASS: new RegExp("^\\.(" + N + ")"),
                TAG: new RegExp("^(" + N.replace("w", "w*") + ")"),
                ATTR: new RegExp("^" + P),
                PSEUDO: new RegExp("^" + Q),
                CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + M + "*(even|odd|(([+-]|)(\\d*)n|)" + M + "*(?:([+-]|)" + M + "*(\\d+)|))" + M + "*\\)|)", "i"),
                bool: new RegExp("^(?:" + L + ")$", "i"),
                needsContext: new RegExp("^" + M + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + M + "*((?:-\\d)?\\d*)" + M + "*\\)|)(?=[^-]|$)", "i")
            }, Y = /^(?:input|select|textarea|button)$/i, Z = /^h\d$/i, $ = /^[^{]+\{\s*\[native \w/,
            _ = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, ab = /[+~]/, bb = /'|\\/g,
            cb = new RegExp("\\\\([\\da-f]{1,6}" + M + "?|(" + M + ")|.)", "ig"), db = function (a, b, c) {
                var d = "0x" + b - 65536;
                return d !== d || c ? b : 0 > d ? String.fromCharCode(d + 65536) : String.fromCharCode(d >> 10 | 55296, 1023 & d | 56320)
            };
        try {
            I.apply(F = J.call(v.childNodes), v.childNodes), F[v.childNodes.length].nodeType
        } catch (eb) {
            I = {
                apply: F.length ? function (a, b) {
                    H.apply(a, J.call(b))
                } : function (a, b) {
                    var c = a.length, d = 0;
                    while (a[c++] = b[d++]) {
                    }
                    a.length = c - 1
                }
            }
        }

        function fb(a, b, d, e) {
            var f, h, j, k, l, o, r, s, w, x;
            if ((b ? b.ownerDocument || b : v) !== n && m(b), b = b || n, d = d || [], !a || "string" != typeof a) {
                return d
            }
            if (1 !== (k = b.nodeType) && 9 !== k) {
                return []
            }
            if (p && !e) {
                if (f = _.exec(a)) {
                    if (j = f[1]) {
                        if (9 === k) {
                            if (h = b.getElementById(j), !h || !h.parentNode) {
                                return d
                            }
                            if (h.id === j) {
                                return d.push(h), d
                            }
                        } else {
                            if (b.ownerDocument && (h = b.ownerDocument.getElementById(j)) && t(b, h) && h.id === j) {
                                return d.push(h), d
                            }
                        }
                    } else {
                        if (f[2]) {
                            return I.apply(d, b.getElementsByTagName(a)), d
                        }
                        if ((j = f[3]) && c.getElementsByClassName && b.getElementsByClassName) {
                            return I.apply(d, b.getElementsByClassName(j)), d
                        }
                    }
                }
                if (c.qsa && (!q || !q.test(a))) {
                    if (s = r = u, w = b, x = 9 === k && a, 1 === k && "object" !== b.nodeName.toLowerCase()) {
                        o = g(a), (r = b.getAttribute("id")) ? s = r.replace(bb, "\\$&") : b.setAttribute("id", s), s = "[id='" + s + "'] ", l = o.length;
                        while (l--) {
                            o[l] = s + qb(o[l])
                        }
                        w = ab.test(a) && ob(b.parentNode) || b, x = o.join(",")
                    }
                    if (x) {
                        try {
                            return I.apply(d, w.querySelectorAll(x)), d
                        } catch (y) {
                        } finally {
                            r || b.removeAttribute("id")
                        }
                    }
                }
            }
            return i(a.replace(R, "$1"), b, d, e)
        }

        function gb() {
            var a = [];

            function b(c, e) {
                return a.push(c + " ") > d.cacheLength && delete b[a.shift()], b[c + " "] = e
            }

            return b
        }

        function hb(a) {
            return a[u] = !0, a
        }

        function ib(a) {
            var b = n.createElement("div");
            try {
                return !!a(b)
            } catch (c) {
                return !1
            } finally {
                b.parentNode && b.parentNode.removeChild(b), b = null
            }
        }

        function jb(a, b) {
            var c = a.split("|"), e = a.length;
            while (e--) {
                d.attrHandle[c[e]] = b
            }
        }

        function kb(a, b) {
            var c = b && a,
                d = c && 1 === a.nodeType && 1 === b.nodeType && (~b.sourceIndex || D) - (~a.sourceIndex || D);
            if (d) {
                return d
            }
            if (c) {
                while (c = c.nextSibling) {
                    if (c === b) {
                        return -1
                    }
                }
            }
            return a ? 1 : -1
        }

        function lb(a) {
            return function (b) {
                var c = b.nodeName.toLowerCase();
                return "input" === c && b.type === a
            }
        }

        function mb(a) {
            return function (b) {
                var c = b.nodeName.toLowerCase();
                return ("input" === c || "button" === c) && b.type === a
            }
        }

        function nb(a) {
            return hb(function (b) {
                return b = +b, hb(function (c, d) {
                    var e, f = a([], c.length, b), g = f.length;
                    while (g--) {
                        c[e = f[g]] && (c[e] = !(d[e] = c[e]))
                    }
                })
            })
        }

        function ob(a) {
            return a && typeof a.getElementsByTagName !== C && a
        }

        c = fb.support = {}, f = fb.isXML = function (a) {
            var b = a && (a.ownerDocument || a).documentElement;
            return b ? "HTML" !== b.nodeName : !1
        }, m = fb.setDocument = function (a) {
            var b, e = a ? a.ownerDocument || a : v, g = e.defaultView;
            return e !== n && 9 === e.nodeType && e.documentElement ? (n = e, o = e.documentElement, p = !f(e), g && g !== g.top && (g.addEventListener ? g.addEventListener("unload", function () {
                m()
            }, !1) : g.attachEvent && g.attachEvent("onunload", function () {
                m()
            })), c.attributes = ib(function (a) {
                return a.className = "i", !a.getAttribute("className")
            }), c.getElementsByTagName = ib(function (a) {
                return a.appendChild(e.createComment("")), !a.getElementsByTagName("*").length
            }), c.getElementsByClassName = $.test(e.getElementsByClassName) && ib(function (a) {
                return a.innerHTML = "<div class='a'></div><div class='a i'></div>", a.firstChild.className = "i", 2 === a.getElementsByClassName("i").length
            }), c.getById = ib(function (a) {
                return o.appendChild(a).id = u, !e.getElementsByName || !e.getElementsByName(u).length
            }), c.getById ? (d.find.ID = function (a, b) {
                if (typeof b.getElementById !== C && p) {
                    var c = b.getElementById(a);
                    return c && c.parentNode ? [c] : []
                }
            }, d.filter.ID = function (a) {
                var b = a.replace(cb, db);
                return function (a) {
                    return a.getAttribute("id") === b
                }
            }) : (delete d.find.ID, d.filter.ID = function (a) {
                var b = a.replace(cb, db);
                return function (a) {
                    var c = typeof a.getAttributeNode !== C && a.getAttributeNode("id");
                    return c && c.value === b
                }
            }), d.find.TAG = c.getElementsByTagName ? function (a, b) {
                return typeof b.getElementsByTagName !== C ? b.getElementsByTagName(a) : void 0
            } : function (a, b) {
                var c, d = [], e = 0, f = b.getElementsByTagName(a);
                if ("*" === a) {
                    while (c = f[e++]) {
                        1 === c.nodeType && d.push(c)
                    }
                    return d
                }
                return f
            }, d.find.CLASS = c.getElementsByClassName && function (a, b) {
                return typeof b.getElementsByClassName !== C && p ? b.getElementsByClassName(a) : void 0
            }, r = [], q = [], (c.qsa = $.test(e.querySelectorAll)) && (ib(function (a) {
                a.innerHTML = "<select msallowclip=''><option selected=''></option></select>", a.querySelectorAll("[msallowclip^='']").length && q.push("[*^$]=" + M + "*(?:''|\"\")"), a.querySelectorAll("[selected]").length || q.push("\\[" + M + "*(?:value|" + L + ")"), a.querySelectorAll(":checked").length || q.push(":checked")
            }), ib(function (a) {
                var b = e.createElement("input");
                b.setAttribute("type", "hidden"), a.appendChild(b).setAttribute("name", "D"), a.querySelectorAll("[name=d]").length && q.push("name" + M + "*[*^$|!~]?="), a.querySelectorAll(":enabled").length || q.push(":enabled", ":disabled"), a.querySelectorAll("*,:x"), q.push(",.*:")
            })), (c.matchesSelector = $.test(s = o.matches || o.webkitMatchesSelector || o.mozMatchesSelector || o.oMatchesSelector || o.msMatchesSelector)) && ib(function (a) {
                c.disconnectedMatch = s.call(a, "div"), s.call(a, "[s!='']:x"), r.push("!=", Q)
            }), q = q.length && new RegExp(q.join("|")), r = r.length && new RegExp(r.join("|")), b = $.test(o.compareDocumentPosition), t = b || $.test(o.contains) ? function (a, b) {
                var c = 9 === a.nodeType ? a.documentElement : a, d = b && b.parentNode;
                return a === d || !(!d || 1 !== d.nodeType || !(c.contains ? c.contains(d) : a.compareDocumentPosition && 16 & a.compareDocumentPosition(d)))
            } : function (a, b) {
                if (b) {
                    while (b = b.parentNode) {
                        if (b === a) {
                            return !0
                        }
                    }
                }
                return !1
            }, B = b ? function (a, b) {
                if (a === b) {
                    return l = !0, 0
                }
                var d = !a.compareDocumentPosition - !b.compareDocumentPosition;
                return d ? d : (d = (a.ownerDocument || a) === (b.ownerDocument || b) ? a.compareDocumentPosition(b) : 1, 1 & d || !c.sortDetached && b.compareDocumentPosition(a) === d ? a === e || a.ownerDocument === v && t(v, a) ? -1 : b === e || b.ownerDocument === v && t(v, b) ? 1 : k ? K.call(k, a) - K.call(k, b) : 0 : 4 & d ? -1 : 1)
            } : function (a, b) {
                if (a === b) {
                    return l = !0, 0
                }
                var c, d = 0, f = a.parentNode, g = b.parentNode, h = [a], i = [b];
                if (!f || !g) {
                    return a === e ? -1 : b === e ? 1 : f ? -1 : g ? 1 : k ? K.call(k, a) - K.call(k, b) : 0
                }
                if (f === g) {
                    return kb(a, b)
                }
                c = a;
                while (c = c.parentNode) {
                    h.unshift(c)
                }
                c = b;
                while (c = c.parentNode) {
                    i.unshift(c)
                }
                while (h[d] === i[d]) {
                    d++
                }
                return d ? kb(h[d], i[d]) : h[d] === v ? -1 : i[d] === v ? 1 : 0
            }, e) : n
        }, fb.matches = function (a, b) {
            return fb(a, null, null, b)
        }, fb.matchesSelector = function (a, b) {
            if ((a.ownerDocument || a) !== n && m(a), b = b.replace(U, "='$1']"), !(!c.matchesSelector || !p || r && r.test(b) || q && q.test(b))) {
                try {
                    var d = s.call(a, b);
                    if (d || c.disconnectedMatch || a.document && 11 !== a.document.nodeType) {
                        return d
                    }
                } catch (e) {
                }
            }
            return fb(b, n, null, [a]).length > 0
        }, fb.contains = function (a, b) {
            return (a.ownerDocument || a) !== n && m(a), t(a, b)
        }, fb.attr = function (a, b) {
            (a.ownerDocument || a) !== n && m(a);
            var e = d.attrHandle[b.toLowerCase()],
                f = e && E.call(d.attrHandle, b.toLowerCase()) ? e(a, b, !p) : void 0;
            return void 0 !== f ? f : c.attributes || !p ? a.getAttribute(b) : (f = a.getAttributeNode(b)) && f.specified ? f.value : null
        }, fb.error = function (a) {
            throw new Error("Syntax error, unrecognized expression: " + a)
        }, fb.uniqueSort = function (a) {
            var b, d = [], e = 0, f = 0;
            if (l = !c.detectDuplicates, k = !c.sortStable && a.slice(0), a.sort(B), l) {
                while (b = a[f++]) {
                    b === a[f] && (e = d.push(f))
                }
                while (e--) {
                    a.splice(d[e], 1)
                }
            }
            return k = null, a
        }, e = fb.getText = function (a) {
            var b, c = "", d = 0, f = a.nodeType;
            if (f) {
                if (1 === f || 9 === f || 11 === f) {
                    if ("string" == typeof a.textContent) {
                        return a.textContent
                    }
                    for (a = a.firstChild; a; a = a.nextSibling) {
                        c += e(a)
                    }
                } else {
                    if (3 === f || 4 === f) {
                        return a.nodeValue
                    }
                }
            } else {
                while (b = a[d++]) {
                    c += e(b)
                }
            }
            return c
        }, d = fb.selectors = {
            cacheLength: 50,
            createPseudo: hb,
            match: X,
            attrHandle: {},
            find: {},
            relative: {
                ">": {dir: "parentNode", first: !0},
                " ": {dir: "parentNode"},
                "+": {dir: "previousSibling", first: !0},
                "~": {dir: "previousSibling"}
            },
            preFilter: {
                ATTR: function (a) {
                    return a[1] = a[1].replace(cb, db), a[3] = (a[3] || a[4] || a[5] || "").replace(cb, db), "~=" === a[2] && (a[3] = " " + a[3] + " "), a.slice(0, 4)
                }, CHILD: function (a) {
                    return a[1] = a[1].toLowerCase(), "nth" === a[1].slice(0, 3) ? (a[3] || fb.error(a[0]), a[4] = +(a[4] ? a[5] + (a[6] || 1) : 2 * ("even" === a[3] || "odd" === a[3])), a[5] = +(a[7] + a[8] || "odd" === a[3])) : a[3] && fb.error(a[0]), a
                }, PSEUDO: function (a) {
                    var b, c = !a[6] && a[2];
                    return X.CHILD.test(a[0]) ? null : (a[3] ? a[2] = a[4] || a[5] || "" : c && V.test(c) && (b = g(c, !0)) && (b = c.indexOf(")", c.length - b) - c.length) && (a[0] = a[0].slice(0, b), a[2] = c.slice(0, b)), a.slice(0, 3))
                }
            },
            filter: {
                TAG: function (a) {
                    var b = a.replace(cb, db).toLowerCase();
                    return "*" === a ? function () {
                        return !0
                    } : function (a) {
                        return a.nodeName && a.nodeName.toLowerCase() === b
                    }
                }, CLASS: function (a) {
                    var b = y[a + " "];
                    return b || (b = new RegExp("(^|" + M + ")" + a + "(" + M + "|$)")) && y(a, function (a) {
                        return b.test("string" == typeof a.className && a.className || typeof a.getAttribute !== C && a.getAttribute("class") || "")
                    })
                }, ATTR: function (a, b, c) {
                    return function (d) {
                        var e = fb.attr(d, a);
                        return null == e ? "!=" === b : b ? (e += "", "=" === b ? e === c : "!=" === b ? e !== c : "^=" === b ? c && 0 === e.indexOf(c) : "*=" === b ? c && e.indexOf(c) > -1 : "$=" === b ? c && e.slice(-c.length) === c : "~=" === b ? (" " + e + " ").indexOf(c) > -1 : "|=" === b ? e === c || e.slice(0, c.length + 1) === c + "-" : !1) : !0
                    }
                }, CHILD: function (a, b, c, d, e) {
                    var f = "nth" !== a.slice(0, 3), g = "last" !== a.slice(-4), h = "of-type" === b;
                    return 1 === d && 0 === e ? function (a) {
                        return !!a.parentNode
                    } : function (b, c, i) {
                        var j, k, l, m, n, o, p = f !== g ? "nextSibling" : "previousSibling", q = b.parentNode,
                            r = h && b.nodeName.toLowerCase(), s = !i && !h;
                        if (q) {
                            if (f) {
                                while (p) {
                                    l = b;
                                    while (l = l[p]) {
                                        if (h ? l.nodeName.toLowerCase() === r : 1 === l.nodeType) {
                                            return !1
                                        }
                                    }
                                    o = p = "only" === a && !o && "nextSibling"
                                }
                                return !0
                            }
                            if (o = [g ? q.firstChild : q.lastChild], g && s) {
                                k = q[u] || (q[u] = {}), j = k[a] || [], n = j[0] === w && j[1], m = j[0] === w && j[2], l = n && q.childNodes[n];
                                while (l = ++n && l && l[p] || (m = n = 0) || o.pop()) {
                                    if (1 === l.nodeType && ++m && l === b) {
                                        k[a] = [w, n, m];
                                        break
                                    }
                                }
                            } else {
                                if (s && (j = (b[u] || (b[u] = {}))[a]) && j[0] === w) {
                                    m = j[1]
                                } else {
                                    while (l = ++n && l && l[p] || (m = n = 0) || o.pop()) {
                                        if ((h ? l.nodeName.toLowerCase() === r : 1 === l.nodeType) && ++m && (s && ((l[u] || (l[u] = {}))[a] = [w, m]), l === b)) {
                                            break
                                        }
                                    }
                                }
                            }
                            return m -= e, m === d || m % d === 0 && m / d >= 0
                        }
                    }
                }, PSEUDO: function (a, b) {
                    var c, e = d.pseudos[a] || d.setFilters[a.toLowerCase()] || fb.error("unsupported pseudo: " + a);
                    return e[u] ? e(b) : e.length > 1 ? (c = [a, a, "", b], d.setFilters.hasOwnProperty(a.toLowerCase()) ? hb(function (a, c) {
                        var d, f = e(a, b), g = f.length;
                        while (g--) {
                            d = K.call(a, f[g]), a[d] = !(c[d] = f[g])
                        }
                    }) : function (a) {
                        return e(a, 0, c)
                    }) : e
                }
            },
            pseudos: {
                not: hb(function (a) {
                    var b = [], c = [], d = h(a.replace(R, "$1"));
                    return d[u] ? hb(function (a, b, c, e) {
                        var f, g = d(a, null, e, []), h = a.length;
                        while (h--) {
                            (f = g[h]) && (a[h] = !(b[h] = f))
                        }
                    }) : function (a, e, f) {
                        return b[0] = a, d(b, null, f, c), !c.pop()
                    }
                }), has: hb(function (a) {
                    return function (b) {
                        return fb(a, b).length > 0
                    }
                }), contains: hb(function (a) {
                    return function (b) {
                        return (b.textContent || b.innerText || e(b)).indexOf(a) > -1
                    }
                }), lang: hb(function (a) {
                    return W.test(a || "") || fb.error("unsupported lang: " + a), a = a.replace(cb, db).toLowerCase(), function (b) {
                        var c;
                        do {
                            if (c = p ? b.lang : b.getAttribute("xml:lang") || b.getAttribute("lang")) {
                                return c = c.toLowerCase(), c === a || 0 === c.indexOf(a + "-")
                            }
                        } while ((b = b.parentNode) && 1 === b.nodeType);
                        return !1
                    }
                }), target: function (b) {
                    var c = a.location && a.location.hash;
                    return c && c.slice(1) === b.id
                }, root: function (a) {
                    return a === o
                }, focus: function (a) {
                    return a === n.activeElement && (!n.hasFocus || n.hasFocus()) && !!(a.type || a.href || ~a.tabIndex)
                }, enabled: function (a) {
                    return a.disabled === !1
                }, disabled: function (a) {
                    return a.disabled === !0
                }, checked: function (a) {
                    var b = a.nodeName.toLowerCase();
                    return "input" === b && !!a.checked || "option" === b && !!a.selected
                }, selected: function (a) {
                    return a.parentNode && a.parentNode.selectedIndex, a.selected === !0
                }, empty: function (a) {
                    for (a = a.firstChild; a; a = a.nextSibling) {
                        if (a.nodeType < 6) {
                            return !1
                        }
                    }
                    return !0
                }, parent: function (a) {
                    return !d.pseudos.empty(a)
                }, header: function (a) {
                    return Z.test(a.nodeName)
                }, input: function (a) {
                    return Y.test(a.nodeName)
                }, button: function (a) {
                    var b = a.nodeName.toLowerCase();
                    return "input" === b && "button" === a.type || "button" === b
                }, text: function (a) {
                    var b;
                    return "input" === a.nodeName.toLowerCase() && "text" === a.type && (null == (b = a.getAttribute("type")) || "text" === b.toLowerCase())
                }, first: nb(function () {
                    return [0]
                }), last: nb(function (a, b) {
                    return [b - 1]
                }), eq: nb(function (a, b, c) {
                    return [0 > c ? c + b : c]
                }), even: nb(function (a, b) {
                    for (var c = 0; b > c; c += 2) {
                        a.push(c)
                    }
                    return a
                }), odd: nb(function (a, b) {
                    for (var c = 1; b > c; c += 2) {
                        a.push(c)
                    }
                    return a
                }), lt: nb(function (a, b, c) {
                    for (var d = 0 > c ? c + b : c; --d >= 0;) {
                        a.push(d)
                    }
                    return a
                }), gt: nb(function (a, b, c) {
                    for (var d = 0 > c ? c + b : c; ++d < b;) {
                        a.push(d)
                    }
                    return a
                })
            }
        }, d.pseudos.nth = d.pseudos.eq;
        for (b in {radio: !0, checkbox: !0, file: !0, password: !0, image: !0}) {
            d.pseudos[b] = lb(b)
        }
        for (b in {submit: !0, reset: !0}) {
            d.pseudos[b] = mb(b)
        }

        function pb() {
        }

        pb.prototype = d.filters = d.pseudos, d.setFilters = new pb, g = fb.tokenize = function (a, b) {
            var c, e, f, g, h, i, j, k = z[a + " "];
            if (k) {
                return b ? 0 : k.slice(0)
            }
            h = a, i = [], j = d.preFilter;
            while (h) {
                (!c || (e = S.exec(h))) && (e && (h = h.slice(e[0].length) || h), i.push(f = [])), c = !1, (e = T.exec(h)) && (c = e.shift(), f.push({
                    value: c,
                    type: e[0].replace(R, " ")
                }), h = h.slice(c.length));
                for (g in d.filter) {
                    !(e = X[g].exec(h)) || j[g] && !(e = j[g](e)) || (c = e.shift(), f.push({
                        value: c,
                        type: g,
                        matches: e
                    }), h = h.slice(c.length))
                }
                if (!c) {
                    break
                }
            }
            return b ? h.length : h ? fb.error(a) : z(a, i).slice(0)
        };

        function qb(a) {
            for (var b = 0, c = a.length, d = ""; c > b; b++) {
                d += a[b].value
            }
            return d
        }

        function rb(a, b, c) {
            var d = b.dir, e = c && "parentNode" === d, f = x++;
            return b.first ? function (b, c, f) {
                while (b = b[d]) {
                    if (1 === b.nodeType || e) {
                        return a(b, c, f)
                    }
                }
            } : function (b, c, g) {
                var h, i, j = [w, f];
                if (g) {
                    while (b = b[d]) {
                        if ((1 === b.nodeType || e) && a(b, c, g)) {
                            return !0
                        }
                    }
                } else {
                    while (b = b[d]) {
                        if (1 === b.nodeType || e) {
                            if (i = b[u] || (b[u] = {}), (h = i[d]) && h[0] === w && h[1] === f) {
                                return j[2] = h[2]
                            }
                            if (i[d] = j, j[2] = a(b, c, g)) {
                                return !0
                            }
                        }
                    }
                }
            }
        }

        function sb(a) {
            return a.length > 1 ? function (b, c, d) {
                var e = a.length;
                while (e--) {
                    if (!a[e](b, c, d)) {
                        return !1
                    }
                }
                return !0
            } : a[0]
        }

        function tb(a, b, c) {
            for (var d = 0, e = b.length; e > d; d++) {
                fb(a, b[d], c)
            }
            return c
        }

        function ub(a, b, c, d, e) {
            for (var f, g = [], h = 0, i = a.length, j = null != b; i > h; h++) {
                (f = a[h]) && (!c || c(f, d, e)) && (g.push(f), j && b.push(h))
            }
            return g
        }

        function vb(a, b, c, d, e, f) {
            return d && !d[u] && (d = vb(d)), e && !e[u] && (e = vb(e, f)), hb(function (f, g, h, i) {
                var j, k, l, m = [], n = [], o = g.length, p = f || tb(b || "*", h.nodeType ? [h] : h, []),
                    q = !a || !f && b ? p : ub(p, m, a, h, i), r = c ? e || (f ? a : o || d) ? [] : g : q;
                if (c && c(q, r, h, i), d) {
                    j = ub(r, n), d(j, [], h, i), k = j.length;
                    while (k--) {
                        (l = j[k]) && (r[n[k]] = !(q[n[k]] = l))
                    }
                }
                if (f) {
                    if (e || a) {
                        if (e) {
                            j = [], k = r.length;
                            while (k--) {
                                (l = r[k]) && j.push(q[k] = l)
                            }
                            e(null, r = [], j, i)
                        }
                        k = r.length;
                        while (k--) {
                            (l = r[k]) && (j = e ? K.call(f, l) : m[k]) > -1 && (f[j] = !(g[j] = l))
                        }
                    }
                } else {
                    r = ub(r === g ? r.splice(o, r.length) : r), e ? e(null, g, r, i) : I.apply(g, r)
                }
            })
        }

        function wb(a) {
            for (var b, c, e, f = a.length, g = d.relative[a[0].type], h = g || d.relative[" "], i = g ? 1 : 0, k = rb(function (a) {
                return a === b
            }, h, !0), l = rb(function (a) {
                return K.call(b, a) > -1
            }, h, !0), m = [function (a, c, d) {
                return !g && (d || c !== j) || ((b = c).nodeType ? k(a, c, d) : l(a, c, d))
            }]; f > i; i++) {
                if (c = d.relative[a[i].type]) {
                    m = [rb(sb(m), c)]
                } else {
                    if (c = d.filter[a[i].type].apply(null, a[i].matches), c[u]) {
                        for (e = ++i; f > e; e++) {
                            if (d.relative[a[e].type]) {
                                break
                            }
                        }
                        return vb(i > 1 && sb(m), i > 1 && qb(a.slice(0, i - 1).concat({value: " " === a[i - 2].type ? "*" : ""})).replace(R, "$1"), c, e > i && wb(a.slice(i, e)), f > e && wb(a = a.slice(e)), f > e && qb(a))
                    }
                    m.push(c)
                }
            }
            return sb(m)
        }

        function xb(a, b) {
            var c = b.length > 0, e = a.length > 0, f = function (f, g, h, i, k) {
                var l, m, o, p = 0, q = "0", r = f && [], s = [], t = j, u = f || e && d.find.TAG("*", k),
                    v = w += null == t ? 1 : Math.random() || 0.1, x = u.length;
                for (k && (j = g !== n && g); q !== x && null != (l = u[q]); q++) {
                    if (e && l) {
                        m = 0;
                        while (o = a[m++]) {
                            if (o(l, g, h)) {
                                i.push(l);
                                break
                            }
                        }
                        k && (w = v)
                    }
                    c && ((l = !o && l) && p--, f && r.push(l))
                }
                if (p += q, c && q !== p) {
                    m = 0;
                    while (o = b[m++]) {
                        o(r, s, g, h)
                    }
                    if (f) {
                        if (p > 0) {
                            while (q--) {
                                r[q] || s[q] || (s[q] = G.call(i))
                            }
                        }
                        s = ub(s)
                    }
                    I.apply(i, s), k && !f && s.length > 0 && p + b.length > 1 && fb.uniqueSort(i)
                }
                return k && (w = v, j = t), r
            };
            return c ? hb(f) : f
        }

        return h = fb.compile = function (a, b) {
            var c, d = [], e = [], f = A[a + " "];
            if (!f) {
                b || (b = g(a)), c = b.length;
                while (c--) {
                    f = wb(b[c]), f[u] ? d.push(f) : e.push(f)
                }
                f = A(a, xb(e, d)), f.selector = a
            }
            return f
        }, i = fb.select = function (a, b, e, f) {
            var i, j, k, l, m, n = "function" == typeof a && a, o = !f && g(a = n.selector || a);
            if (e = e || [], 1 === o.length) {
                if (j = o[0] = o[0].slice(0), j.length > 2 && "ID" === (k = j[0]).type && c.getById && 9 === b.nodeType && p && d.relative[j[1].type]) {
                    if (b = (d.find.ID(k.matches[0].replace(cb, db), b) || [])[0], !b) {
                        return e
                    }
                    n && (b = b.parentNode), a = a.slice(j.shift().value.length)
                }
                i = X.needsContext.test(a) ? 0 : j.length;
                while (i--) {
                    if (k = j[i], d.relative[l = k.type]) {
                        break
                    }
                    if ((m = d.find[l]) && (f = m(k.matches[0].replace(cb, db), ab.test(j[0].type) && ob(b.parentNode) || b))) {
                        if (j.splice(i, 1), a = f.length && qb(j), !a) {
                            return I.apply(e, f), e
                        }
                        break
                    }
                }
            }
            return (n || h(a, o))(f, b, !p, e, ab.test(a) && ob(b.parentNode) || b), e
        }, c.sortStable = u.split("").sort(B).join("") === u, c.detectDuplicates = !!l, m(), c.sortDetached = ib(function (a) {
            return 1 & a.compareDocumentPosition(n.createElement("div"))
        }), ib(function (a) {
            return a.innerHTML = "<a href='#'></a>", "#" === a.firstChild.getAttribute("href")
        }) || jb("type|href|height|width", function (a, b, c) {
            return c ? void 0 : a.getAttribute(b, "type" === b.toLowerCase() ? 1 : 2)
        }), c.attributes && ib(function (a) {
            return a.innerHTML = "<input/>", a.firstChild.setAttribute("value", ""), "" === a.firstChild.getAttribute("value")
        }) || jb("value", function (a, b, c) {
            return c || "input" !== a.nodeName.toLowerCase() ? void 0 : a.defaultValue
        }), ib(function (a) {
            return null == a.getAttribute("disabled")
        }) || jb(L, function (a, b, c) {
            var d;
            return c ? void 0 : a[b] === !0 ? b.toLowerCase() : (d = a.getAttributeNode(b)) && d.specified ? d.value : null
        }), fb
    }(a);
    n.find = t, n.expr = t.selectors, n.expr[":"] = n.expr.pseudos, n.unique = t.uniqueSort, n.text = t.getText, n.isXMLDoc = t.isXML, n.contains = t.contains;
    var u = n.expr.match.needsContext, v = /^<(\w+)\s*\/?>(?:<\/\1>|)$/, w = /^.[^:#\[\.,]*$/;

    function x(a, b, c) {
        if (n.isFunction(b)) {
            return n.grep(a, function (a, d) {
                return !!b.call(a, d, a) !== c
            })
        }
        if (b.nodeType) {
            return n.grep(a, function (a) {
                return a === b !== c
            })
        }
        if ("string" == typeof b) {
            if (w.test(b)) {
                return n.filter(b, a, c)
            }
            b = n.filter(b, a)
        }
        return n.grep(a, function (a) {
            return g.call(b, a) >= 0 !== c
        })
    }

    n.filter = function (a, b, c) {
        var d = b[0];
        return c && (a = ":not(" + a + ")"), 1 === b.length && 1 === d.nodeType ? n.find.matchesSelector(d, a) ? [d] : [] : n.find.matches(a, n.grep(b, function (a) {
            return 1 === a.nodeType
        }))
    }, n.fn.extend({
        find: function (a) {
            var b, c = this.length, d = [], e = this;
            if ("string" != typeof a) {
                return this.pushStack(n(a).filter(function () {
                    for (b = 0; c > b; b++) {
                        if (n.contains(e[b], this)) {
                            return !0
                        }
                    }
                }))
            }
            for (b = 0; c > b; b++) {
                n.find(a, e[b], d)
            }
            return d = this.pushStack(c > 1 ? n.unique(d) : d), d.selector = this.selector ? this.selector + " " + a : a, d
        }, filter: function (a) {
            return this.pushStack(x(this, a || [], !1))
        }, not: function (a) {
            return this.pushStack(x(this, a || [], !0))
        }, is: function (a) {
            return !!x(this, "string" == typeof a && u.test(a) ? n(a) : a || [], !1).length
        }
    });
    var y, z = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/, A = n.fn.init = function (a, b) {
        var c, d;
        if (!a) {
            return this
        }
        if ("string" == typeof a) {
            if (c = "<" === a[0] && ">" === a[a.length - 1] && a.length >= 3 ? [null, a, null] : z.exec(a), !c || !c[1] && b) {
                return !b || b.jquery ? (b || y).find(a) : this.constructor(b).find(a)
            }
            if (c[1]) {
                if (b = b instanceof n ? b[0] : b, n.merge(this, n.parseHTML(c[1], b && b.nodeType ? b.ownerDocument || b : l, !0)), v.test(c[1]) && n.isPlainObject(b)) {
                    for (c in b) {
                        n.isFunction(this[c]) ? this[c](b[c]) : this.attr(c, b[c])
                    }
                }
                return this
            }
            return d = l.getElementById(c[2]), d && d.parentNode && (this.length = 1, this[0] = d), this.context = l, this.selector = a, this
        }
        return a.nodeType ? (this.context = this[0] = a, this.length = 1, this) : n.isFunction(a) ? "undefined" != typeof y.ready ? y.ready(a) : a(n) : (void 0 !== a.selector && (this.selector = a.selector, this.context = a.context), n.makeArray(a, this))
    };
    A.prototype = n.fn, y = n(l);
    var B = /^(?:parents|prev(?:Until|All))/, C = {children: !0, contents: !0, next: !0, prev: !0};
    n.extend({
        dir: function (a, b, c) {
            var d = [], e = void 0 !== c;
            while ((a = a[b]) && 9 !== a.nodeType) {
                if (1 === a.nodeType) {
                    if (e && n(a).is(c)) {
                        break
                    }
                    d.push(a)
                }
            }
            return d
        }, sibling: function (a, b) {
            for (var c = []; a; a = a.nextSibling) {
                1 === a.nodeType && a !== b && c.push(a)
            }
            return c
        }
    }), n.fn.extend({
        has: function (a) {
            var b = n(a, this), c = b.length;
            return this.filter(function () {
                for (var a = 0; c > a; a++) {
                    if (n.contains(this, b[a])) {
                        return !0
                    }
                }
            })
        }, closest: function (a, b) {
            for (var c, d = 0, e = this.length, f = [], g = u.test(a) || "string" != typeof a ? n(a, b || this.context) : 0; e > d; d++) {
                for (c = this[d]; c && c !== b; c = c.parentNode) {
                    if (c.nodeType < 11 && (g ? g.index(c) > -1 : 1 === c.nodeType && n.find.matchesSelector(c, a))) {
                        f.push(c);
                        break
                    }
                }
            }
            return this.pushStack(f.length > 1 ? n.unique(f) : f)
        }, index: function (a) {
            return a ? "string" == typeof a ? g.call(n(a), this[0]) : g.call(this, a.jquery ? a[0] : a) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        }, add: function (a, b) {
            return this.pushStack(n.unique(n.merge(this.get(), n(a, b))))
        }, addBack: function (a) {
            return this.add(null == a ? this.prevObject : this.prevObject.filter(a))
        }
    });

    function D(a, b) {
        while ((a = a[b]) && 1 !== a.nodeType) {
        }
        return a
    }

    n.each({
        parent: function (a) {
            var b = a.parentNode;
            return b && 11 !== b.nodeType ? b : null
        }, parents: function (a) {
            return n.dir(a, "parentNode")
        }, parentsUntil: function (a, b, c) {
            return n.dir(a, "parentNode", c)
        }, next: function (a) {
            return D(a, "nextSibling")
        }, prev: function (a) {
            return D(a, "previousSibling")
        }, nextAll: function (a) {
            return n.dir(a, "nextSibling")
        }, prevAll: function (a) {
            return n.dir(a, "previousSibling")
        }, nextUntil: function (a, b, c) {
            return n.dir(a, "nextSibling", c)
        }, prevUntil: function (a, b, c) {
            return n.dir(a, "previousSibling", c)
        }, siblings: function (a) {
            return n.sibling((a.parentNode || {}).firstChild, a)
        }, children: function (a) {
            return n.sibling(a.firstChild)
        }, contents: function (a) {
            return a.contentDocument || n.merge([], a.childNodes)
        }
    }, function (a, b) {
        n.fn[a] = function (c, d) {
            var e = n.map(this, b, c);
            return "Until" !== a.slice(-5) && (d = c), d && "string" == typeof d && (e = n.filter(d, e)), this.length > 1 && (C[a] || n.unique(e), B.test(a) && e.reverse()), this.pushStack(e)
        }
    });
    var E = /\S+/g, F = {};

    function G(a) {
        var b = F[a] = {};
        return n.each(a.match(E) || [], function (a, c) {
            b[c] = !0
        }), b
    }

    n.Callbacks = function (a) {
        a = "string" == typeof a ? F[a] || G(a) : n.extend({}, a);
        var b, c, d, e, f, g, h = [], i = !a.once && [], j = function (l) {
            for (b = a.memory && l, c = !0, g = e || 0, e = 0, f = h.length, d = !0; h && f > g; g++) {
                if (h[g].apply(l[0], l[1]) === !1 && a.stopOnFalse) {
                    b = !1;
                    break
                }
            }
            d = !1, h && (i ? i.length && j(i.shift()) : b ? h = [] : k.disable())
        }, k = {
            add: function () {
                if (h) {
                    var c = h.length;
                    !function g(b) {
                        n.each(b, function (b, c) {
                            var d = n.type(c);
                            "function" === d ? a.unique && k.has(c) || h.push(c) : c && c.length && "string" !== d && g(c)
                        })
                    }(arguments), d ? f = h.length : b && (e = c, j(b))
                }
                return this
            }, remove: function () {
                return h && n.each(arguments, function (a, b) {
                    var c;
                    while ((c = n.inArray(b, h, c)) > -1) {
                        h.splice(c, 1), d && (f >= c && f--, g >= c && g--)
                    }
                }), this
            }, has: function (a) {
                return a ? n.inArray(a, h) > -1 : !(!h || !h.length)
            }, empty: function () {
                return h = [], f = 0, this
            }, disable: function () {
                return h = i = b = void 0, this
            }, disabled: function () {
                return !h
            }, lock: function () {
                return i = void 0, b || k.disable(), this
            }, locked: function () {
                return !i
            }, fireWith: function (a, b) {
                return !h || c && !i || (b = b || [], b = [a, b.slice ? b.slice() : b], d ? i.push(b) : j(b)), this
            }, fire: function () {
                return k.fireWith(this, arguments), this
            }, fired: function () {
                return !!c
            }
        };
        return k
    }, n.extend({
        Deferred: function (a) {
            var b = [["resolve", "done", n.Callbacks("once memory"), "resolved"], ["reject", "fail", n.Callbacks("once memory"), "rejected"], ["notify", "progress", n.Callbacks("memory")]],
                c = "pending", d = {
                    state: function () {
                        return c
                    }, always: function () {
                        return e.done(arguments).fail(arguments), this
                    }, then: function () {
                        var a = arguments;
                        return n.Deferred(function (c) {
                            n.each(b, function (b, f) {
                                var g = n.isFunction(a[b]) && a[b];
                                e[f[1]](function () {
                                    var a = g && g.apply(this, arguments);
                                    a && n.isFunction(a.promise) ? a.promise().done(c.resolve).fail(c.reject).progress(c.notify) : c[f[0] + "With"](this === d ? c.promise() : this, g ? [a] : arguments)
                                })
                            }), a = null
                        }).promise()
                    }, promise: function (a) {
                        return null != a ? n.extend(a, d) : d
                    }
                }, e = {};
            return d.pipe = d.then, n.each(b, function (a, f) {
                var g = f[2], h = f[3];
                d[f[1]] = g.add, h && g.add(function () {
                    c = h
                }, b[1 ^ a][2].disable, b[2][2].lock), e[f[0]] = function () {
                    return e[f[0] + "With"](this === e ? d : this, arguments), this
                }, e[f[0] + "With"] = g.fireWith
            }), d.promise(e), a && a.call(e, e), e
        }, when: function (a) {
            var b = 0, c = d.call(arguments), e = c.length, f = 1 !== e || a && n.isFunction(a.promise) ? e : 0,
                g = 1 === f ? a : n.Deferred(), h = function (a, b, c) {
                    return function (e) {
                        b[a] = this, c[a] = arguments.length > 1 ? d.call(arguments) : e, c === i ? g.notifyWith(b, c) : --f || g.resolveWith(b, c)
                    }
                }, i, j, k;
            if (e > 1) {
                for (i = new Array(e), j = new Array(e), k = new Array(e); e > b; b++) {
                    c[b] && n.isFunction(c[b].promise) ? c[b].promise().done(h(b, k, c)).fail(g.reject).progress(h(b, j, i)) : --f
                }
            }
            return f || g.resolveWith(k, c), g.promise()
        }
    });
    var H;
    n.fn.ready = function (a) {
        return n.ready.promise().done(a), this
    }, n.extend({
        isReady: !1, readyWait: 1, holdReady: function (a) {
            a ? n.readyWait++ : n.ready(!0)
        }, ready: function (a) {
            (a === !0 ? --n.readyWait : n.isReady) || (n.isReady = !0, a !== !0 && --n.readyWait > 0 || (H.resolveWith(l, [n]), n.fn.triggerHandler && (n(l).triggerHandler("ready"), n(l).off("ready"))))
        }
    });

    function I() {
        l.removeEventListener("DOMContentLoaded", I, !1), a.removeEventListener("load", I, !1), n.ready()
    }

    n.ready.promise = function (b) {
        return H || (H = n.Deferred(), "complete" === l.readyState ? setTimeout(n.ready) : (l.addEventListener("DOMContentLoaded", I, !1), a.addEventListener("load", I, !1))), H.promise(b)
    }, n.ready.promise();
    var J = n.access = function (a, b, c, d, e, f, g) {
        var h = 0, i = a.length, j = null == c;
        if ("object" === n.type(c)) {
            e = !0;
            for (h in c) {
                n.access(a, b, h, c[h], !0, f, g)
            }
        } else {
            if (void 0 !== d && (e = !0, n.isFunction(d) || (g = !0), j && (g ? (b.call(a, d), b = null) : (j = b, b = function (a, b, c) {
                return j.call(n(a), c)
            })), b)) {
                for (; i > h; h++) {
                    b(a[h], c, g ? d : d.call(a[h], h, b(a[h], c)))
                }
            }
        }
        return e ? a : j ? b.call(a) : i ? b(a[0], c) : f
    };
    n.acceptData = function (a) {
        return 1 === a.nodeType || 9 === a.nodeType || !+a.nodeType
    };

    function K() {
        Object.defineProperty(this.cache = {}, 0, {
            get: function () {
                return {}
            }
        }), this.expando = n.expando + Math.random()
    }

    K.uid = 1, K.accepts = n.acceptData, K.prototype = {
        key: function (a) {
            if (!K.accepts(a)) {
                return 0
            }
            var b = {}, c = a[this.expando];
            if (!c) {
                c = K.uid++;
                try {
                    b[this.expando] = {value: c}, Object.defineProperties(a, b)
                } catch (d) {
                    b[this.expando] = c, n.extend(a, b)
                }
            }
            return this.cache[c] || (this.cache[c] = {}), c
        }, set: function (a, b, c) {
            var d, e = this.key(a), f = this.cache[e];
            if ("string" == typeof b) {
                f[b] = c
            } else {
                if (n.isEmptyObject(f)) {
                    n.extend(this.cache[e], b)
                } else {
                    for (d in b) {
                        f[d] = b[d]
                    }
                }
            }
            return f
        }, get: function (a, b) {
            var c = this.cache[this.key(a)];
            return void 0 === b ? c : c[b]
        }, access: function (a, b, c) {
            var d;
            return void 0 === b || b && "string" == typeof b && void 0 === c ? (d = this.get(a, b), void 0 !== d ? d : this.get(a, n.camelCase(b))) : (this.set(a, b, c), void 0 !== c ? c : b)
        }, remove: function (a, b) {
            var c, d, e, f = this.key(a), g = this.cache[f];
            if (void 0 === b) {
                this.cache[f] = {}
            } else {
                n.isArray(b) ? d = b.concat(b.map(n.camelCase)) : (e = n.camelCase(b), b in g ? d = [b, e] : (d = e, d = d in g ? [d] : d.match(E) || [])), c = d.length;
                while (c--) {
                    delete g[d[c]]
                }
            }
        }, hasData: function (a) {
            return !n.isEmptyObject(this.cache[a[this.expando]] || {})
        }, discard: function (a) {
            a[this.expando] && delete this.cache[a[this.expando]]
        }
    };
    var L = new K, M = new K, N = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/, O = /([A-Z])/g;

    function P(a, b, c) {
        var d;
        if (void 0 === c && 1 === a.nodeType) {
            if (d = "data-" + b.replace(O, "-$1").toLowerCase(), c = a.getAttribute(d), "string" == typeof c) {
                try {
                    c = "true" === c ? !0 : "false" === c ? !1 : "null" === c ? null : +c + "" === c ? +c : N.test(c) ? n.parseJSON(c) : c
                } catch (e) {
                }
                M.set(a, b, c)
            } else {
                c = void 0
            }
        }
        return c
    }

    n.extend({
        hasData: function (a) {
            return M.hasData(a) || L.hasData(a)
        }, data: function (a, b, c) {
            return M.access(a, b, c)
        }, removeData: function (a, b) {
            M.remove(a, b)
        }, _data: function (a, b, c) {
            return L.access(a, b, c)
        }, _removeData: function (a, b) {
            L.remove(a, b)
        }
    }), n.fn.extend({
        data: function (a, b) {
            var c, d, e, f = this[0], g = f && f.attributes;
            if (void 0 === a) {
                if (this.length && (e = M.get(f), 1 === f.nodeType && !L.get(f, "hasDataAttrs"))) {
                    c = g.length;
                    while (c--) {
                        g[c] && (d = g[c].name, 0 === d.indexOf("data-") && (d = n.camelCase(d.slice(5)), P(f, d, e[d])))
                    }
                    L.set(f, "hasDataAttrs", !0)
                }
                return e
            }
            return "object" == typeof a ? this.each(function () {
                M.set(this, a)
            }) : J(this, function (b) {
                var c, d = n.camelCase(a);
                if (f && void 0 === b) {
                    if (c = M.get(f, a), void 0 !== c) {
                        return c
                    }
                    if (c = M.get(f, d), void 0 !== c) {
                        return c
                    }
                    if (c = P(f, d, void 0), void 0 !== c) {
                        return c
                    }
                } else {
                    this.each(function () {
                        var c = M.get(this, d);
                        M.set(this, d, b), -1 !== a.indexOf("-") && void 0 !== c && M.set(this, a, b)
                    })
                }
            }, null, b, arguments.length > 1, null, !0)
        }, removeData: function (a) {
            return this.each(function () {
                M.remove(this, a)
            })
        }
    }), n.extend({
        queue: function (a, b, c) {
            var d;
            return a ? (b = (b || "fx") + "queue", d = L.get(a, b), c && (!d || n.isArray(c) ? d = L.access(a, b, n.makeArray(c)) : d.push(c)), d || []) : void 0
        }, dequeue: function (a, b) {
            b = b || "fx";
            var c = n.queue(a, b), d = c.length, e = c.shift(), f = n._queueHooks(a, b), g = function () {
                n.dequeue(a, b)
            };
            "inprogress" === e && (e = c.shift(), d--), e && ("fx" === b && c.unshift("inprogress"), delete f.stop, e.call(a, g, f)), !d && f && f.empty.fire()
        }, _queueHooks: function (a, b) {
            var c = b + "queueHooks";
            return L.get(a, c) || L.access(a, c, {
                empty: n.Callbacks("once memory").add(function () {
                    L.remove(a, [b + "queue", c])
                })
            })
        }
    }), n.fn.extend({
        queue: function (a, b) {
            var c = 2;
            return "string" != typeof a && (b = a, a = "fx", c--), arguments.length < c ? n.queue(this[0], a) : void 0 === b ? this : this.each(function () {
                var c = n.queue(this, a, b);
                n._queueHooks(this, a), "fx" === a && "inprogress" !== c[0] && n.dequeue(this, a)
            })
        }, dequeue: function (a) {
            return this.each(function () {
                n.dequeue(this, a)
            })
        }, clearQueue: function (a) {
            return this.queue(a || "fx", [])
        }, promise: function (a, b) {
            var c, d = 1, e = n.Deferred(), f = this, g = this.length, h = function () {
                --d || e.resolveWith(f, [f])
            };
            "string" != typeof a && (b = a, a = void 0), a = a || "fx";
            while (g--) {
                c = L.get(f[g], a + "queueHooks"), c && c.empty && (d++, c.empty.add(h))
            }
            return h(), e.promise(b)
        }
    });
    var Q = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source, R = ["Top", "Right", "Bottom", "Left"], S = function (a, b) {
        return a = b || a, "none" === n.css(a, "display") || !n.contains(a.ownerDocument, a)
    }, T = /^(?:checkbox|radio)$/i;
    !function () {
        var a = l.createDocumentFragment(), b = a.appendChild(l.createElement("div")), c = l.createElement("input");
        c.setAttribute("type", "radio"), c.setAttribute("checked", "checked"), c.setAttribute("name", "t"), b.appendChild(c), k.checkClone = b.cloneNode(!0).cloneNode(!0).lastChild.checked, b.innerHTML = "<textarea>x</textarea>", k.noCloneChecked = !!b.cloneNode(!0).lastChild.defaultValue
    }();
    var U = "undefined";
    k.focusinBubbles = "onfocusin" in a;
    var V = /^key/, W = /^(?:mouse|pointer|contextmenu)|click/, X = /^(?:focusinfocus|focusoutblur)$/,
        Y = /^([^.]*)(?:\.(.+)|)$/;

    function Z() {
        return !0
    }

    function $() {
        return !1
    }

    function _() {
        try {
            return l.activeElement
        } catch (a) {
        }
    }

    n.event = {
        global: {},
        add: function (a, b, c, d, e) {
            var f, g, h, i, j, k, l, m, o, p, q, r = L.get(a);
            if (r) {
                c.handler && (f = c, c = f.handler, e = f.selector), c.guid || (c.guid = n.guid++), (i = r.events) || (i = r.events = {}), (g = r.handle) || (g = r.handle = function (b) {
                    return typeof n !== U && n.event.triggered !== b.type ? n.event.dispatch.apply(a, arguments) : void 0
                }), b = (b || "").match(E) || [""], j = b.length;
                while (j--) {
                    h = Y.exec(b[j]) || [], o = q = h[1], p = (h[2] || "").split(".").sort(), o && (l = n.event.special[o] || {}, o = (e ? l.delegateType : l.bindType) || o, l = n.event.special[o] || {}, k = n.extend({
                        type: o,
                        origType: q,
                        data: d,
                        handler: c,
                        guid: c.guid,
                        selector: e,
                        needsContext: e && n.expr.match.needsContext.test(e),
                        namespace: p.join(".")
                    }, f), (m = i[o]) || (m = i[o] = [], m.delegateCount = 0, l.setup && l.setup.call(a, d, p, g) !== !1 || a.addEventListener && a.addEventListener(o, g, !1)), l.add && (l.add.call(a, k), k.handler.guid || (k.handler.guid = c.guid)), e ? m.splice(m.delegateCount++, 0, k) : m.push(k), n.event.global[o] = !0)
                }
            }
        },
        remove: function (a, b, c, d, e) {
            var f, g, h, i, j, k, l, m, o, p, q, r = L.hasData(a) && L.get(a);
            if (r && (i = r.events)) {
                b = (b || "").match(E) || [""], j = b.length;
                while (j--) {
                    if (h = Y.exec(b[j]) || [], o = q = h[1], p = (h[2] || "").split(".").sort(), o) {
                        l = n.event.special[o] || {}, o = (d ? l.delegateType : l.bindType) || o, m = i[o] || [], h = h[2] && new RegExp("(^|\\.)" + p.join("\\.(?:.*\\.|)") + "(\\.|$)"), g = f = m.length;
                        while (f--) {
                            k = m[f], !e && q !== k.origType || c && c.guid !== k.guid || h && !h.test(k.namespace) || d && d !== k.selector && ("**" !== d || !k.selector) || (m.splice(f, 1), k.selector && m.delegateCount--, l.remove && l.remove.call(a, k))
                        }
                        g && !m.length && (l.teardown && l.teardown.call(a, p, r.handle) !== !1 || n.removeEvent(a, o, r.handle), delete i[o])
                    } else {
                        for (o in i) {
                            n.event.remove(a, o + b[j], c, d, !0)
                        }
                    }
                }
                n.isEmptyObject(i) && (delete r.handle, L.remove(a, "events"))
            }
        },
        trigger: function (b, c, d, e) {
            var f, g, h, i, k, m, o, p = [d || l], q = j.call(b, "type") ? b.type : b,
                r = j.call(b, "namespace") ? b.namespace.split(".") : [];
            if (g = h = d = d || l, 3 !== d.nodeType && 8 !== d.nodeType && !X.test(q + n.event.triggered) && (q.indexOf(".") >= 0 && (r = q.split("."), q = r.shift(), r.sort()), k = q.indexOf(":") < 0 && "on" + q, b = b[n.expando] ? b : new n.Event(q, "object" == typeof b && b), b.isTrigger = e ? 2 : 3, b.namespace = r.join("."), b.namespace_re = b.namespace ? new RegExp("(^|\\.)" + r.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, b.result = void 0, b.target || (b.target = d), c = null == c ? [b] : n.makeArray(c, [b]), o = n.event.special[q] || {}, e || !o.trigger || o.trigger.apply(d, c) !== !1)) {
                if (!e && !o.noBubble && !n.isWindow(d)) {
                    for (i = o.delegateType || q, X.test(i + q) || (g = g.parentNode); g; g = g.parentNode) {
                        p.push(g), h = g
                    }
                    h === (d.ownerDocument || l) && p.push(h.defaultView || h.parentWindow || a)
                }
                f = 0;
                while ((g = p[f++]) && !b.isPropagationStopped()) {
                    b.type = f > 1 ? i : o.bindType || q, m = (L.get(g, "events") || {})[b.type] && L.get(g, "handle"), m && m.apply(g, c), m = k && g[k], m && m.apply && n.acceptData(g) && (b.result = m.apply(g, c), b.result === !1 && b.preventDefault())
                }
                return b.type = q, e || b.isDefaultPrevented() || o._default && o._default.apply(p.pop(), c) !== !1 || !n.acceptData(d) || k && n.isFunction(d[q]) && !n.isWindow(d) && (h = d[k], h && (d[k] = null), n.event.triggered = q, d[q](), n.event.triggered = void 0, h && (d[k] = h)), b.result
            }
        },
        dispatch: function (a) {
            a = n.event.fix(a);
            var b, c, e, f, g, h = [], i = d.call(arguments), j = (L.get(this, "events") || {})[a.type] || [],
                k = n.event.special[a.type] || {};
            if (i[0] = a, a.delegateTarget = this, !k.preDispatch || k.preDispatch.call(this, a) !== !1) {
                h = n.event.handlers.call(this, a, j), b = 0;
                while ((f = h[b++]) && !a.isPropagationStopped()) {
                    a.currentTarget = f.elem, c = 0;
                    while ((g = f.handlers[c++]) && !a.isImmediatePropagationStopped()) {
                        (!a.namespace_re || a.namespace_re.test(g.namespace)) && (a.handleObj = g, a.data = g.data, e = ((n.event.special[g.origType] || {}).handle || g.handler).apply(f.elem, i), void 0 !== e && (a.result = e) === !1 && (a.preventDefault(), a.stopPropagation()))
                    }
                }
                return k.postDispatch && k.postDispatch.call(this, a), a.result
            }
        },
        handlers: function (a, b) {
            var c, d, e, f, g = [], h = b.delegateCount, i = a.target;
            if (h && i.nodeType && (!a.button || "click" !== a.type)) {
                for (; i !== this; i = i.parentNode || this) {
                    if (i.disabled !== !0 || "click" !== a.type) {
                        for (d = [], c = 0; h > c; c++) {
                            f = b[c], e = f.selector + " ", void 0 === d[e] && (d[e] = f.needsContext ? n(e, this).index(i) >= 0 : n.find(e, this, null, [i]).length), d[e] && d.push(f)
                        }
                        d.length && g.push({elem: i, handlers: d})
                    }
                }
            }
            return h < b.length && g.push({elem: this, handlers: b.slice(h)}), g
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "), filter: function (a, b) {
                return null == a.which && (a.which = null != b.charCode ? b.charCode : b.keyCode), a
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
            filter: function (a, b) {
                var c, d, e, f = b.button;
                return null == a.pageX && null != b.clientX && (c = a.target.ownerDocument || l, d = c.documentElement, e = c.body, a.pageX = b.clientX + (d && d.scrollLeft || e && e.scrollLeft || 0) - (d && d.clientLeft || e && e.clientLeft || 0), a.pageY = b.clientY + (d && d.scrollTop || e && e.scrollTop || 0) - (d && d.clientTop || e && e.clientTop || 0)), a.which || void 0 === f || (a.which = 1 & f ? 1 : 2 & f ? 3 : 4 & f ? 2 : 0), a
            }
        },
        fix: function (a) {
            if (a[n.expando]) {
                return a
            }
            var b, c, d, e = a.type, f = a, g = this.fixHooks[e];
            g || (this.fixHooks[e] = g = W.test(e) ? this.mouseHooks : V.test(e) ? this.keyHooks : {}), d = g.props ? this.props.concat(g.props) : this.props, a = new n.Event(f), b = d.length;
            while (b--) {
                c = d[b], a[c] = f[c]
            }
            return a.target || (a.target = l), 3 === a.target.nodeType && (a.target = a.target.parentNode), g.filter ? g.filter(a, f) : a
        },
        special: {
            load: {noBubble: !0}, focus: {
                trigger: function () {
                    return this !== _() && this.focus ? (this.focus(), !1) : void 0
                }, delegateType: "focusin"
            }, blur: {
                trigger: function () {
                    return this === _() && this.blur ? (this.blur(), !1) : void 0
                }, delegateType: "focusout"
            }, click: {
                trigger: function () {
                    return "checkbox" === this.type && this.click && n.nodeName(this, "input") ? (this.click(), !1) : void 0
                }, _default: function (a) {
                    return n.nodeName(a.target, "a")
                }
            }, beforeunload: {
                postDispatch: function (a) {
                    void 0 !== a.result && a.originalEvent && (a.originalEvent.returnValue = a.result)
                }
            }
        },
        simulate: function (a, b, c, d) {
            var e = n.extend(new n.Event, c, {type: a, isSimulated: !0, originalEvent: {}});
            d ? n.event.trigger(e, null, b) : n.event.dispatch.call(b, e), e.isDefaultPrevented() && c.preventDefault()
        }
    }, n.removeEvent = function (a, b, c) {
        a.removeEventListener && a.removeEventListener(b, c, !1)
    }, n.Event = function (a, b) {
        return this instanceof n.Event ? (a && a.type ? (this.originalEvent = a, this.type = a.type, this.isDefaultPrevented = a.defaultPrevented || void 0 === a.defaultPrevented && a.returnValue === !1 ? Z : $) : this.type = a, b && n.extend(this, b), this.timeStamp = a && a.timeStamp || n.now(), void (this[n.expando] = !0)) : new n.Event(a, b)
    }, n.Event.prototype = {
        isDefaultPrevented: $,
        isPropagationStopped: $,
        isImmediatePropagationStopped: $,
        preventDefault: function () {
            var a = this.originalEvent;
            this.isDefaultPrevented = Z, a && a.preventDefault && a.preventDefault()
        },
        stopPropagation: function () {
            var a = this.originalEvent;
            this.isPropagationStopped = Z, a && a.stopPropagation && a.stopPropagation()
        },
        stopImmediatePropagation: function () {
            var a = this.originalEvent;
            this.isImmediatePropagationStopped = Z, a && a.stopImmediatePropagation && a.stopImmediatePropagation(), this.stopPropagation()
        }
    }, n.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout",
        pointerenter: "pointerover",
        pointerleave: "pointerout"
    }, function (a, b) {
        n.event.special[a] = {
            delegateType: b, bindType: b, handle: function (a) {
                var c, d = this, e = a.relatedTarget, f = a.handleObj;
                return (!e || e !== d && !n.contains(d, e)) && (a.type = f.origType, c = f.handler.apply(this, arguments), a.type = b), c
            }
        }
    }), k.focusinBubbles || n.each({focus: "focusin", blur: "focusout"}, function (a, b) {
        var c = function (a) {
            n.event.simulate(b, a.target, n.event.fix(a), !0)
        };
        n.event.special[b] = {
            setup: function () {
                var d = this.ownerDocument || this, e = L.access(d, b);
                e || d.addEventListener(a, c, !0), L.access(d, b, (e || 0) + 1)
            }, teardown: function () {
                var d = this.ownerDocument || this, e = L.access(d, b) - 1;
                e ? L.access(d, b, e) : (d.removeEventListener(a, c, !0), L.remove(d, b))
            }
        }
    }), n.fn.extend({
        on: function (a, b, c, d, e) {
            var f, g;
            if ("object" == typeof a) {
                "string" != typeof b && (c = c || b, b = void 0);
                for (g in a) {
                    this.on(g, b, c, a[g], e)
                }
                return this
            }
            if (null == c && null == d ? (d = b, c = b = void 0) : null == d && ("string" == typeof b ? (d = c, c = void 0) : (d = c, c = b, b = void 0)), d === !1) {
                d = $
            } else {
                if (!d) {
                    return this
                }
            }
            return 1 === e && (f = d, d = function (a) {
                return n().off(a), f.apply(this, arguments)
            }, d.guid = f.guid || (f.guid = n.guid++)), this.each(function () {
                n.event.add(this, a, d, c, b)
            })
        }, one: function (a, b, c, d) {
            return this.on(a, b, c, d, 1)
        }, off: function (a, b, c) {
            var d, e;
            if (a && a.preventDefault && a.handleObj) {
                return d = a.handleObj, n(a.delegateTarget).off(d.namespace ? d.origType + "." + d.namespace : d.origType, d.selector, d.handler), this
            }
            if ("object" == typeof a) {
                for (e in a) {
                    this.off(e, b, a[e])
                }
                return this
            }
            return (b === !1 || "function" == typeof b) && (c = b, b = void 0), c === !1 && (c = $), this.each(function () {
                n.event.remove(this, a, c, b)
            })
        }, trigger: function (a, b) {
            return this.each(function () {
                n.event.trigger(a, b, this)
            })
        }, triggerHandler: function (a, b) {
            var c = this[0];
            return c ? n.event.trigger(a, b, c, !0) : void 0
        }
    });
    var ab = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi, bb = /<([\w:]+)/,
        cb = /<|&#?\w+;/, db = /<(?:script|style|link)/i, eb = /checked\s*(?:[^=]|=\s*.checked.)/i,
        fb = /^$|\/(?:java|ecma)script/i, gb = /^true\/(.*)/, hb = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g, ib = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            thead: [1, "<table>", "</table>"],
            col: [2, "<table><colgroup>", "</colgroup></table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            _default: [0, "", ""]
        };
    ib.optgroup = ib.option, ib.tbody = ib.tfoot = ib.colgroup = ib.caption = ib.thead, ib.th = ib.td;

    function jb(a, b) {
        return n.nodeName(a, "table") && n.nodeName(11 !== b.nodeType ? b : b.firstChild, "tr") ? a.getElementsByTagName("tbody")[0] || a.appendChild(a.ownerDocument.createElement("tbody")) : a
    }

    function kb(a) {
        return a.type = (null !== a.getAttribute("type")) + "/" + a.type, a
    }

    function lb(a) {
        var b = gb.exec(a.type);
        return b ? a.type = b[1] : a.removeAttribute("type"), a
    }

    function mb(a, b) {
        for (var c = 0, d = a.length; d > c; c++) {
            L.set(a[c], "globalEval", !b || L.get(b[c], "globalEval"))
        }
    }

    function nb(a, b) {
        var c, d, e, f, g, h, i, j;
        if (1 === b.nodeType) {
            if (L.hasData(a) && (f = L.access(a), g = L.set(b, f), j = f.events)) {
                delete g.handle, g.events = {};
                for (e in j) {
                    for (c = 0, d = j[e].length; d > c; c++) {
                        n.event.add(b, e, j[e][c])
                    }
                }
            }
            M.hasData(a) && (h = M.access(a), i = n.extend({}, h), M.set(b, i))
        }
    }

    function ob(a, b) {
        var c = a.getElementsByTagName ? a.getElementsByTagName(b || "*") : a.querySelectorAll ? a.querySelectorAll(b || "*") : [];
        return void 0 === b || b && n.nodeName(a, b) ? n.merge([a], c) : c
    }

    function pb(a, b) {
        var c = b.nodeName.toLowerCase();
        "input" === c && T.test(a.type) ? b.checked = a.checked : ("input" === c || "textarea" === c) && (b.defaultValue = a.defaultValue)
    }

    n.extend({
        clone: function (a, b, c) {
            var d, e, f, g, h = a.cloneNode(!0), i = n.contains(a.ownerDocument, a);
            if (!(k.noCloneChecked || 1 !== a.nodeType && 11 !== a.nodeType || n.isXMLDoc(a))) {
                for (g = ob(h), f = ob(a), d = 0, e = f.length; e > d; d++) {
                    pb(f[d], g[d])
                }
            }
            if (b) {
                if (c) {
                    for (f = f || ob(a), g = g || ob(h), d = 0, e = f.length; e > d; d++) {
                        nb(f[d], g[d])
                    }
                } else {
                    nb(a, h)
                }
            }
            return g = ob(h, "script"), g.length > 0 && mb(g, !i && ob(a, "script")), h
        }, buildFragment: function (a, b, c, d) {
            for (var e, f, g, h, i, j, k = b.createDocumentFragment(), l = [], m = 0, o = a.length; o > m; m++) {
                if (e = a[m], e || 0 === e) {
                    if ("object" === n.type(e)) {
                        n.merge(l, e.nodeType ? [e] : e)
                    } else {
                        if (cb.test(e)) {
                            f = f || k.appendChild(b.createElement("div")), g = (bb.exec(e) || ["", ""])[1].toLowerCase(), h = ib[g] || ib._default, f.innerHTML = h[1] + e.replace(ab, "<$1></$2>") + h[2], j = h[0];
                            while (j--) {
                                f = f.lastChild
                            }
                            n.merge(l, f.childNodes), f = k.firstChild, f.textContent = ""
                        } else {
                            l.push(b.createTextNode(e))
                        }
                    }
                }
            }
            k.textContent = "", m = 0;
            while (e = l[m++]) {
                if ((!d || -1 === n.inArray(e, d)) && (i = n.contains(e.ownerDocument, e), f = ob(k.appendChild(e), "script"), i && mb(f), c)) {
                    j = 0;
                    while (e = f[j++]) {
                        fb.test(e.type || "") && c.push(e)
                    }
                }
            }
            return k
        }, cleanData: function (a) {
            for (var b, c, d, e, f = n.event.special, g = 0; void 0 !== (c = a[g]); g++) {
                if (n.acceptData(c) && (e = c[L.expando], e && (b = L.cache[e]))) {
                    if (b.events) {
                        for (d in b.events) {
                            f[d] ? n.event.remove(c, d) : n.removeEvent(c, d, b.handle)
                        }
                    }
                    L.cache[e] && delete L.cache[e]
                }
                delete M.cache[c[M.expando]]
            }
        }
    }), n.fn.extend({
        text: function (a) {
            return J(this, function (a) {
                return void 0 === a ? n.text(this) : this.empty().each(function () {
                    (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) && (this.textContent = a)
                })
            }, null, a, arguments.length)
        }, append: function () {
            return this.domManip(arguments, function (a) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var b = jb(this, a);
                    b.appendChild(a)
                }
            })
        }, prepend: function () {
            return this.domManip(arguments, function (a) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var b = jb(this, a);
                    b.insertBefore(a, b.firstChild)
                }
            })
        }, before: function () {
            return this.domManip(arguments, function (a) {
                this.parentNode && this.parentNode.insertBefore(a, this)
            })
        }, after: function () {
            return this.domManip(arguments, function (a) {
                this.parentNode && this.parentNode.insertBefore(a, this.nextSibling)
            })
        }, remove: function (a, b) {
            for (var c, d = a ? n.filter(a, this) : this, e = 0; null != (c = d[e]); e++) {
                b || 1 !== c.nodeType || n.cleanData(ob(c)), c.parentNode && (b && n.contains(c.ownerDocument, c) && mb(ob(c, "script")), c.parentNode.removeChild(c))
            }
            return this
        }, empty: function () {
            for (var a, b = 0; null != (a = this[b]); b++) {
                1 === a.nodeType && (n.cleanData(ob(a, !1)), a.textContent = "")
            }
            return this
        }, clone: function (a, b) {
            return a = null == a ? !1 : a, b = null == b ? a : b, this.map(function () {
                return n.clone(this, a, b)
            })
        }, html: function (a) {
            return J(this, function (a) {
                var b = this[0] || {}, c = 0, d = this.length;
                if (void 0 === a && 1 === b.nodeType) {
                    return b.innerHTML
                }
                if ("string" == typeof a && !db.test(a) && !ib[(bb.exec(a) || ["", ""])[1].toLowerCase()]) {
                    a = a.replace(ab, "<$1></$2>");
                    try {
                        for (; d > c; c++) {
                            b = this[c] || {}, 1 === b.nodeType && (n.cleanData(ob(b, !1)), b.innerHTML = a)
                        }
                        b = 0
                    } catch (e) {
                    }
                }
                b && this.empty().append(a)
            }, null, a, arguments.length)
        }, replaceWith: function () {
            var a = arguments[0];
            return this.domManip(arguments, function (b) {
                a = this.parentNode, n.cleanData(ob(this)), a && a.replaceChild(b, this)
            }), a && (a.length || a.nodeType) ? this : this.remove()
        }, detach: function (a) {
            return this.remove(a, !0)
        }, domManip: function (a, b) {
            a = e.apply([], a);
            var c, d, f, g, h, i, j = 0, l = this.length, m = this, o = l - 1, p = a[0], q = n.isFunction(p);
            if (q || l > 1 && "string" == typeof p && !k.checkClone && eb.test(p)) {
                return this.each(function (c) {
                    var d = m.eq(c);
                    q && (a[0] = p.call(this, c, d.html())), d.domManip(a, b)
                })
            }
            if (l && (c = n.buildFragment(a, this[0].ownerDocument, !1, this), d = c.firstChild, 1 === c.childNodes.length && (c = d), d)) {
                for (f = n.map(ob(c, "script"), kb), g = f.length; l > j; j++) {
                    h = c, j !== o && (h = n.clone(h, !0, !0), g && n.merge(f, ob(h, "script"))), b.call(this[j], h, j)
                }
                if (g) {
                    for (i = f[f.length - 1].ownerDocument, n.map(f, lb), j = 0; g > j; j++) {
                        h = f[j], fb.test(h.type || "") && !L.access(h, "globalEval") && n.contains(i, h) && (h.src ? n._evalUrl && n._evalUrl(h.src) : n.globalEval(h.textContent.replace(hb, "")))
                    }
                }
            }
            return this
        }
    }), n.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function (a, b) {
        n.fn[a] = function (a) {
            for (var c, d = [], e = n(a), g = e.length - 1, h = 0; g >= h; h++) {
                c = h === g ? this : this.clone(!0), n(e[h])[b](c), f.apply(d, c.get())
            }
            return this.pushStack(d)
        }
    });
    var qb, rb = {};

    function sb(b, c) {
        var d, e = n(c.createElement(b)).appendTo(c.body),
            f = a.getDefaultComputedStyle && (d = a.getDefaultComputedStyle(e[0])) ? d.display : n.css(e[0], "display");
        return e.detach(), f
    }

    function tb(a) {
        var b = l, c = rb[a];
        return c || (c = sb(a, b), "none" !== c && c || (qb = (qb || n("<iframe frameborder='0' width='0' height='0'/>")).appendTo(b.documentElement), b = qb[0].contentDocument, b.write(), b.close(), c = sb(a, b), qb.detach()), rb[a] = c), c
    }

    var ub = /^margin/, vb = new RegExp("^(" + Q + ")(?!px)[a-z%]+$", "i"), wb = function (a) {
        return a.ownerDocument.defaultView.getComputedStyle(a, null)
    };

    function xb(a, b, c) {
        var d, e, f, g, h = a.style;
        return c = c || wb(a), c && (g = c.getPropertyValue(b) || c[b]), c && ("" !== g || n.contains(a.ownerDocument, a) || (g = n.style(a, b)), vb.test(g) && ub.test(b) && (d = h.width, e = h.minWidth, f = h.maxWidth, h.minWidth = h.maxWidth = h.width = g, g = c.width, h.width = d, h.minWidth = e, h.maxWidth = f)), void 0 !== g ? g + "" : g
    }

    function yb(a, b) {
        return {
            get: function () {
                return a() ? void delete this.get : (this.get = b).apply(this, arguments)
            }
        }
    }

    !function () {
        var b, c, d = l.documentElement, e = l.createElement("div"), f = l.createElement("div");
        if (f.style) {
            f.style.backgroundClip = "content-box", f.cloneNode(!0).style.backgroundClip = "", k.clearCloneStyle = "content-box" === f.style.backgroundClip, e.style.cssText = "border:0;width:0;height:0;top:0;left:-9999px;margin-top:1px;position:absolute", e.appendChild(f);

            function g() {
                f.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute", f.innerHTML = "", d.appendChild(e);
                var g = a.getComputedStyle(f, null);
                b = "1%" !== g.top, c = "4px" === g.width, d.removeChild(e)
            }

            a.getComputedStyle && n.extend(k, {
                pixelPosition: function () {
                    return g(), b
                }, boxSizingReliable: function () {
                    return null == c && g(), c
                }, reliableMarginRight: function () {
                    var b, c = f.appendChild(l.createElement("div"));
                    return c.style.cssText = f.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0", c.style.marginRight = c.style.width = "0", f.style.width = "1px", d.appendChild(e), b = !parseFloat(a.getComputedStyle(c, null).marginRight), d.removeChild(e), b
                }
            })
        }
    }(), n.swap = function (a, b, c, d) {
        var e, f, g = {};
        for (f in b) {
            g[f] = a.style[f], a.style[f] = b[f]
        }
        e = c.apply(a, d || []);
        for (f in b) {
            a.style[f] = g[f]
        }
        return e
    };
    var zb = /^(none|table(?!-c[ea]).+)/, Ab = new RegExp("^(" + Q + ")(.*)$", "i"),
        Bb = new RegExp("^([+-])=(" + Q + ")", "i"),
        Cb = {position: "absolute", visibility: "hidden", display: "block"},
        Db = {letterSpacing: "0", fontWeight: "400"}, Eb = ["Webkit", "O", "Moz", "ms"];

    function Fb(a, b) {
        if (b in a) {
            return b
        }
        var c = b[0].toUpperCase() + b.slice(1), d = b, e = Eb.length;
        while (e--) {
            if (b = Eb[e] + c, b in a) {
                return b
            }
        }
        return d
    }

    function Gb(a, b, c) {
        var d = Ab.exec(b);
        return d ? Math.max(0, d[1] - (c || 0)) + (d[2] || "px") : b
    }

    function Hb(a, b, c, d, e) {
        for (var f = c === (d ? "border" : "content") ? 4 : "width" === b ? 1 : 0, g = 0; 4 > f; f += 2) {
            "margin" === c && (g += n.css(a, c + R[f], !0, e)), d ? ("content" === c && (g -= n.css(a, "padding" + R[f], !0, e)), "margin" !== c && (g -= n.css(a, "border" + R[f] + "Width", !0, e))) : (g += n.css(a, "padding" + R[f], !0, e), "padding" !== c && (g += n.css(a, "border" + R[f] + "Width", !0, e)))
        }
        return g
    }

    function Ib(a, b, c) {
        var d = !0, e = "width" === b ? a.offsetWidth : a.offsetHeight, f = wb(a),
            g = "border-box" === n.css(a, "boxSizing", !1, f);
        if (0 >= e || null == e) {
            if (e = xb(a, b, f), (0 > e || null == e) && (e = a.style[b]), vb.test(e)) {
                return e
            }
            d = g && (k.boxSizingReliable() || e === a.style[b]), e = parseFloat(e) || 0
        }
        return e + Hb(a, b, c || (g ? "border" : "content"), d, f) + "px"
    }

    function Jb(a, b) {
        for (var c, d, e, f = [], g = 0, h = a.length; h > g; g++) {
            d = a[g], d.style && (f[g] = L.get(d, "olddisplay"), c = d.style.display, b ? (f[g] || "none" !== c || (d.style.display = ""), "" === d.style.display && S(d) && (f[g] = L.access(d, "olddisplay", tb(d.nodeName)))) : (e = S(d), "none" === c && e || L.set(d, "olddisplay", e ? c : n.css(d, "display"))))
        }
        for (g = 0; h > g; g++) {
            d = a[g], d.style && (b && "none" !== d.style.display && "" !== d.style.display || (d.style.display = b ? f[g] || "" : "none"))
        }
        return a
    }

    n.extend({
        cssHooks: {
            opacity: {
                get: function (a, b) {
                    if (b) {
                        var c = xb(a, "opacity");
                        return "" === c ? "1" : c
                    }
                }
            }
        },
        cssNumber: {
            columnCount: !0,
            fillOpacity: !0,
            flexGrow: !0,
            flexShrink: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {"float": "cssFloat"},
        style: function (a, b, c, d) {
            if (a && 3 !== a.nodeType && 8 !== a.nodeType && a.style) {
                var e, f, g, h = n.camelCase(b), i = a.style;
                return b = n.cssProps[h] || (n.cssProps[h] = Fb(i, h)), g = n.cssHooks[b] || n.cssHooks[h], void 0 === c ? g && "get" in g && void 0 !== (e = g.get(a, !1, d)) ? e : i[b] : (f = typeof c, "string" === f && (e = Bb.exec(c)) && (c = (e[1] + 1) * e[2] + parseFloat(n.css(a, b)), f = "number"), null != c && c === c && ("number" !== f || n.cssNumber[h] || (c += "px"), k.clearCloneStyle || "" !== c || 0 !== b.indexOf("background") || (i[b] = "inherit"), g && "set" in g && void 0 === (c = g.set(a, c, d)) || (i[b] = c)), void 0)
            }
        },
        css: function (a, b, c, d) {
            var e, f, g, h = n.camelCase(b);
            return b = n.cssProps[h] || (n.cssProps[h] = Fb(a.style, h)), g = n.cssHooks[b] || n.cssHooks[h], g && "get" in g && (e = g.get(a, !0, c)), void 0 === e && (e = xb(a, b, d)), "normal" === e && b in Db && (e = Db[b]), "" === c || c ? (f = parseFloat(e), c === !0 || n.isNumeric(f) ? f || 0 : e) : e
        }
    }), n.each(["height", "width"], function (a, b) {
        n.cssHooks[b] = {
            get: function (a, c, d) {
                return c ? zb.test(n.css(a, "display")) && 0 === a.offsetWidth ? n.swap(a, Cb, function () {
                    return Ib(a, b, d)
                }) : Ib(a, b, d) : void 0
            }, set: function (a, c, d) {
                var e = d && wb(a);
                return Gb(a, c, d ? Hb(a, b, d, "border-box" === n.css(a, "boxSizing", !1, e), e) : 0)
            }
        }
    }), n.cssHooks.marginRight = yb(k.reliableMarginRight, function (a, b) {
        return b ? n.swap(a, {display: "inline-block"}, xb, [a, "marginRight"]) : void 0
    }), n.each({margin: "", padding: "", border: "Width"}, function (a, b) {
        n.cssHooks[a + b] = {
            expand: function (c) {
                for (var d = 0, e = {}, f = "string" == typeof c ? c.split(" ") : [c]; 4 > d; d++) {
                    e[a + R[d] + b] = f[d] || f[d - 2] || f[0]
                }
                return e
            }
        }, ub.test(a) || (n.cssHooks[a + b].set = Gb)
    }), n.fn.extend({
        css: function (a, b) {
            return J(this, function (a, b, c) {
                var d, e, f = {}, g = 0;
                if (n.isArray(b)) {
                    for (d = wb(a), e = b.length; e > g; g++) {
                        f[b[g]] = n.css(a, b[g], !1, d)
                    }
                    return f
                }
                return void 0 !== c ? n.style(a, b, c) : n.css(a, b)
            }, a, b, arguments.length > 1)
        }, show: function () {
            return Jb(this, !0)
        }, hide: function () {
            return Jb(this)
        }, toggle: function (a) {
            return "boolean" == typeof a ? a ? this.show() : this.hide() : this.each(function () {
                S(this) ? n(this).show() : n(this).hide()
            })
        }
    });

    function Kb(a, b, c, d, e) {
        return new Kb.prototype.init(a, b, c, d, e)
    }

    n.Tween = Kb, Kb.prototype = {
        constructor: Kb, init: function (a, b, c, d, e, f) {
            this.elem = a, this.prop = c, this.easing = e || "swing", this.options = b, this.start = this.now = this.cur(), this.end = d, this.unit = f || (n.cssNumber[c] ? "" : "px")
        }, cur: function () {
            var a = Kb.propHooks[this.prop];
            return a && a.get ? a.get(this) : Kb.propHooks._default.get(this)
        }, run: function (a) {
            var b, c = Kb.propHooks[this.prop];
            return this.pos = b = this.options.duration ? n.easing[this.easing](a, this.options.duration * a, 0, 1, this.options.duration) : a, this.now = (this.end - this.start) * b + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), c && c.set ? c.set(this) : Kb.propHooks._default.set(this), this
        }
    }, Kb.prototype.init.prototype = Kb.prototype, Kb.propHooks = {
        _default: {
            get: function (a) {
                var b;
                return null == a.elem[a.prop] || a.elem.style && null != a.elem.style[a.prop] ? (b = n.css(a.elem, a.prop, ""), b && "auto" !== b ? b : 0) : a.elem[a.prop]
            }, set: function (a) {
                n.fx.step[a.prop] ? n.fx.step[a.prop](a) : a.elem.style && (null != a.elem.style[n.cssProps[a.prop]] || n.cssHooks[a.prop]) ? n.style(a.elem, a.prop, a.now + a.unit) : a.elem[a.prop] = a.now
            }
        }
    }, Kb.propHooks.scrollTop = Kb.propHooks.scrollLeft = {
        set: function (a) {
            a.elem.nodeType && a.elem.parentNode && (a.elem[a.prop] = a.now)
        }
    }, n.easing = {
        linear: function (a) {
            return a
        }, swing: function (a) {
            return 0.5 - Math.cos(a * Math.PI) / 2
        }
    }, n.fx = Kb.prototype.init, n.fx.step = {};
    var Lb, Mb, Nb = /^(?:toggle|show|hide)$/, Ob = new RegExp("^(?:([+-])=|)(" + Q + ")([a-z%]*)$", "i"),
        Pb = /queueHooks$/, Qb = [Vb], Rb = {
            "*": [function (a, b) {
                var c = this.createTween(a, b), d = c.cur(), e = Ob.exec(b), f = e && e[3] || (n.cssNumber[a] ? "" : "px"),
                    g = (n.cssNumber[a] || "px" !== f && +d) && Ob.exec(n.css(c.elem, a)), h = 1, i = 20;
                if (g && g[3] !== f) {
                    f = f || g[3], e = e || [], g = +d || 1;
                    do {
                        h = h || ".5", g /= h, n.style(c.elem, a, g + f)
                    } while (h !== (h = c.cur() / d) && 1 !== h && --i)
                }
                return e && (g = c.start = +g || +d || 0, c.unit = f, c.end = e[1] ? g + (e[1] + 1) * e[2] : +e[2]), c
            }]
        };

    function Sb() {
        return setTimeout(function () {
            Lb = void 0
        }), Lb = n.now()
    }

    function Tb(a, b) {
        var c, d = 0, e = {height: a};
        for (b = b ? 1 : 0; 4 > d; d += 2 - b) {
            c = R[d], e["margin" + c] = e["padding" + c] = a
        }
        return b && (e.opacity = e.width = a), e
    }

    function Ub(a, b, c) {
        for (var d, e = (Rb[b] || []).concat(Rb["*"]), f = 0, g = e.length; g > f; f++) {
            if (d = e[f].call(c, b, a)) {
                return d
            }
        }
    }

    function Vb(a, b, c) {
        var d, e, f, g, h, i, j, k, l = this, m = {}, o = a.style, p = a.nodeType && S(a), q = L.get(a, "fxshow");
        c.queue || (h = n._queueHooks(a, "fx"), null == h.unqueued && (h.unqueued = 0, i = h.empty.fire, h.empty.fire = function () {
            h.unqueued || i()
        }), h.unqueued++, l.always(function () {
            l.always(function () {
                h.unqueued--, n.queue(a, "fx").length || h.empty.fire()
            })
        })), 1 === a.nodeType && ("height" in b || "width" in b) && (c.overflow = [o.overflow, o.overflowX, o.overflowY], j = n.css(a, "display"), k = "none" === j ? L.get(a, "olddisplay") || tb(a.nodeName) : j, "inline" === k && "none" === n.css(a, "float") && (o.display = "inline-block")), c.overflow && (o.overflow = "hidden", l.always(function () {
            o.overflow = c.overflow[0], o.overflowX = c.overflow[1], o.overflowY = c.overflow[2]
        }));
        for (d in b) {
            if (e = b[d], Nb.exec(e)) {
                if (delete b[d], f = f || "toggle" === e, e === (p ? "hide" : "show")) {
                    if ("show" !== e || !q || void 0 === q[d]) {
                        continue
                    }
                    p = !0
                }
                m[d] = q && q[d] || n.style(a, d)
            } else {
                j = void 0
            }
        }
        if (n.isEmptyObject(m)) {
            "inline" === ("none" === j ? tb(a.nodeName) : j) && (o.display = j)
        } else {
            q ? "hidden" in q && (p = q.hidden) : q = L.access(a, "fxshow", {}), f && (q.hidden = !p), p ? n(a).show() : l.done(function () {
                n(a).hide()
            }), l.done(function () {
                var b;
                L.remove(a, "fxshow");
                for (b in m) {
                    n.style(a, b, m[b])
                }
            });
            for (d in m) {
                g = Ub(p ? q[d] : 0, d, l), d in q || (q[d] = g.start, p && (g.end = g.start, g.start = "width" === d || "height" === d ? 1 : 0))
            }
        }
    }

    function Wb(a, b) {
        var c, d, e, f, g;
        for (c in a) {
            if (d = n.camelCase(c), e = b[d], f = a[c], n.isArray(f) && (e = f[1], f = a[c] = f[0]), c !== d && (a[d] = f, delete a[c]), g = n.cssHooks[d], g && "expand" in g) {
                f = g.expand(f), delete a[d];
                for (c in f) {
                    c in a || (a[c] = f[c], b[c] = e)
                }
            } else {
                b[d] = e
            }
        }
    }

    function Xb(a, b, c) {
        var d, e, f = 0, g = Qb.length, h = n.Deferred().always(function () {
            delete i.elem
        }), i = function () {
            if (e) {
                return !1
            }
            for (var b = Lb || Sb(), c = Math.max(0, j.startTime + j.duration - b), d = c / j.duration || 0, f = 1 - d, g = 0, i = j.tweens.length; i > g; g++) {
                j.tweens[g].run(f)
            }
            return h.notifyWith(a, [j, f, c]), 1 > f && i ? c : (h.resolveWith(a, [j]), !1)
        }, j = h.promise({
            elem: a,
            props: n.extend({}, b),
            opts: n.extend(!0, {specialEasing: {}}, c),
            originalProperties: b,
            originalOptions: c,
            startTime: Lb || Sb(),
            duration: c.duration,
            tweens: [],
            createTween: function (b, c) {
                var d = n.Tween(a, j.opts, b, c, j.opts.specialEasing[b] || j.opts.easing);
                return j.tweens.push(d), d
            },
            stop: function (b) {
                var c = 0, d = b ? j.tweens.length : 0;
                if (e) {
                    return this
                }
                for (e = !0; d > c; c++) {
                    j.tweens[c].run(1)
                }
                return b ? h.resolveWith(a, [j, b]) : h.rejectWith(a, [j, b]), this
            }
        }), k = j.props;
        for (Wb(k, j.opts.specialEasing); g > f; f++) {
            if (d = Qb[f].call(j, a, k, j.opts)) {
                return d
            }
        }
        return n.map(k, Ub, j), n.isFunction(j.opts.start) && j.opts.start.call(a, j), n.fx.timer(n.extend(i, {
            elem: a,
            anim: j,
            queue: j.opts.queue
        })), j.progress(j.opts.progress).done(j.opts.done, j.opts.complete).fail(j.opts.fail).always(j.opts.always)
    }

    n.Animation = n.extend(Xb, {
        tweener: function (a, b) {
            n.isFunction(a) ? (b = a, a = ["*"]) : a = a.split(" ");
            for (var c, d = 0, e = a.length; e > d; d++) {
                c = a[d], Rb[c] = Rb[c] || [], Rb[c].unshift(b)
            }
        }, prefilter: function (a, b) {
            b ? Qb.unshift(a) : Qb.push(a)
        }
    }), n.speed = function (a, b, c) {
        var d = a && "object" == typeof a ? n.extend({}, a) : {
            complete: c || !c && b || n.isFunction(a) && a,
            duration: a,
            easing: c && b || b && !n.isFunction(b) && b
        };
        return d.duration = n.fx.off ? 0 : "number" == typeof d.duration ? d.duration : d.duration in n.fx.speeds ? n.fx.speeds[d.duration] : n.fx.speeds._default, (null == d.queue || d.queue === !0) && (d.queue = "fx"), d.old = d.complete, d.complete = function () {
            n.isFunction(d.old) && d.old.call(this), d.queue && n.dequeue(this, d.queue)
        }, d
    }, n.fn.extend({
        fadeTo: function (a, b, c, d) {
            return this.filter(S).css("opacity", 0).show().end().animate({opacity: b}, a, c, d)
        }, animate: function (a, b, c, d) {
            var e = n.isEmptyObject(a), f = n.speed(b, c, d), g = function () {
                var b = Xb(this, n.extend({}, a), f);
                (e || L.get(this, "finish")) && b.stop(!0)
            };
            return g.finish = g, e || f.queue === !1 ? this.each(g) : this.queue(f.queue, g)
        }, stop: function (a, b, c) {
            var d = function (a) {
                var b = a.stop;
                delete a.stop, b(c)
            };
            return "string" != typeof a && (c = b, b = a, a = void 0), b && a !== !1 && this.queue(a || "fx", []), this.each(function () {
                var b = !0, e = null != a && a + "queueHooks", f = n.timers, g = L.get(this);
                if (e) {
                    g[e] && g[e].stop && d(g[e])
                } else {
                    for (e in g) {
                        g[e] && g[e].stop && Pb.test(e) && d(g[e])
                    }
                }
                for (e = f.length; e--;) {
                    f[e].elem !== this || null != a && f[e].queue !== a || (f[e].anim.stop(c), b = !1, f.splice(e, 1))
                }
                (b || !c) && n.dequeue(this, a)
            })
        }, finish: function (a) {
            return a !== !1 && (a = a || "fx"), this.each(function () {
                var b, c = L.get(this), d = c[a + "queue"], e = c[a + "queueHooks"], f = n.timers, g = d ? d.length : 0;
                for (c.finish = !0, n.queue(this, a, []), e && e.stop && e.stop.call(this, !0), b = f.length; b--;) {
                    f[b].elem === this && f[b].queue === a && (f[b].anim.stop(!0), f.splice(b, 1))
                }
                for (b = 0; g > b; b++) {
                    d[b] && d[b].finish && d[b].finish.call(this)
                }
                delete c.finish
            })
        }
    }), n.each(["toggle", "show", "hide"], function (a, b) {
        var c = n.fn[b];
        n.fn[b] = function (a, d, e) {
            return null == a || "boolean" == typeof a ? c.apply(this, arguments) : this.animate(Tb(b, !0), a, d, e)
        }
    }), n.each({
        slideDown: Tb("show"),
        slideUp: Tb("hide"),
        slideToggle: Tb("toggle"),
        fadeIn: {opacity: "show"},
        fadeOut: {opacity: "hide"},
        fadeToggle: {opacity: "toggle"}
    }, function (a, b) {
        n.fn[a] = function (a, c, d) {
            return this.animate(b, a, c, d)
        }
    }), n.timers = [], n.fx.tick = function () {
        var a, b = 0, c = n.timers;
        for (Lb = n.now(); b < c.length; b++) {
            a = c[b], a() || c[b] !== a || c.splice(b--, 1)
        }
        c.length || n.fx.stop(), Lb = void 0
    }, n.fx.timer = function (a) {
        n.timers.push(a), a() ? n.fx.start() : n.timers.pop()
    }, n.fx.interval = 13, n.fx.start = function () {
        Mb || (Mb = setInterval(n.fx.tick, n.fx.interval))
    }, n.fx.stop = function () {
        clearInterval(Mb), Mb = null
    }, n.fx.speeds = {slow: 600, fast: 200, _default: 400}, n.fn.delay = function (a, b) {
        return a = n.fx ? n.fx.speeds[a] || a : a, b = b || "fx", this.queue(b, function (b, c) {
            var d = setTimeout(b, a);
            c.stop = function () {
                clearTimeout(d)
            }
        })
    }, function () {
        var a = l.createElement("input"), b = l.createElement("select"), c = b.appendChild(l.createElement("option"));
        a.type = "checkbox", k.checkOn = "" !== a.value, k.optSelected = c.selected, b.disabled = !0, k.optDisabled = !c.disabled, a = l.createElement("input"), a.value = "t", a.type = "radio", k.radioValue = "t" === a.value
    }();
    var Yb, Zb, $b = n.expr.attrHandle;
    n.fn.extend({
        attr: function (a, b) {
            return J(this, n.attr, a, b, arguments.length > 1)
        }, removeAttr: function (a) {
            return this.each(function () {
                n.removeAttr(this, a)
            })
        }
    }), n.extend({
        attr: function (a, b, c) {
            var d, e, f = a.nodeType;
            if (a && 3 !== f && 8 !== f && 2 !== f) {
                return typeof a.getAttribute === U ? n.prop(a, b, c) : (1 === f && n.isXMLDoc(a) || (b = b.toLowerCase(), d = n.attrHooks[b] || (n.expr.match.bool.test(b) ? Zb : Yb)), void 0 === c ? d && "get" in d && null !== (e = d.get(a, b)) ? e : (e = n.find.attr(a, b), null == e ? void 0 : e) : null !== c ? d && "set" in d && void 0 !== (e = d.set(a, c, b)) ? e : (a.setAttribute(b, c + ""), c) : void n.removeAttr(a, b))
            }
        }, removeAttr: function (a, b) {
            var c, d, e = 0, f = b && b.match(E);
            if (f && 1 === a.nodeType) {
                while (c = f[e++]) {
                    d = n.propFix[c] || c, n.expr.match.bool.test(c) && (a[d] = !1), a.removeAttribute(c)
                }
            }
        }, attrHooks: {
            type: {
                set: function (a, b) {
                    if (!k.radioValue && "radio" === b && n.nodeName(a, "input")) {
                        var c = a.value;
                        return a.setAttribute("type", b), c && (a.value = c), b
                    }
                }
            }
        }
    }), Zb = {
        set: function (a, b, c) {
            return b === !1 ? n.removeAttr(a, c) : a.setAttribute(c, c), c
        }
    }, n.each(n.expr.match.bool.source.match(/\w+/g), function (a, b) {
        var c = $b[b] || n.find.attr;
        $b[b] = function (a, b, d) {
            var e, f;
            return d || (f = $b[b], $b[b] = e, e = null != c(a, b, d) ? b.toLowerCase() : null, $b[b] = f), e
        }
    });
    var _b = /^(?:input|select|textarea|button)$/i;
    n.fn.extend({
        prop: function (a, b) {
            return J(this, n.prop, a, b, arguments.length > 1)
        }, removeProp: function (a) {
            return this.each(function () {
                delete this[n.propFix[a] || a]
            })
        }
    }), n.extend({
        propFix: {"for": "htmlFor", "class": "className"}, prop: function (a, b, c) {
            var d, e, f, g = a.nodeType;
            if (a && 3 !== g && 8 !== g && 2 !== g) {
                return f = 1 !== g || !n.isXMLDoc(a), f && (b = n.propFix[b] || b, e = n.propHooks[b]), void 0 !== c ? e && "set" in e && void 0 !== (d = e.set(a, c, b)) ? d : a[b] = c : e && "get" in e && null !== (d = e.get(a, b)) ? d : a[b]
            }
        }, propHooks: {
            tabIndex: {
                get: function (a) {
                    return a.hasAttribute("tabindex") || _b.test(a.nodeName) || a.href ? a.tabIndex : -1
                }
            }
        }
    }), k.optSelected || (n.propHooks.selected = {
        get: function (a) {
            var b = a.parentNode;
            return b && b.parentNode && b.parentNode.selectedIndex, null
        }
    }), n.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
        n.propFix[this.toLowerCase()] = this
    });
    var ac = /[\t\r\n\f]/g;
    n.fn.extend({
        addClass: function (a) {
            var b, c, d, e, f, g, h = "string" == typeof a && a, i = 0, j = this.length;
            if (n.isFunction(a)) {
                return this.each(function (b) {
                    n(this).addClass(a.call(this, b, this.className))
                })
            }
            if (h) {
                for (b = (a || "").match(E) || []; j > i; i++) {
                    if (c = this[i], d = 1 === c.nodeType && (c.className ? (" " + c.className + " ").replace(ac, " ") : " ")) {
                        f = 0;
                        while (e = b[f++]) {
                            d.indexOf(" " + e + " ") < 0 && (d += e + " ")
                        }
                        g = n.trim(d), c.className !== g && (c.className = g)
                    }
                }
            }
            return this
        }, removeClass: function (a) {
            var b, c, d, e, f, g, h = 0 === arguments.length || "string" == typeof a && a, i = 0, j = this.length;
            if (n.isFunction(a)) {
                return this.each(function (b) {
                    n(this).removeClass(a.call(this, b, this.className))
                })
            }
            if (h) {
                for (b = (a || "").match(E) || []; j > i; i++) {
                    if (c = this[i], d = 1 === c.nodeType && (c.className ? (" " + c.className + " ").replace(ac, " ") : "")) {
                        f = 0;
                        while (e = b[f++]) {
                            while (d.indexOf(" " + e + " ") >= 0) {
                                d = d.replace(" " + e + " ", " ")
                            }
                        }
                        g = a ? n.trim(d) : "", c.className !== g && (c.className = g)
                    }
                }
            }
            return this
        }, toggleClass: function (a, b) {
            var c = typeof a;
            return "boolean" == typeof b && "string" === c ? b ? this.addClass(a) : this.removeClass(a) : this.each(n.isFunction(a) ? function (c) {
                n(this).toggleClass(a.call(this, c, this.className, b), b)
            } : function () {
                if ("string" === c) {
                    var b, d = 0, e = n(this), f = a.match(E) || [];
                    while (b = f[d++]) {
                        e.hasClass(b) ? e.removeClass(b) : e.addClass(b)
                    }
                } else {
                    (c === U || "boolean" === c) && (this.className && L.set(this, "__className__", this.className), this.className = this.className || a === !1 ? "" : L.get(this, "__className__") || "")
                }
            })
        }, hasClass: function (a) {
            for (var b = " " + a + " ", c = 0, d = this.length; d > c; c++) {
                if (1 === this[c].nodeType && (" " + this[c].className + " ").replace(ac, " ").indexOf(b) >= 0) {
                    return !0
                }
            }
            return !1
        }
    });
    var bc = /\r/g;
    n.fn.extend({
        val: function (a) {
            var b, c, d, e = this[0];
            if (arguments.length) {
                return d = n.isFunction(a), this.each(function (c) {
                    var e;
                    1 === this.nodeType && (e = d ? a.call(this, c, n(this).val()) : a, null == e ? e = "" : "number" == typeof e ? e += "" : n.isArray(e) && (e = n.map(e, function (a) {
                        return null == a ? "" : a + ""
                    })), b = n.valHooks[this.type] || n.valHooks[this.nodeName.toLowerCase()], b && "set" in b && void 0 !== b.set(this, e, "value") || (this.value = e))
                })
            }
            if (e) {
                return b = n.valHooks[e.type] || n.valHooks[e.nodeName.toLowerCase()], b && "get" in b && void 0 !== (c = b.get(e, "value")) ? c : (c = e.value, "string" == typeof c ? c.replace(bc, "") : null == c ? "" : c)
            }
        }
    }), n.extend({
        valHooks: {
            option: {
                get: function (a) {
                    var b = n.find.attr(a, "value");
                    return null != b ? b : n.trim(n.text(a))
                }
            }, select: {
                get: function (a) {
                    for (var b, c, d = a.options, e = a.selectedIndex, f = "select-one" === a.type || 0 > e, g = f ? null : [], h = f ? e + 1 : d.length, i = 0 > e ? h : f ? e : 0; h > i; i++) {
                        if (c = d[i], !(!c.selected && i !== e || (k.optDisabled ? c.disabled : null !== c.getAttribute("disabled")) || c.parentNode.disabled && n.nodeName(c.parentNode, "optgroup"))) {
                            if (b = n(c).val(), f) {
                                return b
                            }
                            g.push(b)
                        }
                    }
                    return g
                }, set: function (a, b) {
                    var c, d, e = a.options, f = n.makeArray(b), g = e.length;
                    while (g--) {
                        d = e[g], (d.selected = n.inArray(d.value, f) >= 0) && (c = !0)
                    }
                    return c || (a.selectedIndex = -1), f
                }
            }
        }
    }), n.each(["radio", "checkbox"], function () {
        n.valHooks[this] = {
            set: function (a, b) {
                return n.isArray(b) ? a.checked = n.inArray(n(a).val(), b) >= 0 : void 0
            }
        }, k.checkOn || (n.valHooks[this].get = function (a) {
            return null === a.getAttribute("value") ? "on" : a.value
        })
    }), n.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function (a, b) {
        n.fn[b] = function (a, c) {
            return arguments.length > 0 ? this.on(b, null, a, c) : this.trigger(b)
        }
    }), n.fn.extend({
        hover: function (a, b) {
            return this.mouseenter(a).mouseleave(b || a)
        }, bind: function (a, b, c) {
            return this.on(a, null, b, c)
        }, unbind: function (a, b) {
            return this.off(a, null, b)
        }, delegate: function (a, b, c, d) {
            return this.on(b, a, c, d)
        }, undelegate: function (a, b, c) {
            return 1 === arguments.length ? this.off(a, "**") : this.off(b, a || "**", c)
        }
    });
    var cc = n.now(), dc = /\?/;
    n.parseJSON = function (a) {
        return JSON.parse(a + "")
    }, n.parseXML = function (a) {
        var b, c;
        if (!a || "string" != typeof a) {
            return null
        }
        try {
            c = new DOMParser, b = c.parseFromString(a, "text/xml")
        } catch (d) {
            b = void 0
        }
        return (!b || b.getElementsByTagName("parsererror").length) && n.error("Invalid XML: " + a), b
    };
    var ec, fc, gc = /#.*$/, hc = /([?&])_=[^&]*/, ic = /^(.*?):[ \t]*([^\r\n]*)$/gm,
        jc = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/, kc = /^(?:GET|HEAD)$/, lc = /^\/\//,
        mc = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/, nc = {}, oc = {}, pc = "*/".concat("*");
    try {
        fc = location.href
    } catch (qc) {
        fc = l.createElement("a"), fc.href = "", fc = fc.href
    }
    ec = mc.exec(fc.toLowerCase()) || [];

    function rc(a) {
        return function (b, c) {
            "string" != typeof b && (c = b, b = "*");
            var d, e = 0, f = b.toLowerCase().match(E) || [];
            if (n.isFunction(c)) {
                while (d = f[e++]) {
                    "+" === d[0] ? (d = d.slice(1) || "*", (a[d] = a[d] || []).unshift(c)) : (a[d] = a[d] || []).push(c)
                }
            }
        }
    }

    function sc(a, b, c, d) {
        var e = {}, f = a === oc;

        function g(h) {
            var i;
            return e[h] = !0, n.each(a[h] || [], function (a, h) {
                var j = h(b, c, d);
                return "string" != typeof j || f || e[j] ? f ? !(i = j) : void 0 : (b.dataTypes.unshift(j), g(j), !1)
            }), i
        }

        return g(b.dataTypes[0]) || !e["*"] && g("*")
    }

    function tc(a, b) {
        var c, d, e = n.ajaxSettings.flatOptions || {};
        for (c in b) {
            void 0 !== b[c] && ((e[c] ? a : d || (d = {}))[c] = b[c])
        }
        return d && n.extend(!0, a, d), a
    }

    function uc(a, b, c) {
        var d, e, f, g, h = a.contents, i = a.dataTypes;
        while ("*" === i[0]) {
            i.shift(), void 0 === d && (d = a.mimeType || b.getResponseHeader("Content-Type"))
        }
        if (d) {
            for (e in h) {
                if (h[e] && h[e].test(d)) {
                    i.unshift(e);
                    break
                }
            }
        }
        if (i[0] in c) {
            f = i[0]
        } else {
            for (e in c) {
                if (!i[0] || a.converters[e + " " + i[0]]) {
                    f = e;
                    break
                }
                g || (g = e)
            }
            f = f || g
        }
        return f ? (f !== i[0] && i.unshift(f), c[f]) : void 0
    }

    function vc(a, b, c, d) {
        var e, f, g, h, i, j = {}, k = a.dataTypes.slice();
        if (k[1]) {
            for (g in a.converters) {
                j[g.toLowerCase()] = a.converters[g]
            }
        }
        f = k.shift();
        while (f) {
            if (a.responseFields[f] && (c[a.responseFields[f]] = b), !i && d && a.dataFilter && (b = a.dataFilter(b, a.dataType)), i = f, f = k.shift()) {
                if ("*" === f) {
                    f = i
                } else {
                    if ("*" !== i && i !== f) {
                        if (g = j[i + " " + f] || j["* " + f], !g) {
                            for (e in j) {
                                if (h = e.split(" "), h[1] === f && (g = j[i + " " + h[0]] || j["* " + h[0]])) {
                                    g === !0 ? g = j[e] : j[e] !== !0 && (f = h[0], k.unshift(h[1]));
                                    break
                                }
                            }
                        }
                        if (g !== !0) {
                            if (g && a["throws"]) {
                                b = g(b)
                            } else {
                                try {
                                    b = g(b)
                                } catch (l) {
                                    return {state: "parsererror", error: g ? l : "No conversion from " + i + " to " + f}
                                }
                            }
                        }
                    }
                }
            }
        }
        return {state: "success", data: b}
    }

    n.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: fc,
            type: "GET",
            isLocal: jc.test(ec[1]),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": pc,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {xml: /xml/, html: /html/, json: /json/},
            responseFields: {xml: "responseXML", text: "responseText", json: "responseJSON"},
            converters: {"* text": String, "text html": !0, "text json": n.parseJSON, "text xml": n.parseXML},
            flatOptions: {url: !0, context: !0}
        },
        ajaxSetup: function (a, b) {
            return b ? tc(tc(a, n.ajaxSettings), b) : tc(n.ajaxSettings, a)
        },
        ajaxPrefilter: rc(nc),
        ajaxTransport: rc(oc),
        ajax: function (a, b) {
            "object" == typeof a && (b = a, a = void 0), b = b || {};
            var c, d, e, f, g, h, i, j, k = n.ajaxSetup({}, b), l = k.context || k,
                m = k.context && (l.nodeType || l.jquery) ? n(l) : n.event, o = n.Deferred(),
                p = n.Callbacks("once memory"), q = k.statusCode || {}, r = {}, s = {}, t = 0, u = "canceled", v = {
                    readyState: 0, getResponseHeader: function (a) {
                        var b;
                        if (2 === t) {
                            if (!f) {
                                f = {};
                                while (b = ic.exec(e)) {
                                    f[b[1].toLowerCase()] = b[2]
                                }
                            }
                            b = f[a.toLowerCase()]
                        }
                        return null == b ? null : b
                    }, getAllResponseHeaders: function () {
                        return 2 === t ? e : null
                    }, setRequestHeader: function (a, b) {
                        var c = a.toLowerCase();
                        return t || (a = s[c] = s[c] || a, r[a] = b), this
                    }, overrideMimeType: function (a) {
                        return t || (k.mimeType = a), this
                    }, statusCode: function (a) {
                        var b;
                        if (a) {
                            if (2 > t) {
                                for (b in a) {
                                    q[b] = [q[b], a[b]]
                                }
                            } else {
                                v.always(a[v.status])
                            }
                        }
                        return this
                    }, abort: function (a) {
                        var b = a || u;
                        return c && c.abort(b), x(0, b), this
                    }
                };
            if (o.promise(v).complete = p.add, v.success = v.done, v.error = v.fail, k.url = ((a || k.url || fc) + "").replace(gc, "").replace(lc, ec[1] + "//"), k.type = b.method || b.type || k.method || k.type, k.dataTypes = n.trim(k.dataType || "*").toLowerCase().match(E) || [""], null == k.crossDomain && (h = mc.exec(k.url.toLowerCase()), k.crossDomain = !(!h || h[1] === ec[1] && h[2] === ec[2] && (h[3] || ("http:" === h[1] ? "80" : "443")) === (ec[3] || ("http:" === ec[1] ? "80" : "443")))), k.data && k.processData && "string" != typeof k.data && (k.data = n.param(k.data, k.traditional)), sc(nc, k, b, v), 2 === t) {
                return v
            }
            i = k.global, i && 0 === n.active++ && n.event.trigger("ajaxStart"), k.type = k.type.toUpperCase(), k.hasContent = !kc.test(k.type), d = k.url, k.hasContent || (k.data && (d = k.url += (dc.test(d) ? "&" : "?") + k.data, delete k.data), k.cache === !1 && (k.url = hc.test(d) ? d.replace(hc, "$1_=" + cc++) : d + (dc.test(d) ? "&" : "?") + "_=" + cc++)), k.ifModified && (n.lastModified[d] && v.setRequestHeader("If-Modified-Since", n.lastModified[d]), n.etag[d] && v.setRequestHeader("If-None-Match", n.etag[d])), (k.data && k.hasContent && k.contentType !== !1 || b.contentType) && v.setRequestHeader("Content-Type", k.contentType), v.setRequestHeader("Accept", k.dataTypes[0] && k.accepts[k.dataTypes[0]] ? k.accepts[k.dataTypes[0]] + ("*" !== k.dataTypes[0] ? ", " + pc + "; q=0.01" : "") : k.accepts["*"]);
            for (j in k.headers) {
                v.setRequestHeader(j, k.headers[j])
            }
            if (k.beforeSend && (k.beforeSend.call(l, v, k) === !1 || 2 === t)) {
                return v.abort()
            }
            u = "abort";
            for (j in {success: 1, error: 1, complete: 1}) {
                v[j](k[j])
            }
            if (c = sc(oc, k, b, v)) {
                v.readyState = 1, i && m.trigger("ajaxSend", [v, k]), k.async && k.timeout > 0 && (g = setTimeout(function () {
                    v.abort("timeout")
                }, k.timeout));
                try {
                    t = 1, c.send(r, x)
                } catch (w) {
                    if (!(2 > t)) {
                        throw w
                    }
                    x(-1, w)
                }
            } else {
                x(-1, "No Transport")
            }

            function x(a, b, f, h) {
                var j, r, s, u, w, x = b;
                2 !== t && (t = 2, g && clearTimeout(g), c = void 0, e = h || "", v.readyState = a > 0 ? 4 : 0, j = a >= 200 && 300 > a || 304 === a, f && (u = uc(k, v, f)), u = vc(k, u, v, j), j ? (k.ifModified && (w = v.getResponseHeader("Last-Modified"), w && (n.lastModified[d] = w), w = v.getResponseHeader("etag"), w && (n.etag[d] = w)), 204 === a || "HEAD" === k.type ? x = "nocontent" : 304 === a ? x = "notmodified" : (x = u.state, r = u.data, s = u.error, j = !s)) : (s = x, (a || !x) && (x = "error", 0 > a && (a = 0))), v.status = a, v.statusText = (b || x) + "", j ? o.resolveWith(l, [r, x, v]) : o.rejectWith(l, [v, x, s]), v.statusCode(q), q = void 0, i && m.trigger(j ? "ajaxSuccess" : "ajaxError", [v, k, j ? r : s]), p.fireWith(l, [v, x]), i && (m.trigger("ajaxComplete", [v, k]), --n.active || n.event.trigger("ajaxStop")))
            }

            return v
        },
        getJSON: function (a, b, c) {
            return n.get(a, b, c, "json")
        },
        getScript: function (a, b) {
            return n.get(a, void 0, b, "script")
        }
    }), n.each(["get", "post"], function (a, b) {
        n[b] = function (a, c, d, e) {
            return n.isFunction(c) && (e = e || d, d = c, c = void 0), n.ajax({
                url: a,
                type: b,
                dataType: e,
                data: c,
                success: d
            })
        }
    }), n.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (a, b) {
        n.fn[b] = function (a) {
            return this.on(b, a)
        }
    }), n._evalUrl = function (a) {
        return n.ajax({url: a, type: "GET", dataType: "script", async: !1, global: !1, "throws": !0})
    }, n.fn.extend({
        wrapAll: function (a) {
            var b;
            return n.isFunction(a) ? this.each(function (b) {
                n(this).wrapAll(a.call(this, b))
            }) : (this[0] && (b = n(a, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && b.insertBefore(this[0]), b.map(function () {
                var a = this;
                while (a.firstElementChild) {
                    a = a.firstElementChild
                }
                return a
            }).append(this)), this)
        }, wrapInner: function (a) {
            return this.each(n.isFunction(a) ? function (b) {
                n(this).wrapInner(a.call(this, b))
            } : function () {
                var b = n(this), c = b.contents();
                c.length ? c.wrapAll(a) : b.append(a)
            })
        }, wrap: function (a) {
            var b = n.isFunction(a);
            return this.each(function (c) {
                n(this).wrapAll(b ? a.call(this, c) : a)
            })
        }, unwrap: function () {
            return this.parent().each(function () {
                n.nodeName(this, "body") || n(this).replaceWith(this.childNodes)
            }).end()
        }
    }), n.expr.filters.hidden = function (a) {
        return a.offsetWidth <= 0 && a.offsetHeight <= 0
    }, n.expr.filters.visible = function (a) {
        return !n.expr.filters.hidden(a)
    };
    var wc = /%20/g, xc = /\[\]$/, yc = /\r?\n/g, zc = /^(?:submit|button|image|reset|file)$/i,
        Ac = /^(?:input|select|textarea|keygen)/i;

    function Bc(a, b, c, d) {
        var e;
        if (n.isArray(b)) {
            n.each(b, function (b, e) {
                c || xc.test(a) ? d(a, e) : Bc(a + "[" + ("object" == typeof e ? b : "") + "]", e, c, d)
            })
        } else {
            if (c || "object" !== n.type(b)) {
                d(a, b)
            } else {
                for (e in b) {
                    Bc(a + "[" + e + "]", b[e], c, d)
                }
            }
        }
    }

    n.param = function (a, b) {
        var c, d = [], e = function (a, b) {
            b = n.isFunction(b) ? b() : null == b ? "" : b, d[d.length] = encodeURIComponent(a) + "=" + encodeURIComponent(b)
        };
        if (void 0 === b && (b = n.ajaxSettings && n.ajaxSettings.traditional), n.isArray(a) || a.jquery && !n.isPlainObject(a)) {
            n.each(a, function () {
                e(this.name, this.value)
            })
        } else {
            for (c in a) {
                Bc(c, a[c], b, e)
            }
        }
        return d.join("&").replace(wc, "+")
    }, n.fn.extend({
        serialize: function () {
            return n.param(this.serializeArray())
        }, serializeArray: function () {
            return this.map(function () {
                var a = n.prop(this, "elements");
                return a ? n.makeArray(a) : this
            }).filter(function () {
                var a = this.type;
                return this.name && !n(this).is(":disabled") && Ac.test(this.nodeName) && !zc.test(a) && (this.checked || !T.test(a))
            }).map(function (a, b) {
                var c = n(this).val();
                return null == c ? null : n.isArray(c) ? n.map(c, function (a) {
                    return {name: b.name, value: a.replace(yc, "\r\n")}
                }) : {name: b.name, value: c.replace(yc, "\r\n")}
            }).get()
        }
    }), n.ajaxSettings.xhr = function () {
        try {
            return new XMLHttpRequest
        } catch (a) {
        }
    };
    var Cc = 0, Dc = {}, Ec = {0: 200, 1223: 204}, Fc = n.ajaxSettings.xhr();
    a.ActiveXObject && n(a).on("unload", function () {
        for (var a in Dc) {
            Dc[a]()
        }
    }), k.cors = !!Fc && "withCredentials" in Fc, k.ajax = Fc = !!Fc, n.ajaxTransport(function (a) {
        var b;
        return k.cors || Fc && !a.crossDomain ? {
            send: function (c, d) {
                var e, f = a.xhr(), g = ++Cc;
                if (f.open(a.type, a.url, a.async, a.username, a.password), a.xhrFields) {
                    for (e in a.xhrFields) {
                        f[e] = a.xhrFields[e]
                    }
                }
                a.mimeType && f.overrideMimeType && f.overrideMimeType(a.mimeType), a.crossDomain || c["X-Requested-With"] || (c["X-Requested-With"] = "XMLHttpRequest");
                for (e in c) {
                    f.setRequestHeader(e, c[e])
                }
                b = function (a) {
                    return function () {
                        b && (delete Dc[g], b = f.onload = f.onerror = null, "abort" === a ? f.abort() : "error" === a ? d(f.status, f.statusText) : d(Ec[f.status] || f.status, f.statusText, "string" == typeof f.responseText ? {text: f.responseText} : void 0, f.getAllResponseHeaders()))
                    }
                }, f.onload = b(), f.onerror = b("error"), b = Dc[g] = b("abort");
                try {
                    f.send(a.hasContent && a.data || null)
                } catch (h) {
                    if (b) {
                        throw h
                    }
                }
            }, abort: function () {
                b && b()
            }
        } : void 0
    }), n.ajaxSetup({
        accepts: {script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},
        contents: {script: /(?:java|ecma)script/},
        converters: {
            "text script": function (a) {
                return n.globalEval(a), a
            }
        }
    }), n.ajaxPrefilter("script", function (a) {
        void 0 === a.cache && (a.cache = !1), a.crossDomain && (a.type = "GET")
    }), n.ajaxTransport("script", function (a) {
        if (a.crossDomain) {
            var b, c;
            return {
                send: function (d, e) {
                    b = n("<script>").prop({
                        async: !0,
                        charset: a.scriptCharset,
                        src: a.url
                    }).on("load error", c = function (a) {
                        b.remove(), c = null, a && e("error" === a.type ? 404 : 200, a.type)
                    }), l.head.appendChild(b[0])
                }, abort: function () {
                    c && c()
                }
            }
        }
    });
    var Gc = [], Hc = /(=)\?(?=&|$)|\?\?/;
    n.ajaxSetup({
        jsonp: "callback", jsonpCallback: function () {
            var a = Gc.pop() || n.expando + "_" + cc++;
            return this[a] = !0, a
        }
    }), n.ajaxPrefilter("json jsonp", function (b, c, d) {
        var e, f, g,
            h = b.jsonp !== !1 && (Hc.test(b.url) ? "url" : "string" == typeof b.data && !(b.contentType || "").indexOf("application/x-www-form-urlencoded") && Hc.test(b.data) && "data");
        return h || "jsonp" === b.dataTypes[0] ? (e = b.jsonpCallback = n.isFunction(b.jsonpCallback) ? b.jsonpCallback() : b.jsonpCallback, h ? b[h] = b[h].replace(Hc, "$1" + e) : b.jsonp !== !1 && (b.url += (dc.test(b.url) ? "&" : "?") + b.jsonp + "=" + e), b.converters["script json"] = function () {
            return g || n.error(e + " was not called"), g[0]
        }, b.dataTypes[0] = "json", f = a[e], a[e] = function () {
            g = arguments
        }, d.always(function () {
            a[e] = f, b[e] && (b.jsonpCallback = c.jsonpCallback, Gc.push(e)), g && n.isFunction(f) && f(g[0]), g = f = void 0
        }), "script") : void 0
    }), n.parseHTML = function (a, b, c) {
        if (!a || "string" != typeof a) {
            return null
        }
        "boolean" == typeof b && (c = b, b = !1), b = b || l;
        var d = v.exec(a), e = !c && [];
        return d ? [b.createElement(d[1])] : (d = n.buildFragment([a], b, e), e && e.length && n(e).remove(), n.merge([], d.childNodes))
    };
    var Ic = n.fn.load;
    n.fn.load = function (a, b, c) {
        if ("string" != typeof a && Ic) {
            return Ic.apply(this, arguments)
        }
        var d, e, f, g = this, h = a.indexOf(" ");
        return h >= 0 && (d = n.trim(a.slice(h)), a = a.slice(0, h)), n.isFunction(b) ? (c = b, b = void 0) : b && "object" == typeof b && (e = "POST"), g.length > 0 && n.ajax({
            url: a,
            type: e,
            dataType: "html",
            data: b
        }).done(function (a) {
            f = arguments, g.html(d ? n("<div>").append(n.parseHTML(a)).find(d) : a)
        }).complete(c && function (a, b) {
            g.each(c, f || [a.responseText, b, a])
        }), this
    }, n.expr.filters.animated = function (a) {
        return n.grep(n.timers, function (b) {
            return a === b.elem
        }).length
    };
    var Jc = a.document.documentElement;

    function Kc(a) {
        return n.isWindow(a) ? a : 9 === a.nodeType && a.defaultView
    }

    n.offset = {
        setOffset: function (a, b, c) {
            var d, e, f, g, h, i, j, k = n.css(a, "position"), l = n(a), m = {};
            "static" === k && (a.style.position = "relative"), h = l.offset(), f = n.css(a, "top"), i = n.css(a, "left"), j = ("absolute" === k || "fixed" === k) && (f + i).indexOf("auto") > -1, j ? (d = l.position(), g = d.top, e = d.left) : (g = parseFloat(f) || 0, e = parseFloat(i) || 0), n.isFunction(b) && (b = b.call(a, c, h)), null != b.top && (m.top = b.top - h.top + g), null != b.left && (m.left = b.left - h.left + e), "using" in b ? b.using.call(a, m) : l.css(m)
        }
    }, n.fn.extend({
        offset: function (a) {
            if (arguments.length) {
                return void 0 === a ? this : this.each(function (b) {
                    n.offset.setOffset(this, a, b)
                })
            }
            var b, c, d = this[0], e = {top: 0, left: 0}, f = d && d.ownerDocument;
            if (f) {
                return b = f.documentElement, n.contains(b, d) ? (typeof d.getBoundingClientRect !== U && (e = d.getBoundingClientRect()), c = Kc(f), {
                    top: e.top + c.pageYOffset - b.clientTop,
                    left: e.left + c.pageXOffset - b.clientLeft
                }) : e
            }
        }, position: function () {
            if (this[0]) {
                var a, b, c = this[0], d = {top: 0, left: 0};
                return "fixed" === n.css(c, "position") ? b = c.getBoundingClientRect() : (a = this.offsetParent(), b = this.offset(), n.nodeName(a[0], "html") || (d = a.offset()), d.top += n.css(a[0], "borderTopWidth", !0), d.left += n.css(a[0], "borderLeftWidth", !0)), {
                    top: b.top - d.top - n.css(c, "marginTop", !0),
                    left: b.left - d.left - n.css(c, "marginLeft", !0)
                }
            }
        }, offsetParent: function () {
            return this.map(function () {
                var a = this.offsetParent || Jc;
                while (a && !n.nodeName(a, "html") && "static" === n.css(a, "position")) {
                    a = a.offsetParent
                }
                return a || Jc
            })
        }
    }), n.each({scrollLeft: "pageXOffset", scrollTop: "pageYOffset"}, function (b, c) {
        var d = "pageYOffset" === c;
        n.fn[b] = function (e) {
            return J(this, function (b, e, f) {
                var g = Kc(b);
                return void 0 === f ? g ? g[c] : b[e] : void (g ? g.scrollTo(d ? a.pageXOffset : f, d ? f : a.pageYOffset) : b[e] = f)
            }, b, e, arguments.length, null)
        }
    }), n.each(["top", "left"], function (a, b) {
        n.cssHooks[b] = yb(k.pixelPosition, function (a, c) {
            return c ? (c = xb(a, b), vb.test(c) ? n(a).position()[b] + "px" : c) : void 0
        })
    }), n.each({Height: "height", Width: "width"}, function (a, b) {
        n.each({padding: "inner" + a, content: b, "": "outer" + a}, function (c, d) {
            n.fn[d] = function (d, e) {
                var f = arguments.length && (c || "boolean" != typeof d),
                    g = c || (d === !0 || e === !0 ? "margin" : "border");
                return J(this, function (b, c, d) {
                    var e;
                    return n.isWindow(b) ? b.document.documentElement["client" + a] : 9 === b.nodeType ? (e = b.documentElement, Math.max(b.body["scroll" + a], e["scroll" + a], b.body["offset" + a], e["offset" + a], e["client" + a])) : void 0 === d ? n.css(b, c, g) : n.style(b, c, d, g)
                }, b, f ? d : void 0, f, null)
            }
        })
    }), n.fn.size = function () {
        return this.length
    }, n.fn.andSelf = n.fn.addBack, "function" == typeof define && define.amd && define("jquery", [], function () {
        return n
    });
    var Lc = a.jQuery, Mc = a.$;
    return n.noConflict = function (b) {
        return a.$ === n && (a.$ = Mc), b && a.jQuery === n && (a.jQuery = Lc), n
    }, typeof b === U && (a.jQuery = a.$ = n), n
});
if (document.location.href) {
    hrefString = document.location.href
} else {
    hrefString = document.location
}
var pagename;

function parseUri(str) {
    var o = parseUri.options, m = o.parser[o.strictMode ? "strict" : "loose"].exec(str), uri = {}, i = 14;
    while (i--) {
        uri[o.key[i]] = m[i] || ""
    }
    uri[o.q.name] = {};
    uri[o.key[12]].replace(o.q.parser, function ($0, $1, $2) {
        if ($1) {
            uri[o.q.name][$1] = $2
        }
    });
    return uri
}

parseUri.options = {
    strictMode: false,
    key: ["source", "protocol", "authority", "userInfo", "user", "password", "host", "port", "relative", "path", "directory", "file", "query", "anchor"],
    q: {name: "queryKey", parser: /(?:^|&)([^&=]*)=?([^&]*)/g},
    parser: {
        strict: /^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,
        loose: /^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/
    }
};

function extractPageName(hrefString, location) {
    if (typeof location == "undefined") {
        location = "prod"
    }
    var result;
    if (location == "dev") {
        var qsSplit = hrefString.split("?");
        var arr = qsSplit[0].split("/");
        qsSplit.shift();
        var sQS = "";
        if (qsSplit.length > 0) {
            var oPageIdMatches = qsSplit.join("?").match(/(pageid=[0-9]+)/g);
            if (oPageIdMatches != null && oPageIdMatches.length > 0) {
                sQS = "?" + oPageIdMatches[0]
            }
        }
        var page = arr[arr.length - 1] + sQS;
        result = page
    } else {
        hrefString = hrefString.replace(/%20/g, " ");
        var uri = parseUri(hrefString);
        if (uri.protocol == "http" || uri.protocol == "https") {
            if (uri.directory == "/" && uri.file == "") {
                result = uri.host
            } else {
                if (uri.file != "") {
                    if (uri.directory == "/") {
                        result = uri.file.split(".")[0]
                    } else {
                        result = uri.directory + uri.file.split(".")[0]
                    }
                } else {
                    if (uri.directory.charAt(uri.directory.length - 1) != "/") {
                        uri.directory += "/"
                    }
                    result = uri.directory
                }
            }
        } else {
            result = hrefString
        }
    }
    return result.toLowerCase()
}

function setActiveMenu(arr, location) {
    for (var i = 0; i < arr.length; i++) {
        var linkPageName = extractPageName(arr[i].href, location);
        if (decodeURI(linkPageName) == pagename) {
            addClass(arr[i], "current");
            addClass(arr[i].parentNode, "current")
        }
        var relarr = arr[i].rel.split(",");
        for (var x = 0; x < relarr.length; x++) {
            if (extractPageName(relarr[x], location) == pagename) {
                addClass(arr[i], "current");
                addClass(arr[i].parentNode, "current")
            }
        }
    }
}

function highlightPages(classname, location) {
    pagename = extractPageName(hrefString, location);
    var lists = getElementsByClass(classname, null, "ul");
    for (var i = 0; i < lists.length; i++) {
        setActiveMenu(lists[i].getElementsByTagName("a"), location)
    }
}

function getElementsByClass(searchClass, node, tag) {
    var classElements = [];
    if (node == null) {
        node = document
    }
    if (tag == null) {
        tag = "*"
    }
    var els = node.getElementsByTagName(tag);
    var elsLen = els.length;
    var pattern = new RegExp("(^|\\s)" + searchClass + "(\\s|$)");
    for (i = 0, j = 0; i < elsLen; i++) {
        if (pattern.test(els[i].className)) {
            classElements[j] = els[i];
            j++
        }
    }
    return classElements
}

function addClass(element, value) {
    if (!element.className) {
        element.className = value
    } else {
        var newClassName = element.className;
        newClassName += " ";
        newClassName += value;
        element.className = newClassName
    }
}

(function ($) {
    $(function () {
        if (readCookie(sTextOnlyViewCookieName) != "1") {
            $(".helpMenuWidget, #usabilityNavDropDown").hover(function () {
                $(".helpMenuWidgetNavShell, #usabilityNav", this).removeClass("noHover").addClass("hover")
            }, function () {
                $(".helpMenuWidgetNavShell, #usabilityNav", this).removeClass("hover").addClass("noHover")
            })
        }
    })
})(jQuery);

function addEvent(elm, evType, fn, useCapture) {
    if (elm.addEventListener) {
        elm.addEventListener(evType, fn, useCapture);
        return true
    } else {
        if (elm.attachEvent) {
            var r = elm.attachEvent("on" + evType, fn);
            return r
        } else {
            elm["on" + evType] = fn
        }
    }
}

function rfpFormScroll(formElement) {
    if (typeof (formElement) != "undefined") {
        if (formElement.getAttribute("data-formloaded") == null) {
            formElement.setAttribute("data-formloaded", "true")
        } else {
            formElement.scrollIntoView()
        }
    }
}

var tgs = ["div", "td", "tr"];
var szs = ["xx-small", "x-small", "small", "medium", "large", "x-large", "xx-large"];
var startSz = 2;

function ts(trgt, inc) {
    if (!document.getElementById) {
        return
    }
    var d = document, cEl = null, sz = startSz, i, j, cTags;
    sz += inc;
    if (sz < 0) {
        sz = 0
    }
    if (sz > 6) {
        sz = 6
    }
    startSz = sz;
    if (!(cEl = d.getElementById(trgt))) {
        cEl = d.getElementsByTagName(trgt)[0]
    }
    cEl.style.fontSize = szs[sz];
    for (i = 0; i < tgs.length; i++) {
        cTags = cEl.getElementsByTagName(tgs[i]);
        for (j = 0; j < cTags.length; j++) {
            cTags[j].style.fontSize = szs[sz]
        }
    }
}

(function ($) {
    $(function () {
        $("div#side div.widgetCTA:last").addClass("lastItem")
    })
})(jQuery);

function EnablePopupSubMenus() {
    if (readCookie(sTextOnlyViewCookieName) != "1") {
        (function ($) {
            $("ul#mainNavLinks li").hover(function () {
                $(this).addClass("hover").find("ul:first:hidden").show()
            }, function () {
                $(this).removeClass("hover").find("ul:first").hide()
            })
        })(jQuery)
    }
}

function EnableListSubMenus() {
    if (readCookie(sTextOnlyViewCookieName) != "1") {
        (function ($) {
            $(function () {
                $("ul#mainNavLinks li.current").find("ul:first:hidden").show()
            })
        })(jQuery)
    }
}

startList = function (id) {
    if (document.all && document.getElementById) {
        navRoot = document.getElementById(id);
        if (typeof (navRoot) != "undefined" && navRoot != null) {
            for (i = 0; i < navRoot.childNodes.length; i++) {
                node = navRoot.childNodes[i];
                if (node.nodeName == "LI") {
                    node.onmouseover = function () {
                        this.className += " over"
                    };
                    node.onmouseout = function () {
                        this.className = this.className.replace(" over", "")
                    }
                }
            }
        }
    }
};

function RunStartList() {
    startList("nav")
}

addEvent(window, "load", RunStartList, false);

function LanguageRedirect(sLanguage) {
    if (readCookie(sLanguage) == "") {
        createCookie("visitorLanguage", sLanguage);
        if (languageRedirects !== undefined) {
            if (languageRedirects[sLanguage] !== undefined) {
                var url = languageRedirects[sLanguage];
                var qsConcatSymbol = "?";
                var qs = window.location.search.substring(1);
                if (qs != "") {
                    url += "?" + qs;
                    qsConcatSymbol = "&"
                }
                var referrer = document.referrer;
                if (referrer != "") {
                    url += qsConcatSymbol + "referrer=" + encodeURIComponent(referrer)
                }
                createCookie(sLanguage, "1");
                document.location = url
            }
        }
    }
}

function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString()
    } else {
        var expires = ""
    }
    document.cookie = name + "=" + value + expires + "; path=/"
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1, c.length)
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length, c.length)
        }
    }
    return ""
}

function GetAAObject() {
    if (typeof (sViz) != "undefined") {
        return sViz
    } else {
        if (typeof (s) != "undefined") {
            return s
        } else {
            return null
        }
    }
}

function ActiveCDBETracking(domains) {
    (function ($) {
        $(function () {
            function arrayUnique(array) {
                var a = array.concat();
                for (var i = 0; i < a.length; ++i) {
                    for (var j = i + 1; j < a.length; ++j) {
                        if (a[i] === a[j]) {
                            a.splice(j--, 1)
                        }
                    }
                }
                return a
            }

            var standardIBEDomains = ["secure-res.com", "travelclick.com", "ihotelier.com", "iqwebbook.com", "synxis.com", "travlynx.com", "myhotelreservation.net", "yourreservation.net", "windsurfercrs.com", "opentable.com", "reserveit.net", "yelp.com", "reserveq.com", "eveve.com", "bookenda.com", "restaurantconnect.com", "webrez.com"];
            var finalIBEDomains = arrayUnique(domains.concat(standardIBEDomains));
            var sDomainRegex = finalIBEDomains.join("|").replace(/\./g, "\\.");
            var oDomainRegex = new RegExp(sDomainRegex, "i");
            $("a").not(".cdbeElement").filter(function (attribute) {
                return oDomainRegex.test($(this).attr("href"))
            }).addClass("cdbeElement").click(function () {
                if (typeof (PersonalizationAPI) != "undefined") {
                    var $vptElement = $(this).closest(".vptElement");
                    if ($vptElement.length == 1) {
                        var oAudience = PersonalizationAPI.GetAudienceForElement($vptElement);
                        PersonalizationAPI.TriggerTracking("eVar42", "event24", oAudience, "Click");
                        PersonalizationAPI.TrackCDBEEvent()
                    }
                }
                if (typeof (WWPSiteProperties.OmnitureReportSuiteId) != "undefined" && WWPSiteProperties.OmnitureReportSuiteId != "" && GetAAObject() != null) {
                    var s = s_gi(WWPSiteProperties.OmnitureReportSuiteId);
                    s.linkTrackVars = "events";
                    s.linkTrackEvents = "event12";
                    s.events = "event12";
                    s.tl(this, "o", "check availability")
                }
                PassVizergyMarketingParameters(this)
            });
            $("form").not(".cdbeElement").filter(function (attribute) {
                return oDomainRegex.test($(this).attr("action"))
            }).addClass("cdbeElement").submit(function () {
                if (typeof (PersonalizationAPI) != "undefined") {
                    var $vptElement = $(this).closest(".vptElement");
                    if ($vptElement.length == 1) {
                        var oAudience = PersonalizationAPI.GetAudienceForElement($vptElement);
                        PersonalizationAPI.TriggerTracking("eVar42", "event24", oAudience, "Click");
                        PersonalizationAPI.TrackCDBEEvent()
                    }
                }
                if (typeof (WWPSiteProperties.OmnitureReportSuiteId) != "undefined" && WWPSiteProperties.OmnitureReportSuiteId != "" && GetAAObject() != null) {
                    var s = s_gi(WWPSiteProperties.OmnitureReportSuiteId);
                    s.linkTrackVars = "events";
                    s.linkTrackEvents = "event12";
                    s.events = "event12";
                    s.tl(this, "o", "check availability")
                }
                PassVizergyMarketingParameters(this)
            })
        })
    })(jQuery)
}

function PassVizergyMarketingParameters(element) {
    var $element = $(element);
    if ($element.is(".cdbeElementUpdated") == true) {
        return false
    }
    var oPassParametersDomainExclusionList = ["reservhotel.com(?!/html/)", "openhotel.com", "barefoot.com"];
    var sPassParametersDomainExclusionRegex = oPassParametersDomainExclusionList.join("|").replace(/\./g, "\\.");
    var oPassParametersDomainExclusionRegex = new RegExp(sPassParametersDomainExclusionRegex, "i");
    var sURL = "";
    if ($element[0].nodeName.toLowerCase() == "a") {
        sURL = $element.attr("href")
    } else {
        if ($element[0].nodeName.toLowerCase() == "form") {
            sURL = $element.attr("action")
        } else {
            if ($element[0].nodeName.toLowerCase() == "iframe") {
                sURL = $element.attr("src")
            }
        }
    }
    if (oPassParametersDomainExclusionRegex.test(sURL) == true) {
        return false
    }

    function CollectMarketingCookie(oMarketingParameters, sCookieName, sParameterName) {
        var sValue = readCookie(sCookieName);
        if (sValue != "") {
            oMarketingParameters.push({key: sParameterName, value: sValue})
        }
    }

    var oMarketingParameters = [];
    if (typeof (sViz) == "undefined") {
        CollectMarketingCookie(oMarketingParameters, "vizWT.srch", "WT.srch");
        CollectMarketingCookie(oMarketingParameters, "vizDCSext.ppc_kw", "DCSext.ppc_kw");
        CollectMarketingCookie(oMarketingParameters, "vizWT.mc_id", "WT.mc_id");
        CollectMarketingCookie(oMarketingParameters, "vizppc_ac", "ppc_ac");
        CollectMarketingCookie(oMarketingParameters, "vizppc_ag", "ppc_ag");
        CollectMarketingCookie(oMarketingParameters, "vizppc_mt", "ppc_mt");
        CollectMarketingCookie(oMarketingParameters, "vizcreative", "creative");
        CollectMarketingCookie(oMarketingParameters, "vizreferrer", "vizreferrer")
    }

    function BuildFullURLWithEncodedValues(oMarketingParameters) {
        var sURL = "";
        var sAmpersand = "";
        for (var i = 0; i < oMarketingParameters.length; i++) {
            sURL += sAmpersand + oMarketingParameters[i].key + "=" + encodeURIComponent(oMarketingParameters[i].value);
            sAmpersand = "&"
        }
        return sURL
    }

    if ($element[0].nodeName.toLowerCase() == "a") {
        var sFinalMarketingParameters = BuildFullURLWithEncodedValues(oMarketingParameters);
        var sNewURL = MergeURLWithParameters({url: $element.attr("href"), parameters: sFinalMarketingParameters});
        if (GetAAObject() != null && typeof (GetAAObject().visitor) != "undefined") {
            sNewURL = GetAAObject().visitor.appendVisitorIDsTo(sNewURL)
        }
        $element.attr("href", sNewURL)
    } else {
        if ($element[0].nodeName.toLowerCase() == "form") {
            if ($element.attr("method") == "post") {
                var sFinalMarketingParameters = BuildFullURLWithEncodedValues(oMarketingParameters);
                var sNewURL = MergeURLWithParameters({
                    url: $element.attr("action"),
                    parameters: sFinalMarketingParameters
                });
                if (GetAAObject() != null && typeof (GetAAObject().visitor) != "undefined") {
                    sNewURL = GetAAObject().visitor.appendVisitorIDsTo(sNewURL)
                }
                $element.attr("action", sNewURL)
            } else {
                for (var i = 0; i < oMarketingParameters.length; i++) {
                    var sParameterKey = oMarketingParameters[i].key;
                    var sParameterValue = oMarketingParameters[i].value;
                    if ($element.find("input[name='" + sParameterKey + "']").length == 0) {
                        $element.append("<input type='hidden' name='" + sParameterKey + "' value='' />")
                    }
                    $element.find("input[name='" + sParameterKey + "']").val(sParameterValue)
                }
                if (GetAAObject() != null && typeof (GetAAObject().visitor) != "undefined") {
                    var sTempURL = GetAAObject().visitor.appendVisitorIDsTo("https://www.test.com");
                    var uri = parseUri(sTempURL);
                    var sAdobeIdParameterKey = "adobe_mc";
                    if (typeof (uri.queryKey[sAdobeIdParameterKey]) != "undefined") {
                        var sAdobeIdParameterValue = decodeURIComponent(uri.queryKey[sAdobeIdParameterKey]);
                        if ($element.find("input[name='" + sAdobeIdParameterKey + "']").length == 0) {
                            $element.append("<input type='hidden' name='" + sAdobeIdParameterKey + "' value='' />")
                        }
                        $element.find("input[name='" + sAdobeIdParameterKey + "']").val(sAdobeIdParameterValue)
                    }
                }
            }
        } else {
            if ($element[0].nodeName.toLowerCase() == "iframe") {
                var sFinalMarketingParameters = BuildFullURLWithEncodedValues(oMarketingParameters);
                var sNewURL = MergeURLWithParameters({
                    url: $element.attr("src"),
                    parameters: sFinalMarketingParameters
                });
                if (GetAAObject() != null && typeof (GetAAObject().visitor) != "undefined") {
                    sNewURL = GetAAObject().visitor.appendVisitorIDsTo(sNewURL)
                }
                $element.attr("src", sNewURL)
            }
        }
    }
    $element.addClass("cdbeElementUpdated")
}

function AttachGoogleAnalyticsTrackingCookies() {
    (function ($) {
        $(function () {
            var sBookingEngineDomain = "secure-res.com";
            var domains = [];
            if (document.domain.indexOf(sBookingEngineDomain) == -1 && (WWPSiteProperties.hasSecureResIBE == true || WWPSiteProperties.cdbeDomains.length != 0)) {
                domains = domains.concat(WWPSiteProperties.cdbeDomains);
                if (WWPSiteProperties.hasSecureResIBE == true) {
                    domains.push(sBookingEngineDomain)
                }
            } else {
                if (document.domain.indexOf(sBookingEngineDomain) > -1) {
                    domains.push(WWPSiteProperties.domain)
                }
            }
            if (domains.length > 0) {
                var sDomainRegex = domains.join("|").replace(/\./g, "\\.");
                var oDomainRegex = new RegExp(sDomainRegex, "i");
                $("a").not(".gaElement").filter(function (attribute) {
                    return oDomainRegex.test($(this).attr("href"))
                }).addClass("gaElement").click(function () {
                    if ($(this).is(".gaElementUpdated") == false) {
                        this.href = pageTracker._getLinkerUrl(this.href);
                        $(this).addClass("gaElementUpdated")
                    }
                });
                $("form").not(".gaElement").filter(function (attribute) {
                    return oDomainRegex.test($(this).attr("action")) && $(this).attr("id") != "ibeForm"
                }).addClass("gaElement").submit(function () {
                    if ($(this).is(".gaElementUpdated") == false) {
                        this.action = pageTracker._getLinkerUrl(this.action);
                        $(this).addClass("gaElementUpdated")
                    }
                })
            }
            $("div.formWidget iframe, iframe[src^='http://www.secure-res.com/webapps/postcards/default.aspx']").not(".gaElement").each(function () {
                var newSrc = pageTracker._getLinkerUrl($(this).attr("src"));
                $(this).addClass("gaElement").attr("src", newSrc)
            })
        })
    })(jQuery)
}

function RedirectMobileDevicesToMobileSite() {
    var bIsMobileDevice = false;
    if (typeof (window.matchMedia) != "undefined") {
        if (window.matchMedia("(max-device-width: 599px) and (orientation: portrait)").matches) {
            bIsMobileDevice = true
        } else {
            if (window.matchMedia("(orientation: landscape)").matches) {
                if (screen.width < screen.height) {
                    if (window.matchMedia("(max-device-width: 599px)").matches) {
                        bIsMobileDevice = true
                    }
                } else {
                    if (window.matchMedia("(max-device-width: 799px)").matches) {
                        bIsMobileDevice = true
                    }
                }
            }
        }
    }
    if (bIsMobileDevice == true) {
        var uri = parseUri(window.location);
        var bRedirect = true;
        if (typeof (uri.queryKey.mobileRedirect) != "undefined") {
            bRedirect = false
        } else {
            if (typeof (uri.queryKey["WT.srch"]) != "undefined" && uri.queryKey["WT.srch"] == "1") {
                bRedirect = false
            }
        }
        if (bRedirect == true) {
            var url = "http://mobile." + document.domain.replace("www.", "");
            if (typeof (WWPSiteProperties) != "undefined" && typeof (WWPSiteProperties.mobileDomain) != "undefined" && WWPSiteProperties.mobileDomain != "") {
                var sProtocol = "http://";
                if (typeof (WWPSiteProperties.mobileDomainSSLMandatory) != "undefined" && WWPSiteProperties.mobileDomainSSLMandatory == true) {
                    sProtocol = "https://"
                }
                url = sProtocol + WWPSiteProperties.mobileDomain
            }
            var $alternate = $("head link[rel='alternate']:not([hreflang])");
            if ($alternate.length == 1) {
                if (typeof ($alternate.attr("href")) != "undefined" && $alternate.attr("href") != "") {
                    url = $alternate.attr("href")
                }
            }
            var qsConcatSymbol = "?";
            if (url.indexOf("?") != -1) {
                qsConcatSymbol = "&"
            }
            var qs = window.location.search.substring(1);
            if (qs != "") {
                url += qsConcatSymbol + qs;
                qsConcatSymbol = "&"
            }
            var referrer = document.referrer;
            if (referrer != "") {
                url += qsConcatSymbol + "referrer=" + encodeURIComponent(referrer)
            }
            var hash = document.location.hash;
            if (hash != "") {
                url += hash
            }
            document.location = url
        }
    }
}

var sTextOnlyViewCookieName = "TextOnlyView";
var sTextOnlyViewFontSizeCookieName = "TextOnlyViewFontSize";
var sTextOnlyViewStyleCookieName = "TextOnlyViewStyle";

function ToggleTextOnlyView() {
    if (readCookie(sTextOnlyViewCookieName) != "1") {
        createCookie(sTextOnlyViewCookieName, "1");
        location.reload()
    } else {
        createCookie(sTextOnlyViewCookieName, "0");
        location.reload()
    }
}

(function ($) {
    $(function () {
        if (readCookie(sTextOnlyViewCookieName) == "1") {
            for (i = 0; i < document.styleSheets.length; i++) {
                void (document.styleSheets.item(i).disabled = true)
            }
            var allElements = document.getElementsByTagName("*");
            for (var i = 0; i < allElements.length; i++) {
                allElements[i].style.cssText = ""
            }
            $("img").each(function () {
                $(this).hide().after("<span>" + $(this).attr("alt") + "</span>")
            });
            $("embed, object").hide();
            $("ul#mainNavLinks noscript, ul#subNavDownLinks noscript, ul#footerNavLinks noscript").each(function () {
                $(this).replaceWith($(this).text())
            });
            var headTag = document.getElementsByTagName("head")[0];
            var cssNode = document.createElement("link");
            cssNode.type = "text/css";
            cssNode.rel = "stylesheet";
            cssNode.href = "https://app.hospitalitysem.com/cms/sitefiles/templates/textonly.css";
            headTag.appendChild(cssNode);
            var dFontSize = 1;
            var sStyle = "blackonwhite";
            if (readCookie(sTextOnlyViewFontSizeCookieName) != "") {
                dFontSize = parseFloat(readCookie(sTextOnlyViewFontSizeCookieName))
            }
            if (readCookie(sTextOnlyViewStyleCookieName) != "") {
                sStyle = readCookie(sTextOnlyViewStyleCookieName)
            }
            var sHTML = "";
            sHTML += '<div id="textOnlyOptions">';
            sHTML += '<p><a href="#" alt="Back to Top">Back to Top</a></p>';
            sHTML += "<hr />";
            sHTML += '<a rel="nofollow" href="#textOnlyOptions" accesskey="t" title="Anchor to Text Only Options"></a>';
            sHTML += '<h2><a name="textOnlyOptions">Text Only Options</a></h2>';
            sHTML += "<ul>";
            sHTML += '  <li>Change the current font size:  <a href="#textOnlyOptions" class="textOnlyOptionsFontLarger">Larger</a> | <a href="#textOnlyOptions" class="textOnlyOptionsFontDefault">Default</a> | <a href="#textOnlyOptions" class="textOnlyOptionsFontSmaller">Smaller</a></li>';
            sHTML += '  <li>Change the color mode:  <a href="#textOnlyOptions" class="textOnlyOptionsColor">Black on White</a> | <a href="#textOnlyOptions" class="textOnlyOptionsColor">Yellow on Black</a> | <a href="#textOnlyOptions" class="textOnlyOptionsColor">Black on Cream</a></li>';
            sHTML += "</ul>";
            sHTML += '<p>Open the <a href="javascript:ToggleTextOnlyView();" alt="Open the original version of this site">original version </a>of this page.</p>';
            sHTML += '<p>This site meets 508 Compliance guidelines based on <a href="http://www.w3.org/TR/WCAG20/" target="_blank">WCAG 2.0 (Level AA)</a></p>';
            sHTML += "</div>";
            $("body").append(sHTML);

            function ChangeFontSize(iDirection, bInitialLoad) {
                if (bInitialLoad == false) {
                    if (iDirection == 1) {
                        dFontSize += 0.2
                    } else {
                        if (iDirection == -1 && dFontSize > 0.8) {
                            dFontSize -= 0.2
                        } else {
                            if (iDirection == 0) {
                                dFontSize = 1
                            }
                        }
                    }
                }
                if (dFontSize == 1) {
                    $("a.textOnlyOptionsFontDefault").removeAttr("href")
                } else {
                    $("a.textOnlyOptionsFontDefault").attr("href", "#textOnlyOptions")
                }
                $("body").css("font-size", dFontSize + "em");
                createCookie(sTextOnlyViewFontSizeCookieName, dFontSize)
            }

            function ChangeStyle(link) {
                if (typeof (link) != "undefined") {
                    sStyle = $(link).text().replace(/\s/g, "").toLowerCase()
                }
                $("a.textOnlyOptionsColor").each(function () {
                    var sLinkStyle = $(this).text().replace(/\s/g, "").toLowerCase();
                    if (sLinkStyle == sStyle) {
                        $(this).removeAttr("href")
                    } else {
                        $(this).attr("href", "#textOnlyOptions")
                    }
                    $("body").removeClass(sLinkStyle)
                });
                $("body").addClass(sStyle);
                createCookie(sTextOnlyViewStyleCookieName, sStyle)
            }

            $("a.textOnlyOptionsFontLarger").click(function () {
                ChangeFontSize(1, false)
            });
            $("a.textOnlyOptionsFontDefault").click(function () {
                ChangeFontSize(0, false)
            });
            $("a.textOnlyOptionsFontSmaller").click(function () {
                ChangeFontSize(-1, false)
            });
            ChangeFontSize(0, true);
            $("a.textOnlyOptionsColor").click(function () {
                ChangeStyle(this)
            });
            ChangeStyle()
        }
    })
})(jQuery);

function TrackViewFullWebsiteClicks() {
    (function ($) {
        $(function () {
            $(".toggleDeviceViewLink").click(function () {
                if (typeof (WWPSiteProperties.OmnitureReportSuiteId) != "undefined" && WWPSiteProperties.OmnitureReportSuiteId != "" && GetAAObject() != null) {
                    var s = s_gi(WWPSiteProperties.OmnitureReportSuiteId);
                    s.linkTrackVars = "events";
                    s.linkTrackEvents = "event17";
                    s.events = "event17";
                    s.tl(this, "o", "view full website")
                }
            })
        })
    })(jQuery)
}

function s_gi() {
    return {
        tl: function () {
        }
    }
}

function ActivateTimeSensitiveWidgets(options) {
    (function (n, f) {
        var u = n.parse, c = [1, 4, 5, 6, 7, 10, 11];
        n.parse = function (t) {
            var i, o, a = 0;
            if (o = /^(\d{4}|[+\-]\d{6})(?:-(\d{2})(?:-(\d{2}))?)?(?:T(\d{2}):(\d{2})(?::(\d{2})(?:\.(\d{3}))?)?(?:(Z)|([+\-])(\d{2})(?::(\d{2}))?)?)?$/.exec(t)) {
                for (var v = 0, r; r = c[v]; ++v) {
                    o[r] = +o[r] || 0
                }
                o[2] = (+o[2] || 1) - 1, o[3] = +o[3] || 1, o[8] !== "Z" && o[9] !== f && (a = o[10] * 60 + o[11], o[9] === "+" && (a = 0 - a)), i = n.UTC(o[1], o[2], o[3], o[4], o[5] + a, o[6], o[7])
            } else {
                i = u ? u(t) : NaN
            }
            return i
        }
    })(Date);
    defaultOptions = {widgetShellId: "", debug: false, timeZoneName: "", itemClassName: "", showElementsWhenDone: true};
    options = $.extend({}, defaultOptions, options);
    var sTimezoneName = "";
    if (options.timeZoneName != "") {
        sTimezoneName = options.timeZoneName
    } else {
        if (typeof (WWPSiteProperties.TimeZoneName) != "undefined") {
            sTimezoneName = WWPSiteProperties.TimeZoneName
        } else {
            alert("Unable to identify timezone name, make sure it is set on the Account Settings page.");
            return false
        }
    }
    var sCacheURL = "";
    if (WWPSiteProperties.hasOwnProperty("hasCDN") == false || (WWPSiteProperties.hasOwnProperty("hasCDN") == true && WWPSiteProperties.hasCDN == false) || WWPSiteProperties.inCMS == true) {
        sCacheURL = "https://app.hospitalitysem.com/cms/cdn-cache.aspx"
    } else {
        var sWWW = "";
        if (WWPSiteProperties.domain.indexOf(".") == WWPSiteProperties.domain.lastIndexOf(".")) {
            sWWW = "www."
        }
        sCacheURL = "https://" + sWWW + WWPSiteProperties.domain + "/cdn-cache.aspx"
    }
    if (WWPSiteProperties.hasOwnProperty("CMSDomainName") == true && (WWPSiteProperties.CMSDomainName.indexOf("dev.com") > -1 || WWPSiteProperties.CMSDomainName.indexOf("release.com") > -1)) {
        sCacheURL = "cdn-cache.aspx"
    }
    var sCallback = "Time" + sTimezoneName.replace(/[^0-9a-zA-Z]/g, "") + options.widgetShellId.replace(/[^0-9a-zA-Z]/g, "") + options.itemClassName.replace(/[^0-9a-zA-Z]/g, "");
    var sRequestURL = window.location.protocol + "//" + WWPSiteProperties.CMSDomainName + "/time/index.aspx?timezoneName=" + sTimezoneName + "&callback=" + sCallback;
    $.ajax({
        url: sCacheURL + "?url=" + encodeURIComponent(sRequestURL) + "&cacheseconds=30",
        dataType: "jsonp",
        cache: true,
        jsonp: false,
        jsonpCallback: sCallback,
        success: TimeCallbackFunction
    });

    function TimeCallbackFunction(data) {
        var oPropertyDateTime = new Date(Date.parse(data.currentDateTime));
        if (options.debug) {
            console.log(options.widgetShellId)
        }
        if (options.debug) {
            console.log("currentDateTime " + data.currentDateTime)
        }
        var sItemClassName = "";
        if (options.itemClassName != "") {
            sItemClassName = "." + options.itemClassName
        }
        $("#" + options.widgetShellId + " " + sItemClassName + ".datetimeSensitive[data-startdatetime][data-enddatetime]").filter("[data-startdatetime=''][data-enddatetime='']").each(function () {
            if (options.showElementsWhenDone == true) {
                $(this).show()
            }
        }).end().filter("[data-startdatetime!=''],[data-enddatetime!='']").each(function () {
            var sStartDateTime = $(this).attr("data-startdatetime");
            if (sStartDateTime == "") {
                sStartDateTime = "2000-01-01T00:00:00Z"
            }
            var sEndDateTime = $(this).attr("data-enddatetime");
            if (sEndDateTime == "") {
                sEndDateTime = "3000-01-01T00:00:00Z"
            }
            if (options.debug) {
                console.log("startDateTime " + sStartDateTime)
            }
            if (options.debug) {
                console.log("endDateTime " + sEndDateTime)
            }
            var oStartDateTime = new Date(Date.parse(sStartDateTime));
            var oEndDateTime = new Date(Date.parse(sEndDateTime));
            if (!(oStartDateTime <= oPropertyDateTime && oPropertyDateTime <= oEndDateTime)) {
                $(this).remove()
            } else {
                if (options.showElementsWhenDone == true) {
                    $(this).show()
                }
            }
        });
        $("#" + options.widgetShellId).trigger("datetimeSensitiveWidgetsProcessed")
    }
}

function ActivateWeightedWidgets(options) {
    defaultOptions = {widgetShellId: "", debug: false};
    options = $.extend({}, defaultOptions, options);
    var $oUniqueParentsWithWeightedChildren = $.unique($("#" + options.widgetShellId + " .randomizeWeighted[data-randomizeweight]").filter("[data-randomizeweight='']").show().end().filter("[data-randomizeweight!='']").parent());
    $($oUniqueParentsWithWeightedChildren).each(function () {
        var oWeightedElementArray = [];
        var $oParentWeightedChildren = $(".randomizeWeighted[data-randomizeweight][data-randomizeweight!='']", this);
        $oParentWeightedChildren.each(function () {
            var iElementWeight = parseInt($(this).attr("data-randomizeWeight"), 10);
            if (options.debug) {
                console.log($(this).attr("class") + " - " + iElementWeight)
            }
            for (var i = 0; i < iElementWeight; i++) {
                oWeightedElementArray.push(this)
            }
        });
        var iRandomNumber = Math.floor(Math.random() * oWeightedElementArray.length);
        if (options.debug) {
            console.log(oWeightedElementArray.length + " - " + iRandomNumber)
        }
        $(oWeightedElementArray[iRandomNumber]).addClass("randomizedWeightedWinner").show();
        if (options.debug) {
            console.log("winner " + $(oWeightedElementArray[iRandomNumber]).attr("class"))
        }
        $oParentWeightedChildren.not(".randomizedWeightedWinner").remove()
    });
    $("#" + options.widgetShellId).trigger("weightedWidgetsProcessed")
}

function ShowWebsiteNotification(options) {
    defaultOptions = {
        cookieName: "websiteNotificationSeen",
        cookieExpirationDays: 365,
        titleText: "Notification",
        messageText: "This is the notifications",
        buttonText: "Don't Show Again",
        containerSelector: "body",
        containerAddMethod: "p",
        html: "<div id='websiteNotification'> <div id='websiteNotificationBody'>   <div id='websiteNotificationTitle'>{!TitleText}</div>   <div id='websiteNotificationMessage'>{!MessageText}</div> </div> <a id='websiteNotificationButton' href=''>{!ButtonText}</a></div>"
    };
    options = $.extend({}, defaultOptions, options);
    if (readCookie(options.cookieName) != "1") {
        var sHTML = options.html;
        sHTML = sHTML.replace("{!TitleText}", options.titleText);
        sHTML = sHTML.replace("{!MessageText}", options.messageText);
        sHTML = sHTML.replace("{!ButtonText}", options.buttonText);
        var $HTML = $(sHTML);
        $HTML.find("#websiteNotificationButton").click(function () {
            createCookie(options.cookieName, "1", options.cookieExpirationDays);
            $("#websiteNotification").remove();
            return false
        });
        if (options.containerAddMethod == "a") {
            $(options.containerSelector).append($HTML)
        } else {
            if (options.containerAddMethod == "p") {
                $(options.containerSelector).prepend($HTML)
            }
        }
    }
}

function MergeURLWithParameters(options) {
    defaultOptions = {url: "", parameters: ""};
    options = $.extend({}, defaultOptions, options);
    var sFinalURL = "";
    if (options.parameters != "") {
        var oNewParameters = options.parameters.split("&");
        var oNewParameterKeys = [];
        var oFinalParameters = [];
        for (var i = 0; i < oNewParameters.length; i++) {
            oFinalParameters.push(oNewParameters[i]);
            var sNewParameterKey = oNewParameters[i].split("=")[0];
            oNewParameterKeys.push(sNewParameterKey)
        }
        var oCurrentQS = options.url.split("?");
        if (oCurrentQS.length == 2) {
            var sCurrentQS = oCurrentQS[1];
            var oCurrentParameters = sCurrentQS.split("&");
            for (var i = oCurrentParameters.length - 1; i >= 0; i--) {
                var sCurrentParameterKey = oCurrentParameters[i].split("=")[0];
                if ($.inArray(sCurrentParameterKey, oNewParameterKeys) == -1) {
                    oFinalParameters.splice(0, 0, oCurrentParameters[i])
                }
            }
        }
        sFinalURL = oCurrentQS[0] + "?" + oFinalParameters.join("&")
    } else {
        sFinalURL = options.url
    }
    return sFinalURL
}

function RequestGEOLocationCoordinates(options) {
    var defaultOptions = {
        latitudeCookie: "geocoordinateslatitude",
        longitudeCookie: "geocoordinateslongitude",
        cookieExpirationDays: null,
        requestTimeout: 10,
        bodyEventName: "geolocationDone"
    };
    options = $.extend({}, defaultOptions, options);
    if (typeof (navigator.geolocation) != "undefined") {
        if (readCookie(options.latitudeCookie) == "" || readCookie(options.longitudeCookie) == "") {
            navigator.geolocation.getCurrentPosition(function (position) {
                if (options.cookieExpirationDays == null) {
                    createCookie(options.latitudeCookie, position.coords.latitude);
                    createCookie(options.longitudeCookie, position.coords.longitude)
                } else {
                    createCookie(options.latitudeCookie, position.coords.latitude, options.cookieExpirationDays);
                    createCookie(options.longitudeCookie, position.coords.longitude, options.cookieExpirationDays)
                }
                if (options.bodyEventName != null) {
                    $("body").trigger(options.bodyEventName, [options])
                }
            }, function (error) {
                if (error.code == 1) {
                } else {
                    if (error.code == 2) {
                    } else {
                        if (error.code == 3) {
                        }
                    }
                }
            }, {timeout: options.requestTimeout * 1000})
        } else {
            if (options.bodyEventName != null) {
                $("body").trigger(options.bodyEventName, [options])
            }
        }
    } else {
    }
}

(function ($) {
    $(function () {
        if (typeof (WWPSiteProperties) != "undefined" && typeof (WWPSiteProperties.OmnitureReportSuiteId) != "undefined" && WWPSiteProperties.OmnitureReportSuiteId != "") {
            if (typeof ($().delegate) != "undefined") {
                $("body").delegate("a[href^='tel:'],a[href^='callto:']", "click", function (e) {
                    if (GetAAObject() != null) {
                        var s = s_gi(WWPSiteProperties.OmnitureReportSuiteId);
                        s.linkTrackVars = "events";
                        s.linkTrackEvents = "event22";
                        s.events = "event22";
                        s.tl(this, "o", "clicks-to-call")
                    }
                })
            }
        }
    })
})(jQuery);
(function ($) {
    $(function () {
        if (typeof (WWPSiteProperties) != "undefined" && typeof (WWPSiteProperties.OmnitureReportSuiteId) != "undefined" && WWPSiteProperties.OmnitureReportSuiteId != "") {
            if (typeof ($().delegate) != "undefined") {
                $("body").delegate("a[href*='WT.ic_id'],a[href*='wt.ic_id']", "click", function (e) {
                    var sValue = "";
                    var uri = parseUri($(this).attr("href"));
                    if (typeof (uri.queryKey["WT.ic_id"]) != "undefined") {
                        sValue = uri.queryKey["WT.ic_id"]
                    } else {
                        sValue = uri.queryKey["wt.ic_id"]
                    }
                    if (GetAAObject() != null) {
                        var s = s_gi(WWPSiteProperties.OmnitureReportSuiteId);
                        s.linkTrackVars = "eVar19";
                        s.eVar19 = sValue;
                        s.tl(this, "o", "internal campaign")
                    }
                });
                $("body").delegate("[data-internalcampaign]", "click", function (e) {
                    if ($(this).attr("data-internalcampaign") != "") {
                        if (GetAAObject() != null) {
                            var s = s_gi(WWPSiteProperties.OmnitureReportSuiteId);
                            s.linkTrackVars = "eVar19";
                            s.eVar19 = $(this).attr("data-internalcampaign");
                            s.tl(this, "o", "internal campaign")
                        }
                    }
                })
            }
        }
    })
})(jQuery);
(function ($) {
    function CMSWindowMessageHandler(event) {
        var sEventData = event.data;
        if (typeof (sEventData) == "string") {
            if (sEventData.charAt(0) == "{" && sEventData.charAt(sEventData.length - 1) == "}") {
                var oMessageJSON = JSON.parse(event.data);
                if (oMessageJSON.hasOwnProperty("messageType")) {
                    if (oMessageJSON.messageType == "FormSubmissionJSON") {
                        var oSubmissionsHistory = null;
                        if (localStorage.getItem("VizergyFormsData") === null) {
                            oSubmissionsHistory = {submissions: []}
                        } else {
                            var s = localStorage.VizergyFormsData;
                            oSubmissionsHistory = JSON.parse(s)
                        }
                        oSubmissionsHistory.submissions.push(oMessageJSON.messageData);
                        var sfinalstring = JSON.stringify(oSubmissionsHistory);
                        localStorage.VizergyFormsData = sfinalstring;
                        $("body").trigger("VizergyFormsDataAvailable" + oMessageJSON.messageData.FormId)
                    } else {
                        if (oMessageJSON.messageType == "IframeAdobeAnalytics") {
                            if (typeof (WWPSiteProperties.OmnitureReportSuiteId) != "undefined" && WWPSiteProperties.OmnitureReportSuiteId != "" && GetAAObject() != null) {
                                var s = s_gi(WWPSiteProperties.OmnitureReportSuiteId);
                                for (var sProperty in oMessageJSON.messageData.analyticsObject) {
                                    if (oMessageJSON.messageData.analyticsObject.hasOwnProperty(sProperty)) {
                                        s[sProperty] = oMessageJSON.messageData.analyticsObject[sProperty]
                                    }
                                }
                                if (oMessageJSON.messageData.hasOwnProperty("analyticsTrackingCallType") && oMessageJSON.messageData.analyticsTrackingCallType == "PageView") {
                                    s.t()
                                } else {
                                    s.tl(this, "o", "iframe event")
                                }
                            }
                        } else {
                            if (oMessageJSON.messageType == "IframeAlert") {
                                if (oMessageJSON.hasOwnProperty("messageData") && typeof (oMessageJSON.messageData) == "string") {
                                    alert(oMessageJSON.messageData)
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    if (window.addEventListener) {
        addEventListener("message", CMSWindowMessageHandler, false)
    } else {
        attachEvent("onmessage", CMSWindowMessageHandler)
    }
})(jQuery);

function FindRecentFormSubmission(options) {
    var defaultOptions = {formid: null, withinXDays: null};
    options = $.extend({}, defaultOptions, options);
    var oRecentSubmission = null;
    if (localStorage.getItem("VizergyFormsData") !== null) {
        var oLocalstorage = JSON.parse(localStorage.VizergyFormsData);
        for (c = oLocalstorage.submissions.length - 1; c >= 0; c--) {
            if (oLocalstorage.submissions[c].FormId == options.formid || options.formid == null) {
                var oSubmissionUTCDate = new Date(Date.parse(oLocalstorage.submissions[c].DateSubmitted));
                var oSubmissionClientDate = new Date(oSubmissionUTCDate.getUTCFullYear(), oSubmissionUTCDate.getUTCMonth(), oSubmissionUTCDate.getUTCDate(), oSubmissionUTCDate.getUTCHours(), oSubmissionUTCDate.getUTCMinutes(), oSubmissionUTCDate.getUTCSeconds());
                var oNowClientDate = new Date(Date.now());
                var iDaysSinceSubmission = Math.round((oNowClientDate - oSubmissionClientDate) / (1000 * 60 * 60 * 24));
                if (options.withinXDays == null || iDaysSinceSubmission <= options.withinXDays) {
                    oRecentSubmission = oLocalstorage.submissions[c];
                    break
                }
            }
        }
    }
    return oRecentSubmission
}

(function () {
    if (document.location.search.indexOf("clearformdata") != -1) {
        localStorage.removeItem("VizergyFormsData")
    }
    if (document.location.search.indexOf("clearpersonalization") != -1) {
        document.cookie.split(";").forEach(function (c) {
            if (c.includes("vizaudience") || c.includes("vizvisitor")) {
                createCookie(c, "", -1)
            }
        })
    }
})();
/*
 * Accessible Datepicker v2.1.19
 * Copyright 2015-2019 Eureka2, Jacques Archimède.
 * Based on the example of the Open AJAX Alliance Accessibility Tools Task Force : http://www.oaa-accessibility.org/examplep/datepicker1/
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * Inspired by :
 * http://wet-boew.github.io/wet-boew/demos/datepicker/datepicker-fr.html
 * http://eternicode.github.io/bootstrap-datepicker
 */
(function () {
    if (typeof Date.dp_locales === "undefined") {
        Date.dp_locales = {
            texts: {
                buttonTitle: "Select date ...",
                buttonLabel: "Click or press the Enter key or the spacebar to open the calendar",
                prevButtonLabel: "Go to previous month",
                prevMonthButtonLabel: "Go to the previous year",
                prevYearButtonLabel: "Go to the previous twenty years",
                nextButtonLabel: "Go to next month",
                nextMonthButtonLabel: "Go to the next year",
                nextYearButtonLabel: "Go to the next twenty years",
                changeMonthButtonLabel: "Click or press the Enter key or the spacebar to change the month",
                changeYearButtonLabel: "Click or press the Enter key or the spacebar to change the year",
                changeRangeButtonLabel: "Click or press the Enter key or the spacebar to go to the next twenty years",
                closeButtonTitle: "Close",
                closeButtonLabel: "Close the calendar",
                calendarHelp: "- Up Arrow and Down Arrow - goes to the same day of the week in the previous or next week respectively. If the end of the month is reached, continues into the next or previous month as appropriate.\r\n- Left Arrow and Right Arrow - advances one day to the next, also in a continuum. Visually focus is moved from day to day and wraps from row to row in the grid of days.\r\n- Control+Page Up - Moves to the same date in the previous year.\r\n- Control+Page Down - Moves to the same date in the next year.\r\n- Home - Moves to the first day of the current month.\r\n- End - Moves to the last day of the current month.\r\n- Page Up - Moves to the same date in the previous month.\r\n- Page Down - Moves to the same date in the next month.\r\n- Enter or Espace - closes the calendar, and the selected date is shown in the associated text box.\r\n- Escape - closes the calendar without any action."
            },
            directionality: "LTR",
            month_names: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            month_names_abbreviated: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            month_names_narrow: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
            day_names: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            day_names_abbreviated: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            day_names_short: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
            day_names_narrow: ["S", "M", "T", "W", "T", "F", "S"],
            day_periods: {am: "AM", noon: "noon", pm: "PM"},
            day_periods_abbreviated: {am: "AM", noon: "noon", pm: "PM"},
            day_periods_narrow: {am: "a", noon: "n", pm: "p"},
            quarter_names: ["1st quarter", "2nd quarter", "3rd quarter", "4th quarter"],
            quarter_names_abbreviated: ["Q1", "Q2", "Q3", "Q4"],
            quarter_names_narrow: ["1", "2", "3", "4"],
            era_names: ["Before Christ", "Anno Domini"],
            era_names_abbreviated: ["BC", "AD"],
            era_names_narrow: ["B", "A"],
            full_format: "EEEE, MMMM d, y",
            long_format: "MMMM d, y",
            medium_format: "MMM d, y",
            short_format: "M/d/yy",
            firstday_of_week: 0
        }
    }
})();
(function (factory) {
    if (typeof define === "function" && define.amd) {
        define(["jquery"], factory)
    } else {
        if (typeof exports === "object") {
            factory(require("jquery"))
        } else {
            if (typeof jQuery === "undefined") {
                throw new Error("Datepicker's JavaScript requires jQuery")
            }
            factory(jQuery)
        }
    }
}(function ($, undefined) {
    var datepickerButton3 = ['<a class="datepicker-button bootstrap3 input-group-addon" role="button" aria-haspopup="true" tabindex="0" aria-labelledby="datepicker-bn-open-label-CALENDARID">', '    <span class="fa fa-calendar" title="Select Date..."></span>', "</a>"];
    var datepickerCalendar3 = ['<div class="datepicker-calendar bootstrap3" id="datepicker-calendar-CALENDARID" aria-hidden="false">', '    <div class="datepicker-month-wrap">', '         <div class="datepicker-button datepicker-month-fast-next pull-right" role="button" aria-labelledby="datepicker-bn-fast-next-label-CALENDARID" tabindex="0"><span class="fa fa-angle-double-right"></span></div>', '         <div class="datepicker-button datepicker-month-next pull-right" role="button" aria-labelledby="datepicker-bn-next-label-CALENDARID" tabindex="0"><span class="fa fa-angle-right"></span></div>', '         <div class="datepicker-button datepicker-month-fast-prev pull-left" role="button" aria-labelledby="datepicker-bn-fast-prev-label-CALENDARID" tabindex="0"><span class="fa fa-angle-double-left"></span></div>', '         <div class="datepicker-button datepicker-month-prev pull-left" role="button" aria-labelledby="datepicker-bn-prev-label-CALENDARID" tabindex="0"><span class="fa fa-angle-left"></span></div>', '         <div id="datepicker-month-CALENDARID" class="datepicker-button datepicker-month" tabindex="0" aria-live="assertive" aria-atomic="true" title="Click or press the Enter key or the spacebar to change the month">July 2015</div>', "    </div>", '     <table class="datepicker-grid" role="grid" aria-readonly="true" aria-activedescendant="datepicker-err-msg-CALENDARID" aria-labelledby="datepicker-month-CALENDARID" tabindex="0">', '          <thead role="presentation">', '               <tr class="datepicker-weekdays" role="row">', '                    <th scope="col" id="day0-header-CALENDARID" class="datepicker-day" role="columnheader" aria-label="Sunday"><abbr title="Sunday">Su</abbr></th>', '                    <th scope="col" id="day1-header-CALENDARID" class="datepicker-day" role="columnheader" aria-label="Monday"><abbr title="Monday">Mo</abbr></th>', '                    <th scope="col" id="day2-header-CALENDARID" class="datepicker-day" role="columnheader" aria-label="Tuesday"><abbr title="Tuesday">Tu</abbr></th>', '                    <th scope="col" id="day3-header-CALENDARID" class="datepicker-day" role="columnheader" aria-label="Wednesday"><abbr title="Wednesday">We</abbr></th>', '                    <th scope="col" id="day4-header-CALENDARID" class="datepicker-day" role="columnheader" aria-label="Thursday"><abbr title="Thursday">Th</abbr></th>', '                    <th scope="col" id="day5-header-CALENDARID" class="datepicker-day" role="columnheader" aria-label="Friday"><abbr title="Friday">Fr</abbr></th>', '                    <th scope="col" id="day6-header-CALENDARID" class="datepicker-day" role="columnheader" aria-label="Saturday"><abbr title="Saturday">Sa</abbr></th>', "               </tr>", "          </thead>", '          <tbody role="presentation">', "               <tr>", '                    <td id="datepicker-err-msg-CALENDARID" colspan="7">Javascript must be enabled</td>', "               </tr>", "          </tbody>", "     </table>", '     <div class="datepicker-close-wrap">', '          <button class="datepicker-button datepicker-close" id="datepicker-close-CALENDARID" aria-labelledby="datepicker-bn-close-label-CALENDARID">Close</button>', "     </div>", '     <div id="datepicker-bn-open-label-CALENDARID" class="datepicker-bn-open-label offscreen">Click or press the Enter key or the spacebar to open the calendar</div>', '     <div id="datepicker-bn-prev-label-CALENDARID" class="datepicker-bn-prev-label offscreen">Go to previous month</div>', '     <div id="datepicker-bn-next-label-CALENDARID" class="datepicker-bn-next-label offscreen">Go to next month</div>', '     <div id="datepicker-bn-fast-prev-label-CALENDARID" class="datepicker-bn-fast-prev-label offscreen">Go to previous year</div>', '     <div id="datepicker-bn-fast-next-label-CALENDARID" class="datepicker-bn-fast-next-label offscreen">Go to next year</div>', '     <div id="datepicker-bn-close-label-CALENDARID" class="datepicker-bn-close-label offscreen">Close the date picker</div>', "</div>"];
    var datepickerButton4 = ['<a class="datepicker-button bootstrap4 input-group-append" role="button" aria-haspopup="true" tabindex="0" aria-labelledby="datepicker-bn-open-label-CALENDARID">', '     <span class="input-group-text"><i class="far fa-calendar-alt" title="Select Date..."></i></span>', "</a>"];
    var datepickerCalendar4 = ['<div class="datepicker-calendar bootstrap4" id="datepicker-calendar-CALENDARID" aria-hidden="false">', '     <div class="datepicker-month-wrap">', '          <div class="datepicker-button datepicker-month-fast-next float-right" role="button" aria-labelledby="datepicker-bn-fast-next-label-CALENDARID" tabindex="0"><i class="fas fa-forward"></i></div>', '          <div class="datepicker-button datepicker-month-next float-right" role="button" aria-labelledby="datepicker-bn-next-label-CALENDARID" tabindex="0"><i class="fas fa-caret-right"></i></div>', '          <div class="datepicker-button datepicker-month-fast-prev float-left" role="button" aria-labelledby="datepicker-bn-fast-prev-label-CALENDARID" tabindex="0"><i class="fas fa-backward"></i></div>', '          <div class="datepicker-button datepicker-month-prev float-left" role="button" aria-labelledby="datepicker-bn-prev-label-CALENDARID" tabindex="0"><i class="fas fa-caret-left"></i></div>', '          <div id="datepicker-month-CALENDARID" class="datepicker-button datepicker-month" tabindex="0" aria-live="assertive" aria-atomic="true" title="Click or press the Enter key or the spacebar to change the month">July 2015</div>', "     </div>", '     <table class="datepicker-grid" role="grid" aria-readonly="true" aria-activedescendant="datepicker-err-msg-CALENDARID" aria-labelledby="datepicker-month-CALENDARID" tabindex="0">', '          <thead role="presentation">', '               <tr class="datepicker-weekdays" role="row">', '                    <th scope="col" id="day0-header-CALENDARID" class="datepicker-day" role="columnheader" aria-label="Sunday"><abbr title="Sunday">Su</abbr></th>', '                    <th scope="col" id="day1-header-CALENDARID" class="datepicker-day" role="columnheader" aria-label="Monday"><abbr title="Monday">Mo</abbr></th>', '                    <th scope="col" id="day2-header-CALENDARID" class="datepicker-day" role="columnheader" aria-label="Tuesday"><abbr title="Tuesday">Tu</abbr></th>', '                    <th scope="col" id="day3-header-CALENDARID" class="datepicker-day" role="columnheader" aria-label="Wednesday"><abbr title="Wednesday">We</abbr></th>', '                    <th scope="col" id="day4-header-CALENDARID" class="datepicker-day" role="columnheader" aria-label="Thursday"><abbr title="Thursday">Th</abbr></th>', '                    <th scope="col" id="day5-header-CALENDARID" class="datepicker-day" role="columnheader" aria-label="Friday"><abbr title="Friday">Fr</abbr></th>', '                    <th scope="col" id="day6-header-CALENDARID" class="datepicker-day" role="columnheader" aria-label="Saturday"><abbr title="Saturday">Sa</abbr></th>', "               </tr>", "          </thead>", '          <tbody role="presentation">', "               <tr>", '                    <td id="datepicker-err-msg-CALENDARID" colspan="7">Javascript must be enabled</td>', "               </tr>", "          </tbody>", "     </table>", '     <div class="datepicker-close-wrap">', '          <button class="datepicker-button datepicker-close" id="datepicker-close-CALENDARID" aria-labelledby="datepicker-bn-close-label-CALENDARID">Close</button>', "     </div>", '     <div id="datepicker-bn-open-label-CALENDARID" class="datepicker-bn-open-label offscreen">Click or press the Enter key or the spacebar to open the calendar</div>', '     <div id="datepicker-bn-prev-label-CALENDARID" class="datepicker-bn-prev-label offscreen">Go to previous month</div>', '     <div id="datepicker-bn-next-label-CALENDARID" class="datepicker-bn-next-label offscreen">Go to next month</div>', '     <div id="datepicker-bn-fast-prev-label-CALENDARID" class="datepicker-bn-fast-prev-label offscreen">Go to previous year</div>', '     <div id="datepicker-bn-fast-next-label-CALENDARID" class="datepicker-bn-fast-next-label offscreen">Go to next year</div>', '     <div id="datepicker-bn-close-label-CALENDARID" class="datepicker-bn-close-label offscreen">Close the date picker</div>', "</div>"];
    var Datepicker = function (target, options) {
        var self = this;
        this.$target = $(target);
        this.options = $.extend({}, Datepicker.DEFAULTS, options);
        this.locales = Date.dp_locales;
        this.startview(this.options.startView);
        if (typeof this.options.inputFormat === "string") {
            this.options.inputFormat = [this.options.inputFormat]
        }
        if (!$.isArray(this.options.datesDisabled)) {
            this.options.datesDisabled = [this.options.datesDisabled]
        }
        $.each(this.options.datesDisabled, function (i, v) {
            if (typeof v === "string") {
                var date = self.parseDate(v);
                if (date === null) {
                    self.options.datesDisabled[i] = null
                } else {
                    self.options.datesDisabled[i] = self.format(date)
                }
            } else {
                if (v instanceof Date && !isNaN(v.valueOf())) {
                    self.options.datesDisabled[i] = self.format(v)
                } else {
                    self.options.datesDisabled[i] = null
                }
            }
        });
        if (this.options.min != null) {
            this.options.min = this.parseDate(this.options.min)
        } else {
            if (this.$target.attr("min")) {
                this.options.min = this.parseDate(this.$target.attr("min"))
            }
        }
        if (this.options.max != null) {
            this.options.max = this.parseDate(this.options.max)
        } else {
            if (this.$target.attr("max")) {
                this.options.max = this.parseDate(this.$target.attr("max"))
            }
        }
        if (typeof this.options.previous === "string") {
            this.options.previous = $(this.options.previous)
        } else {
            if (!(this.options.previous instanceof jQuery)) {
                this.options.previous = null
            }
        }
        if (typeof this.options.next === "string") {
            this.options.next = $(this.options.next)
        } else {
            if (!(this.options.next instanceof jQuery)) {
                this.options.next = null
            }
        }
        this.id = this.$target.attr("id") || "datepicker-" + Math.floor(Math.random() * 100000);
        var calendar = this.options.markup == "bootstrap3" ? datepickerCalendar3.join("") : datepickerCalendar4.join("");
        calendar = calendar.replace(/CALENDARID/g, this.id + "");
        if (this.$target.parent(".input-group").length == 0) {
            this.$target.wrap('<div class="input-group"></div>')
        }
        this.$group = this.$target.parent(".input-group");
        this.$target.attr("aria-autocomplete", "none");
        this.$target.css("min-width", "7em");
        this.$target.addClass("form-control");
        if (!this.$target.attr("placeholder")) {
            this.$target.attr("placeholder", this.options.inputFormat[0])
        }
        var button = this.options.markup == "bootstrap3" ? datepickerButton3.join("") : datepickerButton4.join("");
        button = button.replace(/CALENDARID/g, this.id + "");
        this.$button = $(button);
        this.$button.addClass(this.options.theme);
        this.$calendar = $(calendar);
        this.$calendar.addClass(this.options.theme);
        if (this.options.buttonLeft) {
            this.$target.before(this.$button)
        } else {
            this.$target.after(this.$button)
        }
        if (this.$calendar.parent().css("position") === "static") {
            this.$calendar.parent().css("position", "relative")
        }
        this.$calendar.find(".datepicker-bn-open-label").html(this.options.buttonLabel);
        if (this.$target.attr("id")) {
            this.$calendar.attr("aria-controls", this.$target.attr("id"))
        }
        this.$button.find("span").attr("title", this.options.buttonTitle);
        this.$calendar.css("left", this.$target.parent().position().left + "px");
        this.$monthObj = this.$calendar.find(".datepicker-month");
        this.$prev = this.$calendar.find(".datepicker-month-prev");
        this.$next = this.$calendar.find(".datepicker-month-next");
        this.$fastprev = this.$calendar.find(".datepicker-month-fast-prev");
        this.$fastnext = this.$calendar.find(".datepicker-month-fast-next");
        this.$grid = this.$calendar.find(".datepicker-grid");
        if (this.locales.directionality === "RTL") {
            this.$grid.addClass("rtl")
        }
        var $days = this.$grid.find("th.datepicker-day abbr");
        this.drawCalendarHeader();
        this.$close = this.$calendar.find(".datepicker-close");
        this.$close.html(this.options.closeButtonTitle).attr("title", this.options.closeButtonLabel);
        this.$calendar.find(".datepicker-bn-close-label").html(this.options.closeButtonLabel);
        if (this.options.inline != false) {
            this.hideObject(this.$button);
            var $container = typeof this.options.inline === "string" ? $("#" + this.options.inline) : this.options.inline;
            $container.append(this.$calendar);
            this.$calendar.css({position: "relative", left: "0px"});
            this.initializeDate()
        } else {
            this.$calendar.css({display: "none"});
            this.$target.parent().after(this.$calendar);
            this.hide(!this.options.gainFocusOnConstruction)
        }
        this.keys = {
            tab: 9,
            enter: 13,
            esc: 27,
            space: 32,
            pageup: 33,
            pagedown: 34,
            end: 35,
            home: 36,
            left: 37,
            up: 38,
            right: 39,
            down: 40
        };
        this.bindHandlers();
        this.$button.click(function (e) {
            if (!$(this).hasClass("disabled")) {
                if (self.$calendar.attr("aria-hidden") === "true") {
                    self.initializeDate();
                    self.show()
                } else {
                    self.hide()
                }
                self.selectGridCell(self.$grid.attr("aria-activedescendant"))
            }
            e.stopPropagation();
            return false
        });
        this.$button.keydown(function (e) {
            var ev = e || event;
            if (ev.keyCode == self.keys.enter || ev.keyCode == self.keys.space) {
                $(this).trigger("click");
                return false
            }
        });
        this.$calendar.on("blur", function (e) {
            if (self.$calendar.attr("aria-hidden") === "false") {
                self.hide()
            }
        })
    };
    Datepicker.VERSION = "2.1.19";
    Datepicker.DEFAULTS = {
        firstDayOfWeek: Date.dp_locales.firstday_of_week,
        weekDayFormat: "short",
        startView: 0,
        daysOfWeekDisabled: [],
        datesDisabled: [],
        isDateDisabled: null,
        isMonthDisabled: null,
        isYearDisabled: null,
        inputFormat: [Date.dp_locales.short_format],
        outputFormat: Date.dp_locales.short_format,
        titleFormat: Date.dp_locales.full_format,
        buttonLeft: false,
        buttonTitle: Date.dp_locales.texts.buttonTitle,
        buttonLabel: Date.dp_locales.texts.buttonLabel,
        prevButtonLabel: Date.dp_locales.texts.prevButtonLabel,
        prevMonthButtonLabel: Date.dp_locales.texts.prevMonthButtonLabel,
        prevYearButtonLabel: Date.dp_locales.texts.prevYearButtonLabel,
        nextButtonLabel: Date.dp_locales.texts.nextButtonLabel,
        nextMonthButtonLabel: Date.dp_locales.texts.nextMonthButtonLabel,
        nextYearButtonLabel: Date.dp_locales.texts.nextYearButtonLabel,
        changeMonthButtonLabel: Date.dp_locales.texts.changeMonthButtonLabel,
        changeYearButtonLabel: Date.dp_locales.texts.changeYearButtonLabel,
        changeRangeButtonLabel: Date.dp_locales.texts.changeRangeButtonLabel,
        closeButtonTitle: Date.dp_locales.texts.closeButtonTitle,
        closeButtonLabel: Date.dp_locales.texts.closeButtonLabel,
        onUpdate: function (value) {
        },
        previous: null,
        next: null,
        allowSameDate: true,
        markup: "bootstrap3",
        theme: "default",
        modal: false,
        inline: false,
        gainFocusOnConstruction: true,
        min: null,
        max: null
    };
    Datepicker.prototype.initializeDate = function () {
        var val = this.$target.val();
        var date = val === "" ? new Date() : this.parseDate(val);
        this.setDate(date, true)
    };
    Datepicker.prototype.getDate = function () {
        var val = this.$target.val();
        var date = val === "" ? new Date() : this.parseDate(val);
        return date
    };
    Datepicker.prototype.setDate = function (newDate, init) {
        this.dateObj = newDate;
        init = (typeof init === "undefined") ? false : init;
        if (this.dateObj == null) {
            this.$target.attr("aria-invalid", true);
            this.$target.parents(".form-group").addClass("has-error");
            this.dateObj = new Date();
            this.dateObj.setHours(0, 0, 0, 0)
        }
        if (this.options.min != null && this.dateObj < this.options.min) {
            this.$target.attr("aria-invalid", true);
            this.$target.parents(".form-group").addClass("has-error");
            this.dateObj = this.options.min
        } else {
            if (this.options.max != null && this.dateObj > this.options.max) {
                this.$target.attr("aria-invalid", true);
                this.$target.parents(".form-group").addClass("has-error");
                this.dateObj = this.options.max
            }
        }
        if (!init || this.$target.val() != "") {
            this.$target.val(this.format(this.dateObj))
        }
        this.curYear = this.dateObj.getFullYear();
        this.year = this.curYear;
        this.curMonth = this.dateObj.getMonth();
        this.month = this.curMonth;
        this.date = this.dateObj.getDate();
        switch (this.options.startView) {
            case 1:
                this.populateMonthsCalendar();
                this.$grid.attr("aria-activedescendant", this.$grid.find(".curMonth").attr("id"));
                break;
            case 2:
                this.populateYearsCalendar();
                this.$grid.attr("aria-activedescendant", this.$grid.find(".curYear").attr("id"));
                break;
            default:
                this.populateDaysCalendar();
                this.$grid.attr("aria-activedescendant", this.$grid.find(".curDay").attr("id"))
        }
    };
    Datepicker.prototype.drawCalendarHeader = function () {
        var $days = this.$grid.find("th.datepicker-day");
        var weekday = this.options.firstDayOfWeek;
        for (var i = 0; i < 7; i++) {
            $days.eq(i).attr("aria-label", this.locales.day_names[weekday]);
            $days.children("abbr").eq(i).attr("title", this.locales.day_names[weekday]).text(this.options.weekDayFormat === "short" ? this.locales.day_names_short[weekday] : this.locales.day_names_narrow[weekday]);
            weekday = (weekday + 1) % 7
        }
    };
    Datepicker.prototype.populateDaysCalendar = function () {
        this.$calendar.find(".datepicker-bn-prev-label").html(this.options.prevButtonLabel);
        this.$calendar.find(".datepicker-bn-next-label").html(this.options.nextButtonLabel);
        this.$calendar.find(".datepicker-bn-fast-prev-label").html(this.options.prevMonthButtonLabel);
        this.$calendar.find(".datepicker-bn-fast-next-label").html(this.options.nextMonthButtonLabel);
        if (this.options.min != null && (this.year - 1 < this.options.min.getFullYear() || (this.year - 1 == this.options.min.getFullYear() && this.month < this.options.min.getMonth()))) {
            this.$fastprev.attr("title", "");
            this.$fastprev.addClass("disabled");
            this.$fastprev.removeClass("enabled")
        } else {
            this.$fastprev.attr("title", this.options.prevMonthButtonLabel);
            this.$fastprev.addClass("enabled");
            this.$fastprev.removeClass("disabled")
        }
        var previousMonth = this.previousMonth(this.year, this.month);
        if (this.options.min != null && (previousMonth.year < this.options.min.getFullYear() || (previousMonth.year == this.options.min.getFullYear() && previousMonth.month < this.options.min.getMonth()))) {
            this.$prev.attr("title", "");
            this.$prev.addClass("disabled");
            this.$prev.removeClass("enabled")
        } else {
            this.$prev.attr("title", this.options.prevButtonLabel);
            this.$prev.addClass("enabled");
            this.$prev.removeClass("disabled")
        }
        this.$monthObj.attr("title", this.options.changeMonthButtonLabel);
        var nextMonth = this.nextMonth(this.year, this.month);
        if (this.options.max != null && (nextMonth.year > this.options.max.getFullYear() || (nextMonth.year == this.options.max.getFullYear() && nextMonth.month > this.options.max.getMonth()))) {
            this.$next.attr("title", "");
            this.$next.addClass("disabled");
            this.$next.removeClass("enabled")
        } else {
            this.$next.attr("title", this.options.nextButtonLabel);
            this.$next.addClass("enabled");
            this.$next.removeClass("disabled")
        }
        if (this.options.max != null && (this.year + 1 > this.options.max.getFullYear() || (this.year + 1 == this.options.max.getFullYear() && this.month > this.options.max.getMonth()))) {
            this.$fastnext.attr("title", "");
            this.$fastnext.addClass("disabled");
            this.$fastnext.removeClass("enabled")
        } else {
            this.$fastnext.attr("title", this.options.nextMonthButtonLabel);
            this.$fastnext.addClass("enabled");
            this.$fastnext.removeClass("disabled")
        }
        this.showObject(this.$fastprev);
        this.showObject(this.$fastnext);
        var numDays = this.getDaysInMonth(this.year, this.month);
        var numPrevDays = this.getDaysInMonth(previousMonth.year, previousMonth.month);
        var startWeekday = new Date(this.year, this.month, 1).getDay();
        var lastDayOfWeek = (this.options.firstDayOfWeek + 6) % 7;
        var curDay = 1;
        var rowCount = 1;
        this.$monthObj.html(this.locales.month_names[this.month] + " " + this.year);
        this.showObject(this.$grid.find("thead"));
        var gridCells = '\t<tr id="row0-' + this.id + '" role="row">\n';
        var numEmpties = 0;
        var weekday = this.options.firstDayOfWeek;
        while (weekday != startWeekday) {
            numEmpties++;
            weekday = (weekday + 1) % 7
        }
        for (; numEmpties > 0; numEmpties--) {
            gridCells += '\t\t<td class="empty">' + (numPrevDays - numEmpties + 1) + "</td>\n"
        }
        var isYearDisabled = this.options.isYearDisabled && this.options.isYearDisabled(this.year);
        var isMonthDisabled = this.options.isMonthDisabled && this.options.isMonthDisabled(this.year, this.month + 1);
        for (curDay = 1; curDay <= numDays; curDay++) {
            var date = new Date(this.year, this.month, curDay, 0, 0, 0, 0);
            var longdate = this.formatDate(date, this.options.titleFormat);
            var curDayClass = curDay == this.date && this.month == this.curMonth && this.year == this.curYear ? " curDay" : "";
            if (isYearDisabled || isMonthDisabled) {
                gridCells += '\t\t<td id="cell' + curDay + "-" + this.id + '" class="day weekday' + weekday + " unselectable" + curDayClass + '"'
            } else {
                if ($.inArray(weekday, this.options.daysOfWeekDisabled) > -1) {
                    gridCells += '\t\t<td id="cell' + curDay + "-" + this.id + '" class="day weekday' + weekday + " unselectable" + curDayClass + '"'
                } else {
                    if (this.options.min != null && date < this.options.min) {
                        gridCells += '\t\t<td id="cell' + curDay + "-" + this.id + '" class="day weekday' + weekday + " unselectable" + curDayClass + '"'
                    } else {
                        if (this.options.max != null && date > this.options.max) {
                            gridCells += '\t\t<td id="cell' + curDay + "-" + this.id + '" class="day weekday' + weekday + " unselectable" + curDayClass + '"'
                        } else {
                            if ($.inArray(this.format(date), this.options.datesDisabled) > -1) {
                                gridCells += '\t\t<td id="cell' + curDay + "-" + this.id + '" class="day weekday' + weekday + " unselectable" + curDayClass + '"'
                            } else {
                                if (this.options.isDateDisabled && this.options.isDateDisabled(date)) {
                                    gridCells += '\t\t<td id="cell' + curDay + "-" + this.id + '" class="day weekday' + weekday + " unselectable" + curDayClass + '"'
                                } else {
                                    gridCells += '\t\t<td id="cell' + curDay + "-" + this.id + '" class="day weekday' + weekday + " selectable" + curDayClass + '"'
                                }
                            }
                        }
                    }
                }
            }
            gridCells += ' data-value="' + curDay + '"';
            gridCells += ' title="' + longdate + '"';
            gridCells += ' headers="day' + weekday + "-header-" + this.id + '" role="gridcell" tabindex="-1" aria-selected="false">' + curDay;
            gridCells += "</td>";
            if (weekday == lastDayOfWeek && curDay < numDays) {
                gridCells += '\t</tr>\n\t<tr id="row' + rowCount + "-" + this.id + '" role="row">\n';
                rowCount++
            }
            if (curDay < numDays) {
                weekday = (weekday + 1) % 7
            }
        }
        while (weekday != lastDayOfWeek) {
            gridCells += '\t\t<td class="empty">' + (++numEmpties) + "</td>\n";
            weekday = (weekday + 1) % 7
        }
        gridCells += "\t</tr>";
        var $tbody = this.$grid.find("tbody");
        $tbody.empty();
        $tbody.append(gridCells);
        this.gridType = 0
    };
    Datepicker.prototype.populateMonthsCalendar = function () {
        this.$calendar.find(".datepicker-bn-prev-label").html(this.options.prevMonthButtonLabel);
        this.$calendar.find(".datepicker-bn-next-label").html(this.options.nextMonthButtonLabel);
        this.hideObject(this.$fastprev);
        this.hideObject(this.$fastnext);
        if (this.options.min != null && this.year - 1 < this.options.min.getFullYear()) {
            this.$prev.attr("title", "");
            this.$prev.addClass("disabled");
            this.$prev.removeClass("enabled")
        } else {
            this.$prev.attr("title", this.options.prevMonthButtonLabel);
            this.$prev.addClass("enabled");
            this.$prev.removeClass("disabled")
        }
        this.$monthObj.attr("title", this.options.changeYearButtonLabel);
        if (this.options.max != null && this.year + 1 > this.options.max.getFullYear()) {
            this.$next.attr("title", "");
            this.$next.addClass("disabled");
            this.$next.removeClass("enabled")
        } else {
            this.$next.attr("title", this.options.nextMonthButtonLabel);
            this.$next.addClass("enabled");
            this.$next.removeClass("disabled")
        }
        var curMonth = 0;
        var rowCount = 1;
        var $tbody = this.$grid.find("tbody");
        this.$monthObj.html(this.year);
        this.hideObject(this.$grid.find("thead"));
        $tbody.empty();
        $("#datepicker-err-msg-" + this.id).empty();
        var gridCells = '\t<tr id="row0-' + this.id + '" role="row">\n';
        var isYearDisabled = this.options.isYearDisabled && this.options.isYearDisabled(this.year);
        for (curMonth = 0; curMonth < 12; curMonth++) {
            if (isYearDisabled) {
                gridCells += '\t\t<td id="cell' + (curMonth + 1) + "-" + this.id + '" class="month unselectable"'
            } else {
                if (curMonth == this.month && this.year == this.curYear) {
                    gridCells += '\t\t<td id="cell' + (curMonth + 1) + "-" + this.id + '" class="month curMonth selectable"'
                } else {
                    if (this.options.min != null && (this.year < this.options.min.getFullYear() || (this.year == this.options.min.getFullYear() && curMonth < this.options.min.getMonth()))) {
                        gridCells += '\t\t<td id="cell' + (curMonth + 1) + "-" + this.id + '" class="month unselectable"'
                    } else {
                        if (this.options.max != null && (this.year > this.options.max.getFullYear() || (this.year == this.options.max.getFullYear() && curMonth > this.options.max.getMonth()))) {
                            gridCells += '\t\t<td id="cell' + (curMonth + 1) + "-" + this.id + '" class="month unselectable"'
                        } else {
                            if (this.options.isMonthDisabled && this.options.isMonthDisabled(this.year, curMonth + 1)) {
                                gridCells += '\t\t<td id="cell' + (curMonth + 1) + "-" + this.id + '" class="month unselectable"'
                            } else {
                                gridCells += '\t\t<td id="cell' + (curMonth + 1) + "-" + this.id + '" class="month selectable"'
                            }
                        }
                    }
                }
            }
            gridCells += ' data-value="' + curMonth + '"';
            gridCells += ' title="' + this.locales.month_names[curMonth] + " " + this.year + '"';
            gridCells += ' aria-label="' + this.locales.month_names[curMonth] + " " + this.year + '"';
            gridCells += ' role="gridcell" tabindex="-1" aria-selected="false">' + this.locales.month_names_abbreviated[curMonth];
            gridCells += "</td>";
            if (curMonth == 3 || curMonth == 7) {
                gridCells += '\t</tr>\n\t<tr id="row' + rowCount + "-" + this.id + '" role="row">\n';
                rowCount++
            }
        }
        gridCells += "\t</tr>";
        $tbody.append(gridCells);
        this.gridType = 1
    };
    Datepicker.prototype.populateYearsCalendar = function () {
        this.$calendar.find(".datepicker-bn-prev-label").html(this.options.prevYearButtonLabel);
        this.$calendar.find(".datepicker-bn-next-label").html(this.options.nextYearButtonLabel);
        this.hideObject(this.$fastprev);
        this.hideObject(this.$fastnext);
        if (this.options.min != null && this.year - 20 < this.options.min.getFullYear()) {
            this.$prev.attr("title", "");
            this.$prev.addClass("disabled");
            this.$prev.removeClass("enabled")
        } else {
            this.$prev.attr("title", this.options.prevYearButtonLabel);
            this.$prev.addClass("enabled");
            this.$prev.removeClass("disabled")
        }
        this.$monthObj.attr("title", this.options.changeRangeButtonLabel);
        if (this.options.max != null && this.year + 20 > this.options.max.getFullYear()) {
            this.$next.attr("title", "");
            this.$next.addClass("disabled");
            this.$next.removeClass("enabled")
        } else {
            this.$next.attr("title", this.options.nextYearButtonLabel);
            this.$next.addClass("enabled");
            this.$next.removeClass("disabled")
        }
        var startYear = Math.floor(this.year / 10) * 10;
        var endYear = startYear + 19;
        var rowCount = 1;
        var $tbody = this.$grid.find("tbody");
        this.$monthObj.html(startYear + "-" + endYear);
        this.hideObject(this.$grid.find("thead"));
        $tbody.empty();
        $("#datepicker-err-msg-" + this.id).empty();
        var gridCells = '\t<tr id="row0-' + this.id + '" role="row">\n';
        for (var curYear = startYear; curYear <= endYear; curYear++) {
            if (curYear == this.year) {
                gridCells += '\t\t<td id="cell' + (curYear - startYear + 1) + "-" + this.id + '" class="year curYear selectable"'
            } else {
                if (this.options.min != null && (curYear < this.options.min.getFullYear())) {
                    gridCells += '\t\t<td id="cell' + (curYear - startYear + 1) + "-" + this.id + '" class="year unselectable"'
                } else {
                    if (this.options.max != null && (curYear > this.options.max.getFullYear())) {
                        gridCells += '\t\t<td id="cell' + (curYear - startYear + 1) + "-" + this.id + '" class="year unselectable"'
                    } else {
                        if (this.options.isYearDisabled && this.options.isYearDisabled(curYear)) {
                            gridCells += '\t\t<td id="cell' + (curYear - startYear + 1) + "-" + this.id + '" class="year unselectable"'
                        } else {
                            gridCells += '\t\t<td id="cell' + (curYear - startYear + 1) + "-" + this.id + '" class="year selectable"'
                        }
                    }
                }
            }
            gridCells += ' data-value="' + curYear + '"';
            gridCells += ' title="' + curYear + '"';
            gridCells += ' role="gridcell" tabindex="-1" aria-selected="false">' + curYear;
            gridCells += "</td>";
            var curPos = curYear - startYear;
            if (curPos == 4 || curPos == 9 || curPos == 14) {
                gridCells += '\t</tr>\n\t<tr id="row' + rowCount + "-" + this.id + '" role="row">\n';
                rowCount++
            }
        }
        gridCells += "\t</tr>";
        $tbody.append(gridCells);
        this.gridType = 2
    };
    Datepicker.prototype.showDaysOfPrevMonth = function (offset) {
        var previousMonth = this.previousMonth(this.year, this.month);
        if (this.options.min != null && (previousMonth.year < this.options.min.getFullYear() || (previousMonth.year == this.options.min.getFullYear() && previousMonth.month < this.options.min.getMonth()))) {
            return false
        }
        this.month = previousMonth.month;
        this.year = previousMonth.year;
        this.populateDaysCalendar();
        if (offset != null) {
            var $allCells = this.$grid.find("td");
            offset = $allCells.length - offset;
            while (offset >= 0 && !$allCells.eq(offset).hasClass("selectable")) {
                offset--
            }
            if (offset >= 0) {
                var day = $allCells.eq(offset).attr("id");
                this.$grid.attr("aria-activedescendant", day);
                this.selectGridCell(day)
            }
        }
        return true
    };
    Datepicker.prototype.showDaysOfMonth = function (month) {
        if (this.options.min != null && (this.year < this.options.min.getFullYear() || (this.year == this.options.min.getFullYear() && month < this.options.min.getMonth()))) {
            return false
        }
        if (this.options.max != null && (this.year > this.options.max.getFullYear() || (this.year == this.options.max.getFullYear() && month > this.options.max.getMonth()))) {
            return false
        }
        this.month = month;
        this.date = Math.min(this.date, this.getDaysInMonth(this.year, this.month));
        this.populateDaysCalendar();
        var $active = this.$grid.find("tbody td[data-value='" + this.date + "']");
        this.selectGridCell($active.attr("id"));
        return true
    };
    Datepicker.prototype.showMonthsOfPrevYear = function (offset) {
        if (this.options.min != null && this.year - 1 < this.options.min.getFullYear()) {
            return false
        }
        this.year--;
        this.populateMonthsCalendar();
        if (offset != null) {
            var $allCells = this.$grid.find("td");
            offset = $allCells.length - offset;
            while (offset >= 0 && !$allCells.eq(offset).hasClass("selectable")) {
                offset--
            }
            if (offset >= 0) {
                var month = $allCells.eq(offset).attr("id");
                this.$grid.attr("aria-activedescendant", month);
                this.selectGridCell(month)
            }
        }
        return true
    };
    Datepicker.prototype.showMonthsOfYear = function (year) {
        if (this.options.min != null && year < this.options.min.getFullYear()) {
            return false
        }
        if (this.options.max != null && year > this.options.max.getFullYear()) {
            return false
        }
        this.year = year;
        this.populateMonthsCalendar();
        var $active = this.$grid.find("tbody td[data-value='" + this.month + "']");
        this.$grid.attr("aria-activedescendant", $active.attr("id"));
        this.selectGridCell($active.attr("id"));
        return true
    };
    Datepicker.prototype.showYearsOfPrevRange = function (offset) {
        if (this.options.min != null && this.year - 20 < this.options.min.getFullYear()) {
            return false
        }
        this.year -= 20;
        this.populateYearsCalendar();
        if (offset != null) {
            var $allCells = this.$grid.find("td");
            offset = $allCells.length - offset;
            while (offset >= 0 && !$allCells.eq(offset).hasClass("selectable")) {
                offset--
            }
            if (offset >= 0) {
                var year = $allCells.eq(offset).attr("id");
                this.$grid.attr("aria-activedescendant", year);
                this.selectGridCell(year)
            }
        }
        return true
    };
    Datepicker.prototype.showDaysOfNextMonth = function (offset) {
        var nextMonth = this.nextMonth(this.year, this.month);
        if (this.options.max != null && (nextMonth.year > this.options.max.getFullYear() || (nextMonth.year == this.options.max.getFullYear() && nextMonth.month > this.options.max.getMonth()))) {
            return false
        }
        this.month = nextMonth.month;
        this.year = nextMonth.year;
        this.populateDaysCalendar();
        if (offset != null) {
            var $allCells = this.$grid.find("td");
            offset--;
            while (offset < $allCells.length && !$allCells.eq(offset).hasClass("selectable")) {
                offset++
            }
            if (offset < $allCells.length) {
                var day = $allCells.eq(offset).attr("id");
                this.$grid.attr("aria-activedescendant", day);
                this.selectGridCell(day)
            }
        }
        return true
    };
    Datepicker.prototype.showMonthsOfNextYear = function (offset) {
        if (this.options.max != null && this.year + 1 > this.options.max.getFullYear()) {
            return false
        }
        this.year++;
        this.populateMonthsCalendar();
        if (offset != null) {
            var $allCells = this.$grid.find("td");
            offset--;
            while (offset < $allCells.length && !$allCells.eq(offset).hasClass("selectable")) {
                offset++
            }
            if (offset < $allCells.length) {
                var month = $allCells.eq(offset).attr("id");
                this.$grid.attr("aria-activedescendant", month);
                this.selectGridCell(month)
            }
        }
        return true
    };
    Datepicker.prototype.showYearsOfNextRange = function (offset) {
        if (this.options.max != null && this.year + 20 > this.options.max.getFullYear()) {
            return false
        }
        this.year += 20;
        this.populateYearsCalendar();
        if (offset != null) {
            var $allCells = this.$grid.find("td");
            offset--;
            while (offset < $allCells.length && !$allCells.eq(offset).hasClass("selectable")) {
                offset++
            }
            if (offset < $allCells.length) {
                var year = $allCells.eq(offset).attr("id");
                this.$grid.attr("aria-activedescendant", year);
                this.selectGridCell(year)
            }
        }
        return true
    };
    Datepicker.prototype.showDaysOfPrevYear = function () {
        if (this.options.min != null && (this.year - 1 < this.options.min.getFullYear() || (this.year - 1 == this.options.min.getFullYear() && this.month < this.options.min.getMonth()))) {
            return false
        }
        this.year--;
        this.populateDaysCalendar();
        return true
    };
    Datepicker.prototype.showDaysOfNextYear = function () {
        if (this.options.max != null && (this.year + 1 > this.options.max.getFullYear() || (this.year + 1 == this.options.max.getFullYear() && this.month > this.options.max.getMonth()))) {
            return false
        }
        this.year++;
        this.populateDaysCalendar();
        return true
    };
    Datepicker.prototype.bindHandlers = function () {
        var self = this;
        this.$fastprev.click(function (e) {
            return self.handleFastPrevClick(e)
        });
        this.$prev.click(function (e) {
            return self.handlePrevClick(e)
        });
        this.$next.click(function (e) {
            return self.handleNextClick(e)
        });
        this.$fastnext.click(function (e) {
            return self.handleFastNextClick(e)
        });
        this.$monthObj.click(function (e) {
            return self.handleMonthClick(e)
        });
        this.$monthObj.keydown(function (e) {
            return self.handleMonthKeyDown(e)
        });
        this.$fastprev.keydown(function (e) {
            return self.handleFastPrevKeyDown(e)
        });
        this.$prev.keydown(function (e) {
            return self.handlePrevKeyDown(e)
        });
        this.$next.keydown(function (e) {
            return self.handleNextKeyDown(e)
        });
        this.$fastnext.keydown(function (e) {
            return self.handleFastNextKeyDown(e)
        });
        this.$close.click(function (e) {
            return self.handleCloseClick(e)
        });
        this.$close.keydown(function (e) {
            return self.handleCloseKeyDown(e)
        });
        this.$grid.keydown(function (e) {
            return self.handleGridKeyDown(e)
        });
        this.$grid.keypress(function (e) {
            return self.handleGridKeyPress(e)
        });
        this.$grid.focus(function (e) {
            return self.handleGridFocus(e)
        });
        this.$grid.blur(function (e) {
            return self.handleGridBlur(e)
        });
        this.$grid.delegate("td", "click", function (e) {
            return self.handleGridClick(this, e)
        });
        this.$target.change(function (e) {
            var date = self.parseDate($(this).val());
            self.updateLinked(date)
        })
    };
    Datepicker.prototype.handleFastPrevClick = function (e) {
        if (this.showDaysOfPrevYear()) {
            var active = this.$grid.attr("aria-activedescendant");
            if (this.month != this.curMonth || this.year != this.curYear) {
                this.$grid.attr("aria-activedescendant", "cell1-" + this.id);
                this.selectGridCell("cell1-" + this.id)
            } else {
                this.$grid.attr("aria-activedescendant", active);
                this.selectGridCell(active)
            }
        }
        e.stopPropagation();
        return false
    };
    Datepicker.prototype.handlePrevClick = function (e) {
        var active = this.$grid.attr("aria-activedescendant");
        switch (this.gridType) {
            case 0:
                var ok;
                if (e.ctrlKey) {
                    ok = this.showDaysOfPrevYear()
                } else {
                    ok = this.showDaysOfPrevMonth()
                }
                if (ok) {
                    if (this.month != this.curMonth || this.year != this.curYear) {
                        this.$grid.attr("aria-activedescendant", "cell1-" + this.id);
                        this.selectGridCell("cell1-" + this.id)
                    } else {
                        this.$grid.attr("aria-activedescendant", active);
                        this.selectGridCell(active)
                    }
                }
                break;
            case 1:
                if (this.showMonthsOfPrevYear()) {
                    if (this.year != this.curYear) {
                        this.$grid.attr("aria-activedescendant", "cell1-" + this.id);
                        this.selectGridCell("cell1-" + this.id)
                    } else {
                        this.$grid.attr("aria-activedescendant", active);
                        this.selectGridCell(active)
                    }
                }
                break;
            case 2:
                if (this.showYearsOfPrevRange()) {
                    this.$grid.attr("aria-activedescendant", "cell1-" + this.id);
                    this.selectGridCell("cell1-" + this.id)
                }
                break
        }
        e.stopPropagation();
        return false
    };
    Datepicker.prototype.handleMonthClick = function (e) {
        this.changeGrid(e);
        e.stopPropagation();
        return false
    };
    Datepicker.prototype.handleNextClick = function (e) {
        var active = this.$grid.attr("aria-activedescendant");
        switch (this.gridType) {
            case 0:
                var ok;
                if (e.ctrlKey) {
                    ok = this.showDaysOfNextYear()
                } else {
                    ok = this.showDaysOfNextMonth()
                }
                if (ok) {
                    if (this.month != this.curMonth || this.year != this.curYear) {
                        this.$grid.attr("aria-activedescendant", "cell1-" + this.id);
                        this.selectGridCell("cell1-" + this.id)
                    } else {
                        this.$grid.attr("aria-activedescendant", active);
                        this.selectGridCell(active)
                    }
                }
                break;
            case 1:
                if (this.showMonthsOfNextYear()) {
                    if (this.year != this.curYear) {
                        this.$grid.attr("aria-activedescendant", "cell1-" + this.id);
                        this.selectGridCell("cell1-" + this.id)
                    } else {
                        this.$grid.attr("aria-activedescendant", active);
                        this.selectGridCell(active)
                    }
                }
                break;
            case 2:
                if (this.showYearsOfNextRange()) {
                    this.$grid.attr("aria-activedescendant", "cell1-" + this.id);
                    this.selectGridCell("cell1-" + this.id)
                }
                break
        }
        e.stopPropagation();
        return false
    };
    Datepicker.prototype.handleFastNextClick = function (e) {
        if (this.showDaysOfNextYear()) {
            var active = this.$grid.attr("aria-activedescendant");
            if (this.month != this.curMonth || this.year != this.curYear) {
                this.$grid.attr("aria-activedescendant", "cell1-" + this.id);
                this.selectGridCell("cell1-" + this.id)
            } else {
                this.$grid.attr("aria-activedescendant", active);
                this.selectGridCell(active)
            }
        }
        e.stopPropagation();
        return false
    };
    Datepicker.prototype.handleCloseClick = function (e) {
        this.hide();
        e.stopPropagation();
        return false
    };
    Datepicker.prototype.handleFastPrevKeyDown = function (e) {
        if (e.altKey) {
            return true
        }
        switch (e.keyCode) {
            case this.keys.tab:
                if (e.shiftKey) {
                    this.$prev.focus()
                } else {
                    this.$monthObj.focus()
                }
                e.stopPropagation();
                return false;
            case this.keys.enter:
            case this.keys.space:
                if (e.shiftKey || e.ctrlKey) {
                    return true
                }
                this.showDaysOfPrevYear();
                e.stopPropagation();
                return false;
            case this.keys.esc:
                this.hide();
                e.stopPropagation();
                return false
        }
        return true
    };
    Datepicker.prototype.handlePrevKeyDown = function (e) {
        if (e.altKey) {
            return true
        }
        switch (e.keyCode) {
            case this.keys.tab:
                if (e.shiftKey) {
                    if (this.gridType == 0) {
                        this.$fastnext.focus()
                    } else {
                        this.$next.focus()
                    }
                } else {
                    if (this.gridType == 0) {
                        this.$fastprev.focus()
                    } else {
                        this.$monthObj.focus()
                    }
                }
                e.stopPropagation();
                return false;
            case this.keys.enter:
            case this.keys.space:
                if (e.shiftKey) {
                    return true
                }
                switch (this.gridType) {
                    case 0:
                        if (e.ctrlKey) {
                            this.showDaysOfPrevYear()
                        } else {
                            this.showDaysOfPrevMonth()
                        }
                        break;
                    case 1:
                        this.showMonthsOfPrevYear();
                        break;
                    case 2:
                        this.showYearsOfPrevRange();
                        break
                }
                e.stopPropagation();
                return false;
            case this.keys.esc:
                this.hide();
                e.stopPropagation();
                return false
        }
        return true
    };
    Datepicker.prototype.handleMonthKeyDown = function (e) {
        if (e.altKey) {
            return true
        }
        switch (e.keyCode) {
            case this.keys.tab:
                if (e.shiftKey) {
                    if (this.gridType == 0) {
                        this.$fastnext.focus()
                    } else {
                        this.$prev.focus()
                    }
                } else {
                    this.$close.focus()
                }
                e.stopPropagation();
                return false;
            case this.keys.enter:
            case this.keys.space:
                this.changeGrid(e);
                e.stopPropagation();
                return false;
            case this.keys.esc:
                this.hide();
                e.stopPropagation();
                return false
        }
        return true
    };
    Datepicker.prototype.handleNextKeyDown = function (e) {
        if (e.altKey) {
            return true
        }
        switch (e.keyCode) {
            case this.keys.tab:
                if (e.shiftKey) {
                    this.$grid.focus()
                } else {
                    if (this.gridType == 0) {
                        this.$fastnext.focus()
                    } else {
                        this.$prev.focus()
                    }
                }
                e.stopPropagation();
                return false;
            case this.keys.enter:
            case this.keys.space:
                switch (this.gridType) {
                    case 0:
                        if (e.ctrlKey) {
                            this.showDaysOfNextYear()
                        } else {
                            this.showDaysOfNextMonth()
                        }
                        break;
                    case 1:
                        this.showMonthsOfNextYear();
                        break;
                    case 2:
                        this.showYearsOfNextRange();
                        break
                }
                e.stopPropagation();
                return false;
            case this.keys.esc:
                this.hide();
                e.stopPropagation();
                return false
        }
        return true
    };
    Datepicker.prototype.handleFastNextKeyDown = function (e) {
        if (e.altKey) {
            return true
        }
        switch (e.keyCode) {
            case this.keys.tab:
                if (e.shiftKey) {
                    this.$next.focus()
                } else {
                    this.$prev.focus()
                }
                e.stopPropagation();
                return false;
            case this.keys.enter:
            case this.keys.space:
                this.showDaysOfNextYear();
                e.stopPropagation();
                return false;
            case this.keys.esc:
                this.hide();
                e.stopPropagation();
                return false
        }
        return true
    };
    Datepicker.prototype.handleCloseKeyDown = function (e) {
        if (e.altKey) {
            return true
        }
        switch (e.keyCode) {
            case this.keys.tab:
                if (e.ctrlKey) {
                    return true
                }
                if (e.shiftKey) {
                    this.$monthObj.focus()
                } else {
                    this.hide();
                    e.stopPropagation();
                    return false
                }
                e.stopPropagation();
                return false;
            case this.keys.enter:
            case this.keys.esc:
            case this.keys.space:
                if (e.shiftKey || e.ctrlKey) {
                    return true
                }
                this.hide();
                e.stopPropagation();
                return false
        }
        return true
    };
    Datepicker.prototype.handleGridKeyDown = function (e) {
        var $curCell = $("#" + this.$grid.attr("aria-activedescendant"));
        var $cells = this.$grid.find("td.selectable");
        var colCount = this.$grid.find("tbody tr").eq(0).find("td").length;
        if (e.altKey && e.keyCode != this.keys.pageup && e.keyCode != this.keys.pagedown) {
            return true
        }
        switch (e.keyCode) {
            case this.keys.tab:
                if (e.shiftKey) {
                    this.hide();
                    this.handleTabOut(e)
                } else {
                    this.$next.focus()
                }
                e.stopPropagation();
                return false;
                break;
            case this.keys.enter:
            case this.keys.space:
                if (e.ctrlKey) {
                    return true
                }
                switch (this.gridType) {
                    case 0:
                        this.update();
                        this.hide();
                        break;
                    case 1:
                        this.showDaysOfMonth(parseInt($curCell.attr("data-value"), 10));
                        break;
                    case 2:
                        this.showMonthsOfYear(parseInt($curCell.attr("data-value"), 10));
                        break
                }
                e.stopPropagation();
                return false;
            case this.keys.esc:
                this.hide();
                e.stopPropagation();
                return false;
            case this.keys.left:
            case this.keys.right:
                if ((e.keyCode == this.keys.left && this.locales.directionality === "LTR") || (e.keyCode == this.keys.right && this.locales.directionality === "RTL")) {
                    if (e.ctrlKey || e.shiftKey) {
                        return true
                    }
                    var cellIndex = $cells.index($curCell) - 1;
                    var $prevCell = null;
                    if (cellIndex >= 0) {
                        $prevCell = $cells.eq(cellIndex);
                        this.unSelectGridCell($curCell.attr("id"));
                        this.$grid.attr("aria-activedescendant", $prevCell.attr("id"));
                        this.selectGridCell($prevCell.attr("id"))
                    } else {
                        switch (this.gridType) {
                            case 0:
                                this.showDaysOfPrevMonth(0);
                                break;
                            case 1:
                                this.showMonthsOfPrevYear(0);
                                break;
                            case 2:
                                this.showYearsOfPrevRange(0);
                                break
                        }
                    }
                    e.stopPropagation();
                    return false
                } else {
                    if (e.ctrlKey || e.shiftKey) {
                        return true
                    }
                    var cellIndex = $cells.index($curCell) + 1;
                    var $nextCell = null;
                    if (cellIndex < $cells.length) {
                        $nextCell = $cells.eq(cellIndex);
                        this.unSelectGridCell($curCell.attr("id"));
                        this.$grid.attr("aria-activedescendant", $nextCell.attr("id"));
                        this.selectGridCell($nextCell.attr("id"))
                    } else {
                        switch (this.gridType) {
                            case 0:
                                this.showDaysOfNextMonth(1);
                                break;
                            case 1:
                                this.showMonthsOfNextYear(1);
                                break;
                            case 2:
                                this.showYearsOfNextRange(1);
                                break
                        }
                    }
                    e.stopPropagation();
                    return false
                }
            case this.keys.up:
                if (e.ctrlKey || e.shiftKey) {
                    return true
                }
                var $allCells = this.$grid.find("td");
                var cellIndex = $allCells.index($curCell) - colCount;
                var $prevCell = null;
                while (cellIndex >= 0 && !$allCells.eq(cellIndex).hasClass("selectable")) {
                    cellIndex--
                }
                if (cellIndex >= 0) {
                    $prevCell = $allCells.eq(cellIndex);
                    this.unSelectGridCell($curCell.attr("id"));
                    this.$grid.attr("aria-activedescendant", $prevCell.attr("id"));
                    this.selectGridCell($prevCell.attr("id"))
                } else {
                    cellIndex = colCount - $allCells.index($curCell) % colCount;
                    switch (this.gridType) {
                        case 0:
                            this.showDaysOfPrevMonth(cellIndex);
                            break;
                        case 1:
                            this.showMonthsOfPrevYear(cellIndex);
                            break;
                        case 2:
                            this.showYearsOfPrevRange(cellIndex);
                            break
                    }
                }
                e.stopPropagation();
                return false;
            case this.keys.down:
                if (e.ctrlKey || e.shiftKey) {
                    return true
                }
                var $allCells = this.$grid.find("td");
                var cellIndex = $allCells.index($curCell) + colCount;
                while (cellIndex < $allCells.length && !$allCells.eq(cellIndex).hasClass("selectable")) {
                    cellIndex++
                }
                if (cellIndex < $allCells.length) {
                    var $nextCell = $allCells.eq(cellIndex);
                    this.unSelectGridCell($curCell.attr("id"));
                    this.$grid.attr("aria-activedescendant", $nextCell.attr("id"));
                    this.selectGridCell($nextCell.attr("id"))
                } else {
                    cellIndex = $allCells.index($curCell) % colCount + 1;
                    switch (this.gridType) {
                        case 0:
                            this.showDaysOfNextMonth(cellIndex);
                            break;
                        case 1:
                            this.showMonthsOfNextYear(cellIndex);
                            break;
                        case 2:
                            this.showYearsOfNextRange(cellIndex);
                            break
                    }
                }
                e.stopPropagation();
                return false;
            case this.keys.pageup:
                var active = this.$grid.attr("aria-activedescendant");
                if (e.shiftKey || e.ctrlKey) {
                    return true
                }
                e.preventDefault();
                var ok = false;
                switch (this.gridType) {
                    case 0:
                        if (e.altKey) {
                            e.stopImmediatePropagation();
                            ok = this.showDaysOfPrevYear()
                        } else {
                            ok = this.showDaysOfPrevMonth()
                        }
                        break;
                    case 1:
                        ok = this.showMonthsOfPrevYear();
                        break;
                    case 2:
                        ok = this.showYearsOfPrevRange();
                        break
                }
                if (ok) {
                    if ($("#" + active).attr("id") == undefined) {
                        $cells = this.$grid.find("td.selectable");
                        var $lastCell = $cells.eq($cells.length - 1);
                        this.$grid.attr("aria-activedescendant", $lastCell.attr("id"));
                        this.selectGridCell($lastCell.attr("id"))
                    } else {
                        this.selectGridCell(active)
                    }
                }
                e.stopPropagation();
                return false;
            case this.keys.pagedown:
                var active = this.$grid.attr("aria-activedescendant");
                if (e.shiftKey || e.ctrlKey) {
                    return true
                }
                e.preventDefault();
                var ok = false;
                switch (this.gridType) {
                    case 0:
                        if (e.altKey) {
                            e.stopImmediatePropagation();
                            ok = this.showDaysOfNextYear()
                        } else {
                            ok = this.showDaysOfNextMonth()
                        }
                        break;
                    case 1:
                        ok = this.showMonthsOfNextYear();
                        break;
                    case 2:
                        ok = this.showYearsOfNextRange();
                        break
                }
                if (ok) {
                    if ($("#" + active).attr("id") == undefined) {
                        $cells = this.$grid.find("td.selectable");
                        var $lastCell = $cells.eq($cells.length - 1);
                        this.$grid.attr("aria-activedescendant", $lastCell.attr("id"));
                        this.selectGridCell($lastCell.attr("id"))
                    } else {
                        this.selectGridCell(active)
                    }
                }
                e.stopPropagation();
                return false;
            case this.keys.home:
                if (e.ctrlKey || e.shiftKey) {
                    return true
                }
                var $firstCell = $cells.eq(0);
                this.unSelectGridCell($curCell.attr("id"));
                this.$grid.attr("aria-activedescendant", $firstCell.attr("id"));
                this.selectGridCell($firstCell.attr("id"));
                e.stopPropagation();
                return false;
            case this.keys.end:
                if (e.ctrlKey || e.shiftKey) {
                    return true
                }
                var $lastCell = $cells.eq($cells.length - 1);
                this.unSelectGridCell($curCell.attr("id"));
                this.$grid.attr("aria-activedescendant", $lastCell.attr("id"));
                this.selectGridCell($lastCell.attr("id"));
                e.stopPropagation();
                return false
        }
        return true
    };
    Datepicker.prototype.handleGridKeyPress = function (e) {
        if (e.altKey) {
            return true
        }
        switch (e.keyCode) {
            case this.keys.tab:
            case this.keys.enter:
            case this.keys.space:
            case this.keys.esc:
            case this.keys.left:
            case this.keys.right:
            case this.keys.up:
            case this.keys.down:
            case this.keys.pageup:
            case this.keys.pagedown:
            case this.keys.home:
            case this.keys.end:
                e.stopPropagation();
                return false
        }
        return true
    };
    Datepicker.prototype.handleGridClick = function (id, e) {
        var $cell = $(id);
        if ($cell.is(".empty") || $cell.is(".unselectable")) {
            return true
        }
        this.$grid.find(".focus").removeClass("focus").attr("aria-selected", "false").attr("tabindex", -1);
        switch (this.gridType) {
            case 0:
                this.$grid.attr("aria-activedescendant", $cell.attr("id"));
                this.selectGridCell($cell.attr("id"));
                this.update();
                this.hide();
                break;
            case 1:
                this.showDaysOfMonth(parseInt($cell.attr("data-value"), 10));
                break;
            case 2:
                this.showMonthsOfYear(parseInt($cell.attr("data-value"), 10));
                break
        }
        e.stopPropagation();
        return false
    };
    Datepicker.prototype.handleGridFocus = function (e) {
        var active = this.$grid.attr("aria-activedescendant");
        if ($("#" + active).attr("id") == undefined) {
            var $cells = this.$grid.find("td.selectable");
            var $lastCell = $cells.eq($cells.length - 1);
            this.$grid.attr("aria-activedescendant", $lastCell.attr("id"));
            this.selectGridCell($lastCell.attr("id"))
        } else {
            this.selectGridCell(active)
        }
        return true
    };
    Datepicker.prototype.handleGridBlur = function (e) {
        this.unSelectGridCell(this.$grid.attr("aria-activedescendant"));
        return true
    };
    Datepicker.prototype.handleTabOut = function (e) {
        var fields = $("body").find(":input:visible:not([disabled], .datepicker-button), a[href]:visible:not([disabled], .datepicker-button)");
        var index = fields.index(this.$target);
        if (index > -1 && index < fields.length) {
            if (e.shiftKey) {
                if (index > 0) {
                    index--
                }
            } else {
                if (index + 1 < fields.length) {
                    index++
                }
            }
            fields.eq(index).focus()
        }
        return true
    };
    Datepicker.prototype.changeGrid = function (e) {
        switch (this.gridType) {
            case 0:
                this.populateMonthsCalendar();
                if (this.year != this.curYear) {
                    var $cells = this.$grid.find("td.selectable");
                    this.$grid.attr("aria-activedescendant", $cells.eq(0).attr("id"))
                } else {
                    this.$grid.attr("aria-activedescendant", this.$grid.find(".curMonth").attr("id"))
                }
                this.selectGridCell(this.$grid.attr("aria-activedescendant"));
                break;
            case 2:
                if (e.shiftKey) {
                    this.year -= 20
                } else {
                    this.year += 20
                }
            case 1:
                this.populateYearsCalendar();
                if (this.year != this.curYear) {
                    var $cells = this.$grid.find("td.selectable");
                    this.$grid.attr("aria-activedescendant", $cells.eq(0).attr("id"))
                } else {
                    this.$grid.attr("aria-activedescendant", this.$grid.find(".curYear").attr("id"))
                }
                this.selectGridCell(this.$grid.attr("aria-activedescendant"));
                break
        }
        return true
    };
    Datepicker.prototype.selectGridCell = function (cellId) {
        $("#" + cellId).addClass("focus").attr("aria-selected", "true").attr("tabindex", 0).focus()
    };
    Datepicker.prototype.unSelectGridCell = function (cellId) {
        $("#" + cellId).removeClass("focus").attr("aria-selected", "false").attr("tabindex", -1)
    };
    Datepicker.prototype.update = function () {
        var $curDay = $("#" + this.$grid.attr("aria-activedescendant"));
        var date = new Date(this.year, this.month, parseInt($curDay.attr("data-value"), 10));
        var val = this.formatDate(date, this.options.outputFormat);
        this.$target.val(val);
        this.$target.removeAttr("aria-invalid");
        this.$target.parents(".form-group").removeClass("has-error");
        this.$target.trigger("change");
        if (this.options.onUpdate) {
            this.options.onUpdate(val)
        }
    };
    Datepicker.prototype.updateLinked = function (date) {
        if (this.options.previous !== null && this.options.previous.val() !== "") {
            var previousDate = this.options.previous.datepicker("getDate");
            if (this.options.allowSameDate) {
                if (previousDate > date) {
                    var previousVal = this.formatDate(date, this.options.previous.datepicker("outputFormat"));
                    this.options.previous.val(previousVal)
                }
            } else {
                if (previousDate >= date) {
                    var previousVal = this.formatDate(new Date(date.getTime() - 60 * 60 * 24 * 1000), this.options.previous.datepicker("outputFormat"));
                    this.options.previous.val(previousVal)
                }
            }
        }
        if (this.options.next !== null && this.options.next.val() !== "") {
            var nextDate = this.options.next.datepicker("getDate");
            if (this.options.allowSameDate) {
                if (nextDate < date) {
                    var nextVal = this.formatDate(date, this.options.next.datepicker("outputFormat"));
                    this.options.next.val(nextVal)
                }
            } else {
                if (nextDate <= date) {
                    var nextVal = this.formatDate(new Date(date.getTime() + 60 * 60 * 24 * 1000), this.options.next.datepicker("outputFormat"));
                    this.options.next.val(nextVal)
                }
            }
        }
        if (this.options.next !== null) {
            if (this.options.allowSameDate) {
                this.options.next.datepicker("min", date)
            } else {
                this.options.next.datepicker("min", new Date(date.getTime() + 60 * 60 * 24 * 1000))
            }
        }
    };
    Datepicker.prototype.hideObject = function ($element) {
        $element.attr("aria-hidden", true);
        $element.hide()
    };
    Datepicker.prototype.showObject = function ($element) {
        $element.attr("aria-hidden", false);
        $element.show()
    };
    Datepicker.prototype.show = function (bTakeFocus) {
        var self = this;
        $(".datepicker-calendar").trigger("ab.datepicker.opening", [self.id]);
        if (this.options.modal == true) {
            if (!this.modalEventHandler) {
                this.modalEventHandler = function (e) {
                    self.$grid.focus();
                    e.stopPropagation;
                    return false
                }
            }
            $(document).on("click mousedown mouseup", this.modalEventHandler);
            this.greyOut(true);
            var zIndex = parseInt($("#datepicker-overlay").css("z-index"), 10) || 40;
            this.$calendar.css("z-index", zIndex + 1)
        } else {
            this.$calendar.off("ab.datepicker.opening").on("ab.datepicker.opening", function (e, id) {
                if (id != self.id) {
                    self.hide()
                } else {
                    if (bTakeFocus != false) {
                        self.$grid.focus()
                    }
                }
            })
        }
        this.$calendar.off("ab.datepicker.opened").on("ab.datepicker.opened", function (e, id) {
            if (id == self.id && bTakeFocus != false) {
                self.$grid.focus()
            }
            setTimeout(function () {
                $(document).on("click", $.proxy($("#" + id).data("ab.datepicker").handleDocumentClick, $("#" + id).data("ab.datepicker")))
            }, 0)
        });
        var groupOffsetTop = Math.max(0, Math.floor(this.$group[0].offsetTop));
        var groupOffsetLeft = Math.max(0, Math.floor(this.$group[0].offsetLeft + this.$target[0].offsetLeft));
        var calendarHeight = this.$calendar.outerHeight();
        var calendarWidth = this.$calendar.outerWidth();
        var groupAbsoluteTop = this.$group.offset().top;
        var groupAbsoluteLeft = this.$group.offset().left;
        var groupHeight = this.$group.outerHeight(true);
        var groupWidth = this.$group.outerWidth(true);
        var roomBefore = Math.floor(groupAbsoluteTop - $(window).scrollTop());
        var roomAfter = Math.floor($(window).height() - (groupAbsoluteTop + groupHeight - $(window).scrollTop()));
        var roomLeft = groupAbsoluteLeft;
        var roomRight = Math.floor($(window).width() - (groupAbsoluteLeft + calendarWidth));
        if (roomAfter < calendarHeight && roomAfter < roomBefore) {
            this.$calendar.addClass("above");
            this.$calendar.css({top: (groupOffsetTop - calendarHeight) + "px",})
        } else {
            this.$calendar.addClass("below");
            this.$calendar.css({top: (groupOffsetTop + groupHeight) + "px",})
        }
        if (roomRight < 0) {
            var calendarOverage = (groupAbsoluteLeft + calendarWidth) - $(window).width();
            this.$calendar.css({left: (groupOffsetLeft - Math.abs(calendarOverage) - 15) + "px"})
        } else {
            this.$calendar.css({left: groupOffsetLeft + "px"})
        }
        this.$calendar.attr("aria-hidden", "false");
        this.$calendar.show();
        $(".datepicker-calendar").trigger("ab.datepicker.opened", [self.id])
    };
    Datepicker.prototype.refresh = function () {
        this.drawCalendarHeader();
        switch (this.gridType) {
            case 0:
                this.populateDaysCalendar();
                break;
            case 1:
                this.populateMonthsCalendar();
                break;
            case 2:
                this.populateYearsCalendar();
                break
        }
    };
    Datepicker.prototype.handleDocumentClick = function (e) {
        if ($(e.target).parents("#datepicker-calendar-" + this.id).length == 0) {
            this.hide();
            return true
        } else {
            e.stopPropagation;
            return false
        }
    };
    Datepicker.prototype.hide = function (omitSettingFocus) {
        if (this.options.inline == false) {
            var self = this;
            if (this.options.modal == true) {
                if (this.modalEventHandler) {
                    $(document).off("click mousedown mouseup", this.modalEventHandler)
                }
                this.greyOut(false)
            } else {
                $(document).off("click", self.handleDocumentClick);
                this.$calendar.off("ab.datepicker.opening")
            }
            this.$calendar.removeClass("above below");
            this.$calendar.attr("aria-hidden", "true");
            this.$calendar.hide();
            $(".datepicker-calendar").trigger("ab.datepicker.closed", [self.id]);
            if (!omitSettingFocus) {
                this.$target.focus()
            }
        }
    };
    Datepicker.prototype.greyOut = function (on) {
        var $overlay = $("#datepicker-overlay");
        if ($overlay.length == 0 && on) {
            $("body").append('<div id="datepicker-overlay" class="datepicker-overlay"></div>');
            $overlay = $("#datepicker-overlay")
        }
        if (on) {
            $overlay.fadeIn(500)
        } else {
            $overlay.fadeOut(500)
        }
    };
    Datepicker.prototype.getDaysInMonth = function (year, month) {
        return 32 - new Date(year, month, 32).getDate()
    };
    Datepicker.prototype.previousMonth = function (year, month) {
        if (month == 0) {
            month = 11;
            year--
        } else {
            month--
        }
        return {year: year, month: month}
    };
    Datepicker.prototype.nextMonth = function (year, month) {
        if (month == 11) {
            month = 0;
            year++
        } else {
            month++
        }
        return {year: year, month: month}
    };
    Datepicker.prototype.formatDate = function (date, format) {
        var zeroPad = function (x) {
            return (x < 0 || x > 9 ? "" : "0") + x
        };
        var getWeekOfMonth = function (date) {
            return Math.ceil((date.getDate() - 1 - date.getDay()) / 7)
        };
        var getWeekOfYear = function (date) {
            var onejan = new Date(date.getFullYear(), 0, 1);
            return Math.ceil((((date - onejan) / 86400000) + onejan.getDay() + 1) / 7)
        };
        var getDayOfYear = function (date) {
            var start = new Date(date.getFullYear(), 0, 0);
            return Math.floor((date - start) / 86400000)
        };
        var getMillisecondsInDay = function (date) {
            var date1 = new Date(date.getTime());
            date1.setHours(0);
            return date - date1
        };
        var y = date.getFullYear() + "";
        var M = date.getMonth() + 1;
        var d = date.getDate();
        var D = getDayOfYear(date);
        var E = date.getDay();
        var H = date.getHours();
        var m = date.getMinutes();
        var s = date.getSeconds();
        var w = getWeekOfYear(date);
        var W = getWeekOfMonth(date);
        var F = Math.floor(date.getDate() / 7) + 1;
        var Q = Math.ceil((date.getMonth() + 1) / 3);
        var era = date.getFullYear() < 1 ? 0 : 1;
        var values = {
            y: "" + y,
            yyyy: y,
            yy: y.substring(2, 4),
            L: M,
            LL: zeroPad(M),
            LLL: this.locales.month_names_abbreviated[M - 1],
            LLLL: this.locales.month_names[M - 1],
            LLLLL: this.locales.month_names_narrow[M - 1],
            M: M,
            MM: zeroPad(M),
            MMM: this.locales.month_names_abbreviated[M - 1],
            MMMM: this.locales.month_names[M - 1],
            MMMMM: this.locales.month_names_narrow[M - 1],
            d: d,
            dd: zeroPad(d),
            D: D,
            DD: D,
            DDD: D,
            A: Math.round(getMillisecondsInDay(date) * Math.pow(10, -2)),
            AA: Math.round(getMillisecondsInDay(date) * Math.pow(10, -1)),
            AAA: Math.round(getMillisecondsInDay(date) * Math.pow(10, 0)),
            AAAA: Math.round(getMillisecondsInDay(date) * Math.pow(10, 1)),
            AAAAA: Math.round(getMillisecondsInDay(date) * Math.pow(10, 2)),
            AAAAAA: Math.round(getMillisecondsInDay(date) * Math.pow(10, 3)),
            E: this.locales.day_names_abbreviated[E],
            EE: this.locales.day_names_abbreviated[E],
            EEE: this.locales.day_names_abbreviated[E],
            EEEE: this.locales.day_names[E],
            EEEEE: this.locales.day_names_narrow[E],
            EEEEEE: this.locales.day_names_short[E],
            e: E,
            ee: E,
            eee: this.locales.day_names_abbreviated[E],
            eeee: this.locales.day_names[E],
            eeeee: this.locales.day_names_narrow[E],
            eeeeee: this.locales.day_names_short[E],
            c: E,
            cc: E,
            ccc: this.locales.day_names_abbreviated[E],
            cccc: this.locales.day_names[E],
            ccccc: this.locales.day_names_narrow[E],
            cccccc: this.locales.day_names_short[E],
            F: F,
            G: this.locales.era_names_abbreviated[era],
            GG: this.locales.era_names_abbreviated[era],
            GGG: this.locales.era_names_abbreviated[era],
            GGGG: this.locales.era_names[era],
            GGGGG: this.locales.era_names_narrow[era],
            Q: Q,
            QQ: zeroPad(Q),
            QQQ: this.locales.quarter_names_abbreviated[Q - 1],
            QQQQ: this.locales.quarter_names[Q - 1],
            QQQQQ: this.locales.quarter_names_narrow[Q - 1],
            q: Q,
            qq: zeroPad(Q),
            qqq: this.locales.quarter_names_abbreviated[Q - 1],
            qqqq: this.locales.quarter_names[Q - 1],
            qqqqq: this.locales.quarter_names_narrow[Q - 1],
            H: H,
            HH: zeroPad(H),
            h: H == 0 ? 12 : H > 12 ? H - 12 : H,
            hh: zeroPad(H == 0 ? 12 : H > 12 ? H - 12 : H),
            K: H > 11 ? H - 12 : H,
            k: H + 1,
            KK: zeroPad(H > 11 ? H - 12 : H),
            kk: zeroPad(H + 1),
            a: H > 11 ? this.locales.day_periods.pm : this.locales.day_periods.am,
            m: m,
            mm: zeroPad(m),
            s: s,
            ss: zeroPad(s),
            w: w,
            ww: zeroPad(w),
            W: W,
        };
        return format.replace(/('[^']+'|y{1,4}|L{1,5}|M{1,5}|c{1,6}|d{1,2}|D{1,3}|E{1,6}|e{1,6}|F{1,1}|G{1,5}|Q{1,5}|q{1,5}|H{1,2}|h{1,2}|K{1,2}|k{1,2}|m{1,2}|s{1,2}|w{1,2}|W{1,1}|A{1,6})/g, function (mask) {
            return mask.charAt(0) === "'" ? mask.substr(1, mask.length - 2) : values[mask] || mask
        })
    };
    Datepicker.prototype.createDateFromFormat = function (format, value) {
        var extractInteger = function (str, pos, minlength, maxlength) {
            for (var x = maxlength; x >= minlength; x--) {
                var integer = str.substring(pos, pos + x);
                if (integer.length < minlength) {
                    return null
                }
                if (/^\d+$/.test(integer)) {
                    return integer
                }
            }
            return null
        };
        var skipName = function (names, pos) {
            for (var i = 0; i < names.length; i++) {
                var name = names[i];
                if (value.substring(pos, pos + name.length).toLowerCase() == name.toLowerCase()) {
                    return name.length
                }
            }
            return 0
        };
        var pos = 0;
        var now = new Date();
        var year = now.getYear();
        var month = now.getMonth() + 1;
        var date = 1;
        var hh = 0;
        var mm = 0;
        var ss = 0;
        var ampm = "";
        var self = this;
        $.each(format.match(/(.).*?\1*/g), function (k, token) {
            switch (token) {
                case"yyyy":
                    year = extractInteger(value, pos, 4, 4);
                    if (year != null) {
                        pos += year.length
                    }
                    break;
                case"yy":
                    year = extractInteger(value, pos, 2, 2);
                    if (year != null) {
                        pos += year.length
                    }
                    break;
                case"y":
                    year = extractInteger(value, pos, 2, 4);
                    if (year != null) {
                        pos += year.length
                    }
                    break;
                case"MMM":
                case"LLL":
                    month = 0;
                    for (var i = 0; i < self.locales.month_names_abbreviated.length; i++) {
                        var month_name = self.locales.month_names_abbreviated[i];
                        if (value.substring(pos, pos + month_name.length).toLowerCase() == month_name.toLowerCase()) {
                            month = i + 1;
                            pos += month_name.length;
                            break
                        }
                    }
                    break;
                case"MMMM":
                case"LLLL":
                    month = 0;
                    for (var i = 0; i < self.locales.month_names.length; i++) {
                        var month_name = self.locales.month_names[i];
                        if (value.substring(pos, pos + month_name.length).toLowerCase() == month_name.toLowerCase()) {
                            month = i + 1;
                            pos += month_name.length;
                            break
                        }
                    }
                    break;
                case"EEE":
                case"EE":
                case"E":
                case"eee":
                    pos += skipName(self.locales.day_names_abbreviated, pos);
                    break;
                case"EEEE":
                case"eeee":
                case"cccc":
                    pos += skipName(self.locales.day_names, pos);
                    break;
                case"EEEEEE":
                case"eeeeee":
                case"cccccc":
                    pos += skipName(self.locales.day_names_short, pos);
                    break;
                case"MM":
                case"M":
                case"LL":
                case"L":
                    month = extractInteger(value, pos, token.length, 2);
                    if (month == null || (month < 1) || (month > 12)) {
                        return null
                    }
                    pos += month.length;
                    break;
                case"dd":
                case"d":
                    date = extractInteger(value, pos, token.length, 2);
                    if (date == null || (date < 1) || (date > 31)) {
                        return null
                    }
                    pos += date.length;
                    break;
                case"hh":
                case"h":
                    hh = extractInteger(value, pos, token.length, 2);
                    if (hh == null || (hh < 1) || (hh > 12)) {
                        return null
                    }
                    pos += hh.length;
                    break;
                case"HH":
                case"H":
                    hh = extractInteger(value, pos, token.length, 2);
                    if (hh == null || (hh < 0) || (hh > 23)) {
                        return null
                    }
                    pos += hh.length;
                    break;
                case"KK":
                case"K":
                    hh = extractInteger(value, pos, token.length, 2);
                    if (hh == null || (hh < 0) || (hh > 11)) {
                        return null
                    }
                    pos += hh.length;
                    break;
                case"kk":
                case"k":
                    hh = extractInteger(value, pos, token.length, 2);
                    if (hh == null || (hh < 1) || (hh > 24)) {
                        return null
                    }
                    pos += hh.length;
                    hh--;
                    break;
                case"mm":
                case"m":
                    mm = extractInteger(value, pos, token.length, 2);
                    if (mm == null || (mm < 0) || (mm > 59)) {
                        return null
                    }
                    pos += mm.length;
                    break;
                case"ss":
                case"s":
                    ss = extractInteger(value, pos, token.length, 2);
                    if (ss == null || (ss < 0) || (ss > 59)) {
                        return null
                    }
                    pos += ss.length;
                    break;
                case"a":
                    var amlength = self.locales.day_periods.am.length;
                    var pmlength = self.locales.day_periods.pm.length;
                    if (value.substring(pos, pos + amlength) == self.locales.day_periods.am) {
                        ampm = "AM";
                        pos += amlength
                    } else {
                        if (value.substring(pos, pos + pmlength) == self.locales.day_periods.pm) {
                            ampm = "PM";
                            pos += pmlength
                        } else {
                            return null
                        }
                    }
                    break;
                default:
                    if (value.substring(pos, pos + token.length) != token) {
                        return null
                    } else {
                        pos += token.length
                    }
            }
        });
        if (pos != value.length) {
            return null
        }
        if (year == null) {
            return null
        }
        if (year.length == 2) {
            if (year > 50) {
                year = 1900 + (year - 0)
            } else {
                year = 2000 + (year - 0)
            }
        }
        if ((month < 1) || (month > 12)) {
            return null
        }
        if (month == 2) {
            if (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)) {
                if (date > 29) {
                    return null
                }
            } else {
                if (date > 28) {
                    return null
                }
            }
        }
        if ((month == 4) || (month == 6) || (month == 9) || (month == 11)) {
            if (date > 30) {
                return null
            }
        }
        if (hh < 12 && ampm == "PM") {
            hh = hh - 0 + 12
        } else {
            if (hh > 11 && ampm == "AM") {
                hh -= 12
            }
        }
        return new Date(year, month - 1, date, hh, mm, ss)
    };
    Datepicker.prototype.parseDate = function (value) {
        var date = null;
        var self = this;
        $.each(this.options.inputFormat, function (i, format) {
            date = self.createDateFromFormat(format, value);
            if (date != null) {
                return false
            }
        });
        if (date == null) {
            date = self.createDateFromFormat(this.options.outputFormat, value)
        }
        return date
    };
    Datepicker.prototype.min = function (value) {
        if (value != null) {
            this.options.min = value instanceof Date ? value : this.parseDate(value);
            if (this.options.min != null && this.dateObj < this.options.min) {
                this.$target.attr("aria-invalid", true);
                this.$target.parents(".form-group").addClass("has-error");
                this.dateObj = this.options.min
            }
            if (this.options.inline != false) {
                this.refresh()
            }
        }
        return this.options.min
    };
    Datepicker.prototype.max = function (value) {
        if (value != null) {
            this.options.max = value instanceof Date ? value : this.parseDate(value);
            if (this.options.max != null && this.dateObj > this.options.max) {
                this.$target.attr("aria-invalid", true);
                this.$target.parents(".form-group").addClass("has-error");
                this.dateObj = this.options.max
            }
            if (this.options.inline != false) {
                this.refresh()
            }
        }
        return this.options.max
    };
    Datepicker.prototype.next = function (value) {
        if (value != null) {
            if (typeof value === "string") {
                this.options.next = $(value)
            } else {
                if (this.options.next instanceof jQuery) {
                    this.options.next = value
                }
            }
        }
        return this.options.next
    };
    Datepicker.prototype.previous = function (value) {
        if (value != null) {
            if (typeof value === "string") {
                this.options.previous = $(value)
            } else {
                if (this.options.previous instanceof jQuery) {
                    this.options.previous = value
                }
            }
        }
        return this.options.previous
    };
    Datepicker.prototype.theme = function (value) {
        if (value != null) {
            this.$button.removeClass(this.options.theme);
            this.$calendar.removeClass(this.options.theme);
            this.options.theme = value;
            this.$button.addClass(this.options.theme);
            this.$calendar.addClass(this.options.theme)
        }
        return this.options.theme
    };
    Datepicker.prototype.firstDayOfWeek = function (value) {
        if (value != null) {
            this.options.firstDayOfWeek = parseInt(value, 10);
            if (this.options.inline == false) {
                this.drawCalendarHeader()
            } else {
                this.refresh()
            }
        }
        return this.options.firstDayOfWeek
    };
    Datepicker.prototype.daysOfWeekDisabled = function (value) {
        if (value != null) {
            this.options.daysOfWeekDisabled = [];
            if (!$.isArray(value)) {
                value = [value]
            }
            var self = this;
            $.each(value, function (i, val) {
                if (typeof val === "number") {
                    self.options.daysOfWeekDisabled.push(val)
                } else {
                    if (typeof val === "string") {
                        self.options.daysOfWeekDisabled.push(parseInt(val, 10))
                    }
                }
            })
        }
        return this.options.daysOfWeekDisabled
    };
    Datepicker.prototype.weekDayFormat = function (value) {
        if (value != null) {
            this.options.weekDayFormat = value;
            this.drawCalendarHeader()
        }
        return this.options.weekDayFormat
    };
    Datepicker.prototype.inputFormat = function (value) {
        if (value != null) {
            if (!$.isArray(value)) {
                value = [value]
            }
            if (this.$target.attr("placeholder") == this.options.inputFormat[0]) {
                this.$target.attr("placeholder", value[0])
            }
            this.options.inputFormat = value
        }
        return this.options.inputFormat
    };
    Datepicker.prototype.outputFormat = function (value) {
        if (value != null) {
            this.options.outputFormat = value
        }
        return this.options.outputFormat
    };
    Datepicker.prototype.modal = function (value) {
        if (value != null) {
            this.options.modal = value;
            if (this.options.modal == true) {
                if (this.options.inline == false) {
                    this.showObject(this.$calendar.find(".datepicker-close-wrap"));
                    this.showObject(this.$calendar.find(".datepicker-bn-close-label"))
                }
                this.$close = this.$calendar.find(".datepicker-close");
                this.$close.html(this.options.closeButtonTitle).attr("title", this.options.closeButtonLabel);
                this.$calendar.find(".datepicker-bn-close-label").html(this.options.closeButtonLabel);
                var self = this;
                this.$close.click(function (e) {
                    return self.handleCloseClick(e)
                });
                this.$close.keydown(function (e) {
                    return self.handleCloseKeyDown(e)
                })
            } else {
                this.hideObject(this.$calendar.find(".datepicker-close-wrap"));
                this.hideObject(this.$calendar.find(".datepicker-bn-close-label"))
            }
        }
        return this.options.modal
    };
    Datepicker.prototype.inline = function (value) {
        if (value != null) {
            if (value != false) {
                this.hideObject(this.$button);
                this.hideObject(this.$calendar.find(".datepicker-close-wrap"));
                this.hideObject(this.$calendar.find(".datepicker-bn-close-label"));
                var $container = typeof value === "string" ? $("#" + value) : value;
                $container.append(this.$calendar);
                this.$calendar.css({position: "relative", left: "0px", top: "0px"});
                this.options.inline = value;
                this.initializeDate();
                this.showObject(this.$calendar)
            } else {
                this.$target.parent().after(this.$calendar);
                this.showObject(this.$button);
                if (this.options.modal == true) {
                    this.showObject(this.$calendar.find(".datepicker-close-wrap"));
                    this.showObject(this.$calendar.find(".datepicker-bn-close-label"))
                }
                if (this.$calendar.parent().css("position") === "static") {
                    this.$calendar.parent().css("position", "relative")
                }
                this.$calendar.css({position: "absolute"});
                this.options.inline = value;
                this.hide()
            }
        }
        return this.options.inline
    };
    Datepicker.prototype.format = function (date) {
        return this.formatDate(date, this.options.outputFormat)
    };
    Datepicker.prototype.enable = function () {
        this.$button.removeClass("disabled");
        this.$button.attr("aria-disabled", false);
        this.$button.attr("tabindex", 0)
    };
    Datepicker.prototype.disable = function () {
        this.hide();
        this.$button.addClass("disabled");
        this.$button.attr("aria-disabled", true);
        this.$button.attr("tabindex", -1)
    };
    Datepicker.prototype.datesDisabled = function (dates) {
        this.options.datesDisabled = [];
        if (!$.isArray(dates)) {
            dates = [dates]
        }
        var self = this;
        $.each(dates, function (i, v) {
            if (typeof v === "string") {
                var date = self.parseDate(v);
                if (date !== null) {
                    self.options.datesDisabled.push(self.format(date))
                }
            } else {
                if (v instanceof Date && !isNaN(v.valueOf())) {
                    self.options.datesDisabled.push(self.format(v))
                }
            }
        })
    };
    Datepicker.prototype.startview = function (view) {
        switch (view) {
            case 1:
            case"months":
                this.options.startView = 1;
                break;
            case 2:
            case"years":
                this.options.startView = 2;
                break;
            default:
                this.options.startView = 0
        }
    };
    Datepicker.prototype.setLocales = function (value) {
        this.locales = value;
        this.options.inputFormat = [this.locales.short_format];
        this.options.outputFormat = this.locales.short_format;
        this.options.titleFormat = this.locales.full_format, this.options.firstDayOfWeek = this.locales.firstday_of_week;
        this.options.buttonTitle = this.locales.texts.buttonTitle;
        this.$button.find("span").attr("title", this.options.buttonTitle);
        this.options.buttonLabel = this.locales.texts.buttonLabel;
        this.options.prevButtonLabel = this.locales.texts.prevButtonLabel;
        this.options.prevMonthButtonLabel = this.locales.texts.prevMonthButtonLabel;
        this.options.prevYearButtonLabel = this.locales.texts.prevYearButtonLabel;
        this.options.nextButtonLabel = this.locales.texts.nextButtonLabel;
        this.options.nextMonthButtonLabel = this.locales.texts.nextMonthButtonLabel;
        this.options.nextYearButtonLabel = this.locales.texts.nextYearButtonLabel;
        this.options.changeMonthButtonLabel = this.locales.texts.changeMonthButtonLabel;
        this.options.changeYearButtonLabel = this.locales.texts.changeYearButtonLabel;
        this.options.changeRangeButtonLabel = this.locales.texts.changeRangeButtonLabel;
        this.options.closeButtonTitle = this.locales.texts.closeButtonTitle;
        this.options.closeButtonLabel = this.locales.texts.closeButtonLabel;
        this.options.calendarHelp = this.locales.texts.calendarHelp;
        this.drawCalendarHeader();
        if (this.locales.directionality === "RTL") {
            this.$grid.addClass("rtl")
        } else {
            this.$grid.removeClass("rtl")
        }
    };
    var old = $.fn.datepicker;
    $.fn.datepicker = function (option, value) {
        if (typeof option == "string" && $(this).length == 1) {
            var data = $(this).eq(0).data("ab.datepicker");
            if (data) {
                return data[option](value)
            } else {
                var $this = $(this);
                setTimeout(function () {
                    var data = $this.eq(0).data("ab.datepicker");
                    if (data) {
                        return data[option](value)
                    }
                }, 0)
            }
        } else {
            return this.each(function () {
                var $this = $(this);
                var data = $this.data("ab.datepicker");
                var options = $.extend({}, Datepicker.DEFAULTS, $this.data(), typeof option == "object" && option);
                if (!data) {
                    $this.data("ab.datepicker", (data = new Datepicker(this, options)))
                }
                if (typeof option == "string") {
                    data[option](value)
                }
            })
        }
    };
    $.fn.datepicker.Constructor = Datepicker;
    $.fn.datepicker.noConflict = function () {
        $.fn.datepicker = old;
        return this
    }
}));
(function (factory) {
    if (typeof define === "function" && define.amd) {
        define(["jquery"], factory)
    } else {
        if (typeof exports !== "undefined") {
            module.exports = factory(require("jquery"))
        } else {
            factory(jQuery)
        }
    }
}(function ($) {
    var Slick = window.Slick || {};
    Slick = (function () {
        var instanceUid = 0;

        function Slick(element, settings) {
            var _ = this, dataSettings;
            _.defaults = {
                accessibility: true,
                adaptiveHeight: false,
                appendArrows: $(element),
                appendDots: $(element),
                arrows: true,
                asNavFor: null,
                prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0">Previous</button>',
                nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0">Next</button>',
                autoplay: false,
                autoplaySpeed: 3000,
                centerMode: false,
                centerPadding: "50px",
                cssEase: "ease",
                customPaging: function (slider, i) {
                    return $('<button type="button" data-role="none" aria-current="false" />').text(i + 1)
                },
                dots: false,
                dotsClass: "slick-dots",
                draggable: true,
                easing: "linear",
                edgeFriction: 0.35,
                fade: false,
                focusOnSelect: false,
                infinite: true,
                initialSlide: 0,
                lazyLoad: "ondemand",
                mobileFirst: false,
                pauseOnHover: true,
                pauseOnFocus: true,
                pauseOnDotsHover: false,
                respondTo: "window",
                responsive: null,
                rows: 1,
                rtl: false,
                slide: "",
                slidesPerRow: 1,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
                swipe: true,
                swipeToSlide: false,
                touchMove: true,
                touchThreshold: 5,
                useCSS: true,
                useTransform: true,
                variableWidth: false,
                vertical: false,
                verticalSwiping: false,
                waitForAnimate: true,
                zIndex: 1000
            };
            _.initials = {
                animating: false,
                dragging: false,
                autoPlayTimer: null,
                currentDirection: 0,
                currentLeft: null,
                currentSlide: 0,
                direction: 1,
                $dots: null,
                listWidth: null,
                listHeight: null,
                loadIndex: 0,
                $nextArrow: null,
                $prevArrow: null,
                slideCount: null,
                slideWidth: null,
                $slideTrack: null,
                $slides: null,
                sliding: false,
                slideOffset: 0,
                swipeLeft: null,
                $list: null,
                touchObject: {},
                transformsEnabled: false,
                unslicked: false
            };
            $.extend(_, _.initials);
            _.activeBreakpoint = null;
            _.animType = null;
            _.animProp = null;
            _.breakpoints = [];
            _.breakpointSettings = [];
            _.cssTransitions = false;
            _.focussed = false;
            _.interrupted = false;
            _.hidden = "hidden";
            _.paused = true;
            _.positionProp = null;
            _.respondTo = null;
            _.rowCount = 1;
            _.shouldClick = true;
            _.$slider = $(element);
            _.$slidesCache = null;
            _.transformType = null;
            _.transitionType = null;
            _.visibilityChange = "visibilitychange";
            _.windowWidth = 0;
            _.windowTimer = null;
            dataSettings = $(element).data("slick") || {};
            _.options = $.extend({}, _.defaults, settings, dataSettings);
            _.currentSlide = _.options.initialSlide;
            _.originalSettings = _.options;
            if (typeof document.mozHidden !== "undefined") {
                _.hidden = "mozHidden";
                _.visibilityChange = "mozvisibilitychange"
            } else {
                if (typeof document.webkitHidden !== "undefined") {
                    _.hidden = "webkitHidden";
                    _.visibilityChange = "webkitvisibilitychange"
                }
            }
            _.autoPlay = $.proxy(_.autoPlay, _);
            _.autoPlayClear = $.proxy(_.autoPlayClear, _);
            _.autoPlayIterator = $.proxy(_.autoPlayIterator, _);
            _.changeSlide = $.proxy(_.changeSlide, _);
            _.clickHandler = $.proxy(_.clickHandler, _);
            _.selectHandler = $.proxy(_.selectHandler, _);
            _.setPosition = $.proxy(_.setPosition, _);
            _.swipeHandler = $.proxy(_.swipeHandler, _);
            _.dragHandler = $.proxy(_.dragHandler, _);
            _.keyHandler = $.proxy(_.keyHandler, _);
            _.instanceUid = instanceUid++;
            _.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/;
            _.registerBreakpoints();
            _.init(true)
        }

        return Slick
    }());
    Slick.prototype.activateADA = function () {
        var _ = this;
        _.$slideTrack.find(".slick-active").attr({"aria-hidden": "false"}).find("a, input, button, select").attr({tabindex: "0"})
    };
    Slick.prototype.addSlide = Slick.prototype.slickAdd = function (markup, index, addBefore) {
        var _ = this;
        if (typeof (index) === "boolean") {
            addBefore = index;
            index = null
        } else {
            if (index < 0 || (index >= _.slideCount)) {
                return false
            }
        }
        _.unload();
        if (typeof (index) === "number") {
            if (index === 0 && _.$slides.length === 0) {
                $(markup).appendTo(_.$slideTrack)
            } else {
                if (addBefore) {
                    $(markup).insertBefore(_.$slides.eq(index))
                } else {
                    $(markup).insertAfter(_.$slides.eq(index))
                }
            }
        } else {
            if (addBefore === true) {
                $(markup).prependTo(_.$slideTrack)
            } else {
                $(markup).appendTo(_.$slideTrack)
            }
        }
        _.$slides = _.$slideTrack.children(this.options.slide);
        _.$slideTrack.children(this.options.slide).detach();
        _.$slideTrack.append(_.$slides);
        _.$slides.each(function (index, element) {
            $(element).attr("data-slick-index", index)
        });
        _.$slidesCache = _.$slides;
        _.reinit()
    };
    Slick.prototype.animateHeight = function () {
        var _ = this;
        if (_.options.slidesToShow === 1 && _.options.adaptiveHeight === true && _.options.vertical === false) {
            var targetHeight = _.$slides.eq(_.currentSlide).outerHeight(true);
            _.$list.animate({height: targetHeight}, _.options.speed)
        }
    };
    Slick.prototype.animateSlide = function (targetLeft, callback) {
        var animProps = {}, _ = this;
        _.animateHeight();
        if (_.options.rtl === true && _.options.vertical === false) {
            targetLeft = -targetLeft
        }
        if (_.transformsEnabled === false) {
            if (_.options.vertical === false) {
                _.$slideTrack.animate({left: targetLeft}, _.options.speed, _.options.easing, callback)
            } else {
                _.$slideTrack.animate({top: targetLeft}, _.options.speed, _.options.easing, callback)
            }
        } else {
            if (_.cssTransitions === false) {
                if (_.options.rtl === true) {
                    _.currentLeft = -(_.currentLeft)
                }
                $({animStart: _.currentLeft}).animate({animStart: targetLeft}, {
                    duration: _.options.speed,
                    easing: _.options.easing,
                    step: function (now) {
                        now = Math.ceil(now);
                        if (_.options.vertical === false) {
                            animProps[_.animType] = "translate(" + now + "px, 0px)";
                            _.$slideTrack.css(animProps)
                        } else {
                            animProps[_.animType] = "translate(0px," + now + "px)";
                            _.$slideTrack.css(animProps)
                        }
                    },
                    complete: function () {
                        if (callback) {
                            callback.call()
                        }
                    }
                })
            } else {
                _.applyTransition();
                targetLeft = Math.ceil(targetLeft);
                if (_.options.vertical === false) {
                    animProps[_.animType] = "translate3d(" + targetLeft + "px, 0px, 0px)"
                } else {
                    animProps[_.animType] = "translate3d(0px," + targetLeft + "px, 0px)"
                }
                _.$slideTrack.css(animProps);
                if (callback) {
                    setTimeout(function () {
                        _.disableTransition();
                        callback.call()
                    }, _.options.speed)
                }
            }
        }
    };
    Slick.prototype.getNavTarget = function () {
        var _ = this, asNavFor = _.options.asNavFor;
        if (asNavFor && asNavFor !== null) {
            asNavFor = $(asNavFor).not(_.$slider)
        }
        return asNavFor
    };
    Slick.prototype.asNavFor = function (index) {
        var _ = this, asNavFor = _.getNavTarget();
        if (asNavFor !== null && typeof asNavFor === "object") {
            asNavFor.each(function () {
                var target = $(this).slick("getSlick");
                if (!target.unslicked) {
                    target.slideHandler(index, true)
                }
            })
        }
    };
    Slick.prototype.applyTransition = function (slide) {
        var _ = this, transition = {};
        if (_.options.fade === false) {
            transition[_.transitionType] = _.transformType + " " + _.options.speed + "ms " + _.options.cssEase
        } else {
            transition[_.transitionType] = "opacity " + _.options.speed + "ms " + _.options.cssEase
        }
        if (_.options.fade === false) {
            _.$slideTrack.css(transition)
        } else {
            _.$slides.eq(slide).css(transition)
        }
    };
    Slick.prototype.autoPlay = function () {
        var _ = this;
        _.autoPlayClear();
        if (_.slideCount > _.options.slidesToShow) {
            _.autoPlayTimer = setInterval(_.autoPlayIterator, _.options.autoplaySpeed)
        }
    };
    Slick.prototype.autoPlayClear = function () {
        var _ = this;
        if (_.autoPlayTimer) {
            clearInterval(_.autoPlayTimer)
        }
    };
    Slick.prototype.autoPlayIterator = function () {
        var _ = this, slideTo = _.currentSlide + _.options.slidesToScroll;
        if (!_.paused && !_.interrupted && !_.focussed) {
            if (_.options.infinite === false) {
                if (_.direction === 1 && (_.currentSlide + 1) === (_.slideCount - 1)) {
                    _.direction = 0
                } else {
                    if (_.direction === 0) {
                        slideTo = _.currentSlide - _.options.slidesToScroll;
                        if (_.currentSlide - 1 === 0) {
                            _.direction = 1
                        }
                    }
                }
            }
            _.slideHandler(slideTo)
        }
    };
    Slick.prototype.buildArrows = function () {
        var _ = this;
        if (_.options.arrows === true) {
            _.$prevArrow = $(_.options.prevArrow).addClass("slick-arrow");
            _.$nextArrow = $(_.options.nextArrow).addClass("slick-arrow");
            if (_.slideCount > _.options.slidesToShow) {
                _.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex");
                _.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex");
                if (_.htmlExpr.test(_.options.prevArrow)) {
                    _.$prevArrow.prependTo(_.options.appendArrows)
                }
                if (_.htmlExpr.test(_.options.nextArrow)) {
                    _.$nextArrow.appendTo(_.options.appendArrows)
                }
                if (_.options.infinite !== true) {
                    _.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")
                }
            } else {
                _.$prevArrow.add(_.$nextArrow).addClass("slick-hidden").attr({"aria-disabled": "true", tabindex: "-1"})
            }
        }
    };
    Slick.prototype.buildDots = function () {
        var _ = this, i, dot;
        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {
            _.$slider.addClass("slick-dotted");
            dot = $("<ul />").addClass(_.options.dotsClass);
            for (i = 0; i <= _.getDotCount(); i += 1) {
                dot.append($("<li />").append(_.options.customPaging.call(this, _, i)))
            }
            _.$dots = dot.appendTo(_.options.appendDots);
            _.$dots.find("li").first().addClass("slick-active");
            _.$dots.find("li").first().find("button").attr("aria-current", "true")
        }
    };
    Slick.prototype.buildOut = function () {
        var _ = this;
        _.$slides = _.$slider.children(_.options.slide + ":not(.slick-cloned)").addClass("slick-slide");
        _.slideCount = _.$slides.length;
        _.$slides.each(function (index, element) {
            $(element).attr("data-slick-index", index).data("originalStyling", $(element).attr("style") || "")
        });
        _.$slider.addClass("slick-slider");
        _.$slideTrack = (_.slideCount === 0) ? $('<div class="slick-track"/>').appendTo(_.$slider) : _.$slides.wrapAll('<div class="slick-track"/>').parent();
        _.$list = _.$slideTrack.wrap('<div aria-live="polite" class="slick-list"/>').parent();
        _.$slideTrack.css("opacity", 0);
        if (_.options.centerMode === true || _.options.swipeToSlide === true) {
            _.options.slidesToScroll = 1
        }
        $("img[data-lazy]", _.$slider).not("[src]").addClass("slick-loading");
        _.setupInfinite();
        _.buildArrows();
        _.buildDots();
        _.updateDots();
        _.setSlideClasses(typeof _.currentSlide === "number" ? _.currentSlide : 0);
        if (_.options.draggable === true) {
            _.$list.addClass("draggable")
        }
    };
    Slick.prototype.buildRows = function () {
        var _ = this, a, b, c, newSlides, numOfSlides, originalSlides, slidesPerSection;
        newSlides = document.createDocumentFragment();
        originalSlides = _.$slider.children();
        if (_.options.rows > 1) {
            slidesPerSection = _.options.slidesPerRow * _.options.rows;
            numOfSlides = Math.ceil(originalSlides.length / slidesPerSection);
            for (a = 0; a < numOfSlides; a++) {
                var slide = document.createElement("div");
                for (b = 0; b < _.options.rows; b++) {
                    var row = document.createElement("div");
                    for (c = 0; c < _.options.slidesPerRow; c++) {
                        var target = (a * slidesPerSection + ((b * _.options.slidesPerRow) + c));
                        if (originalSlides.get(target)) {
                            row.appendChild(originalSlides.get(target))
                        }
                    }
                    slide.appendChild(row)
                }
                newSlides.appendChild(slide)
            }
            _.$slider.empty().append(newSlides);
            _.$slider.children().children().children().css({
                width: (100 / _.options.slidesPerRow) + "%",
                display: "inline-block"
            })
        }
    };
    Slick.prototype.checkResponsive = function (initial, forceUpdate) {
        var _ = this, breakpoint, targetBreakpoint, respondToWidth, triggerBreakpoint = false;
        var sliderWidth = _.$slider.width();
        var windowWidth = window.innerWidth || $(window).width();
        if (_.respondTo === "window") {
            respondToWidth = windowWidth
        } else {
            if (_.respondTo === "slider") {
                respondToWidth = sliderWidth
            } else {
                if (_.respondTo === "min") {
                    respondToWidth = Math.min(windowWidth, sliderWidth)
                }
            }
        }
        if (_.options.responsive && _.options.responsive.length && _.options.responsive !== null) {
            targetBreakpoint = null;
            for (breakpoint in _.breakpoints) {
                if (_.breakpoints.hasOwnProperty(breakpoint)) {
                    if (_.originalSettings.mobileFirst === false) {
                        if (respondToWidth < _.breakpoints[breakpoint]) {
                            targetBreakpoint = _.breakpoints[breakpoint]
                        }
                    } else {
                        if (respondToWidth > _.breakpoints[breakpoint]) {
                            targetBreakpoint = _.breakpoints[breakpoint]
                        }
                    }
                }
            }
            if (targetBreakpoint !== null) {
                if (_.activeBreakpoint !== null) {
                    if (targetBreakpoint !== _.activeBreakpoint || forceUpdate) {
                        _.activeBreakpoint = targetBreakpoint;
                        if (_.breakpointSettings[targetBreakpoint] === "unslick") {
                            _.unslick(targetBreakpoint)
                        } else {
                            _.options = $.extend({}, _.originalSettings, _.breakpointSettings[targetBreakpoint]);
                            if (initial === true) {
                                _.currentSlide = _.options.initialSlide
                            }
                            _.refresh(initial)
                        }
                        triggerBreakpoint = targetBreakpoint
                    }
                } else {
                    _.activeBreakpoint = targetBreakpoint;
                    if (_.breakpointSettings[targetBreakpoint] === "unslick") {
                        _.unslick(targetBreakpoint)
                    } else {
                        _.options = $.extend({}, _.originalSettings, _.breakpointSettings[targetBreakpoint]);
                        if (initial === true) {
                            _.currentSlide = _.options.initialSlide
                        }
                        _.refresh(initial)
                    }
                    triggerBreakpoint = targetBreakpoint
                }
            } else {
                if (_.activeBreakpoint !== null) {
                    _.activeBreakpoint = null;
                    _.options = _.originalSettings;
                    if (initial === true) {
                        _.currentSlide = _.options.initialSlide
                    }
                    _.refresh(initial);
                    triggerBreakpoint = targetBreakpoint
                }
            }
            if (!initial && triggerBreakpoint !== false) {
                _.$slider.trigger("breakpoint", [_, triggerBreakpoint])
            }
        }
    };
    Slick.prototype.changeSlide = function (event, dontAnimate) {
        var _ = this, $target = $(event.currentTarget), indexOffset, slideOffset, unevenOffset;
        if ($target.is("a")) {
            event.preventDefault()
        }
        if (!$target.is("li")) {
            $target = $target.closest("li")
        }
        unevenOffset = (_.slideCount % _.options.slidesToScroll !== 0);
        indexOffset = unevenOffset ? 0 : (_.slideCount - _.currentSlide) % _.options.slidesToScroll;
        switch (event.data.message) {
            case"previous":
                slideOffset = indexOffset === 0 ? _.options.slidesToScroll : _.options.slidesToShow - indexOffset;
                if (_.slideCount > _.options.slidesToShow) {
                    _.slideHandler(_.currentSlide - slideOffset, false, dontAnimate)
                }
                break;
            case"next":
                slideOffset = indexOffset === 0 ? _.options.slidesToScroll : indexOffset;
                if (_.slideCount > _.options.slidesToShow) {
                    _.slideHandler(_.currentSlide + slideOffset, false, dontAnimate)
                }
                break;
            case"index":
                var index = event.data.index === 0 ? 0 : event.data.index || $target.index() * _.options.slidesToScroll;
                _.slideHandler(_.checkNavigable(index), false, dontAnimate);
                $target.children().trigger("focus");
                break;
            default:
                return
        }
    };
    Slick.prototype.checkNavigable = function (index) {
        var _ = this, navigables, prevNavigable;
        navigables = _.getNavigableIndexes();
        prevNavigable = 0;
        if (index > navigables[navigables.length - 1]) {
            index = navigables[navigables.length - 1]
        } else {
            for (var n in navigables) {
                if (index < navigables[n]) {
                    index = prevNavigable;
                    break
                }
                prevNavigable = navigables[n]
            }
        }
        return index
    };
    Slick.prototype.cleanUpEvents = function () {
        var _ = this;
        if (_.options.dots && _.$dots !== null) {
            $("li", _.$dots).off("click.slick", _.changeSlide).off("mouseenter.slick", $.proxy(_.interrupt, _, true)).off("mouseleave.slick", $.proxy(_.interrupt, _, false))
        }
        _.$slider.off("focus.slick blur.slick");
        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
            _.$prevArrow && _.$prevArrow.off("click.slick", _.changeSlide);
            _.$nextArrow && _.$nextArrow.off("click.slick", _.changeSlide)
        }
        _.$list.off("touchstart.slick mousedown.slick", _.swipeHandler);
        _.$list.off("touchmove.slick mousemove.slick", _.swipeHandler);
        _.$list.off("touchend.slick mouseup.slick", _.swipeHandler);
        _.$list.off("touchcancel.slick mouseleave.slick", _.swipeHandler);
        _.$list.off("click.slick", _.clickHandler);
        $(document).off(_.visibilityChange, _.visibility);
        _.cleanUpSlideEvents();
        if (_.options.accessibility === true) {
            _.$list.off("keydown.slick", _.keyHandler)
        }
        if (_.options.focusOnSelect === true) {
            $(_.$slideTrack).children().off("click.slick", _.selectHandler)
        }
        $(window).off("orientationchange.slick.slick-" + _.instanceUid, _.orientationChange);
        $(window).off("resize.slick.slick-" + _.instanceUid, _.resize);
        $("[draggable!=true]", _.$slideTrack).off("dragstart", _.preventDefault);
        $(window).off("load.slick.slick-" + _.instanceUid, _.setPosition);
        $(document).off("ready.slick.slick-" + _.instanceUid, _.setPosition)
    };
    Slick.prototype.cleanUpSlideEvents = function () {
        var _ = this;
        _.$list.off("mouseenter.slick", $.proxy(_.interrupt, _, true));
        _.$list.off("mouseleave.slick", $.proxy(_.interrupt, _, false))
    };
    Slick.prototype.cleanUpRows = function () {
        var _ = this, originalSlides;
        if (_.options.rows > 1) {
            originalSlides = _.$slides.children().children();
            originalSlides.removeAttr("style");
            _.$slider.empty().append(originalSlides)
        }
    };
    Slick.prototype.clickHandler = function (event) {
        var _ = this;
        if (_.shouldClick === false) {
            event.stopImmediatePropagation();
            event.stopPropagation();
            event.preventDefault()
        }
    };
    Slick.prototype.destroy = function (refresh) {
        var _ = this;
        _.autoPlayClear();
        _.touchObject = {};
        _.cleanUpEvents();
        $(".slick-cloned", _.$slider).detach();
        if (_.$dots) {
            _.$dots.remove()
        }
        if (_.$prevArrow && _.$prevArrow.length) {
            _.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", "");
            if (_.htmlExpr.test(_.options.prevArrow)) {
                _.$prevArrow.remove()
            }
        }
        if (_.$nextArrow && _.$nextArrow.length) {
            _.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", "");
            if (_.htmlExpr.test(_.options.nextArrow)) {
                _.$nextArrow.remove()
            }
        }
        if (_.$slides) {
            _.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function () {
                $(this).attr("style", $(this).data("originalStyling"))
            });
            _.$slideTrack.children(this.options.slide).detach();
            _.$slideTrack.detach();
            _.$list.detach();
            _.$slider.append(_.$slides)
        }
        _.cleanUpRows();
        _.$slider.removeClass("slick-slider");
        _.$slider.removeClass("slick-initialized");
        _.$slider.removeClass("slick-dotted");
        _.unslicked = true;
        if (!refresh) {
            _.$slider.trigger("destroy", [_])
        }
    };
    Slick.prototype.disableTransition = function (slide) {
        var _ = this, transition = {};
        transition[_.transitionType] = "";
        if (_.options.fade === false) {
            _.$slideTrack.css(transition)
        } else {
            _.$slides.eq(slide).css(transition)
        }
    };
    Slick.prototype.fadeSlide = function (slideIndex, callback) {
        var _ = this;
        if (_.cssTransitions === false) {
            _.$slides.eq(slideIndex).css({zIndex: _.options.zIndex});
            _.$slides.eq(slideIndex).animate({opacity: 1}, _.options.speed, _.options.easing, callback)
        } else {
            _.applyTransition(slideIndex);
            _.$slides.eq(slideIndex).css({opacity: 1, zIndex: _.options.zIndex});
            if (callback) {
                setTimeout(function () {
                    _.disableTransition(slideIndex);
                    callback.call()
                }, _.options.speed)
            }
        }
    };
    Slick.prototype.fadeSlideOut = function (slideIndex) {
        var _ = this;
        if (_.cssTransitions === false) {
            _.$slides.eq(slideIndex).animate({
                opacity: 0,
                zIndex: _.options.zIndex - 2
            }, _.options.speed, _.options.easing)
        } else {
            _.applyTransition(slideIndex);
            _.$slides.eq(slideIndex).css({opacity: 0, zIndex: _.options.zIndex - 2})
        }
    };
    Slick.prototype.filterSlides = Slick.prototype.slickFilter = function (filter) {
        var _ = this;
        if (filter !== null) {
            _.$slidesCache = _.$slides;
            _.unload();
            _.$slideTrack.children(this.options.slide).detach();
            _.$slidesCache.filter(filter).appendTo(_.$slideTrack);
            _.reinit()
        }
    };
    Slick.prototype.focusHandler = function () {
        var _ = this;
        _.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick", "*:not(.slick-arrow)", function (event) {
            event.stopImmediatePropagation();
            var $sf = $(this);
            setTimeout(function () {
                if (_.options.pauseOnFocus) {
                    _.focussed = $sf.is(":focus");
                    _.autoPlay()
                }
            }, 0)
        })
    };
    Slick.prototype.getCurrent = Slick.prototype.slickCurrentSlide = function () {
        var _ = this;
        return _.currentSlide
    };
    Slick.prototype.getDotCount = function () {
        var _ = this;
        var breakPoint = 0;
        var counter = 0;
        var pagerQty = 0;
        if (_.options.infinite === true) {
            while (breakPoint < _.slideCount) {
                ++pagerQty;
                breakPoint = counter + _.options.slidesToScroll;
                counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow
            }
        } else {
            if (_.options.centerMode === true) {
                pagerQty = _.slideCount
            } else {
                if (!_.options.asNavFor) {
                    pagerQty = 1 + Math.ceil((_.slideCount - _.options.slidesToShow) / _.options.slidesToScroll)
                } else {
                    while (breakPoint < _.slideCount) {
                        ++pagerQty;
                        breakPoint = counter + _.options.slidesToScroll;
                        counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow
                    }
                }
            }
        }
        return pagerQty - 1
    };
    Slick.prototype.getLeft = function (slideIndex) {
        var _ = this, targetLeft, verticalHeight, verticalOffset = 0, targetSlide;
        _.slideOffset = 0;
        verticalHeight = _.$slides.first().outerHeight(true);
        if (_.options.infinite === true) {
            if (_.slideCount > _.options.slidesToShow) {
                _.slideOffset = (_.slideWidth * _.options.slidesToShow) * -1;
                verticalOffset = (verticalHeight * _.options.slidesToShow) * -1
            }
            if (_.slideCount % _.options.slidesToScroll !== 0) {
                if (slideIndex + _.options.slidesToScroll > _.slideCount && _.slideCount > _.options.slidesToShow) {
                    if (slideIndex > _.slideCount) {
                        _.slideOffset = ((_.options.slidesToShow - (slideIndex - _.slideCount)) * _.slideWidth) * -1;
                        verticalOffset = ((_.options.slidesToShow - (slideIndex - _.slideCount)) * verticalHeight) * -1
                    } else {
                        _.slideOffset = ((_.slideCount % _.options.slidesToScroll) * _.slideWidth) * -1;
                        verticalOffset = ((_.slideCount % _.options.slidesToScroll) * verticalHeight) * -1
                    }
                }
            }
        } else {
            if (slideIndex + _.options.slidesToShow > _.slideCount) {
                _.slideOffset = ((slideIndex + _.options.slidesToShow) - _.slideCount) * _.slideWidth;
                verticalOffset = ((slideIndex + _.options.slidesToShow) - _.slideCount) * verticalHeight
            }
        }
        if (_.slideCount <= _.options.slidesToShow) {
            _.slideOffset = 0;
            verticalOffset = 0
        }
        if (_.options.centerMode === true && _.options.infinite === true) {
            _.slideOffset += _.slideWidth * Math.floor(_.options.slidesToShow / 2) - _.slideWidth
        } else {
            if (_.options.centerMode === true) {
                _.slideOffset = 0;
                _.slideOffset += _.slideWidth * Math.floor(_.options.slidesToShow / 2)
            }
        }
        if (_.options.vertical === false) {
            targetLeft = ((slideIndex * _.slideWidth) * -1) + _.slideOffset
        } else {
            targetLeft = ((slideIndex * verticalHeight) * -1) + verticalOffset
        }
        if (_.options.variableWidth === true) {
            if (_.slideCount <= _.options.slidesToShow || _.options.infinite === false) {
                targetSlide = _.$slideTrack.children(".slick-slide").eq(slideIndex)
            } else {
                targetSlide = _.$slideTrack.children(".slick-slide").eq(slideIndex + _.options.slidesToShow)
            }
            if (_.options.rtl === true) {
                if (targetSlide[0]) {
                    targetLeft = (_.$slideTrack.width() - targetSlide[0].offsetLeft - targetSlide.width()) * -1
                } else {
                    targetLeft = 0
                }
            } else {
                targetLeft = targetSlide[0] ? targetSlide[0].offsetLeft * -1 : 0
            }
            if (_.options.centerMode === true) {
                if (_.slideCount <= _.options.slidesToShow || _.options.infinite === false) {
                    targetSlide = _.$slideTrack.children(".slick-slide").eq(slideIndex)
                } else {
                    targetSlide = _.$slideTrack.children(".slick-slide").eq(slideIndex + _.options.slidesToShow + 1)
                }
                if (_.options.rtl === true) {
                    if (targetSlide[0]) {
                        targetLeft = (_.$slideTrack.width() - targetSlide[0].offsetLeft - targetSlide.width()) * -1
                    } else {
                        targetLeft = 0
                    }
                } else {
                    targetLeft = targetSlide[0] ? targetSlide[0].offsetLeft * -1 : 0
                }
                targetLeft += (_.$list.width() - targetSlide.outerWidth()) / 2
            }
        }
        return targetLeft
    };
    Slick.prototype.getOption = Slick.prototype.slickGetOption = function (option) {
        var _ = this;
        return _.options[option]
    };
    Slick.prototype.getNavigableIndexes = function () {
        var _ = this, breakPoint = 0, counter = 0, indexes = [], max;
        if (_.options.infinite === false) {
            max = _.slideCount
        } else {
            breakPoint = _.options.slidesToScroll * -1;
            counter = _.options.slidesToScroll * -1;
            max = _.slideCount * 2
        }
        while (breakPoint < max) {
            indexes.push(breakPoint);
            breakPoint = counter + _.options.slidesToScroll;
            counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow
        }
        return indexes
    };
    Slick.prototype.getSlick = function () {
        return this
    };
    Slick.prototype.getSlideCount = function () {
        var _ = this, slidesTraversed, swipedSlide, centerOffset;
        centerOffset = _.options.centerMode === true ? _.slideWidth * Math.floor(_.options.slidesToShow / 2) : 0;
        if (_.options.swipeToSlide === true) {
            _.$slideTrack.find(".slick-slide").each(function (index, slide) {
                if (slide.offsetLeft - centerOffset + ($(slide).outerWidth() / 2) > (_.swipeLeft * -1)) {
                    swipedSlide = slide;
                    return false
                }
            });
            slidesTraversed = Math.abs($(swipedSlide).attr("data-slick-index") - _.currentSlide) || 1;
            return slidesTraversed
        } else {
            return _.options.slidesToScroll
        }
    };
    Slick.prototype.goTo = Slick.prototype.slickGoTo = function (slide, dontAnimate) {
        var _ = this;
        _.changeSlide({data: {message: "index", index: parseInt(slide)}}, dontAnimate)
    };
    Slick.prototype.init = function (creation) {
        var _ = this;
        if (!$(_.$slider).hasClass("slick-initialized")) {
            $(_.$slider).addClass("slick-initialized");
            _.buildRows();
            _.buildOut();
            _.setProps();
            _.startLoad();
            _.loadSlider();
            _.initializeEvents();
            _.updateArrows();
            _.updateDots();
            _.checkResponsive(true);
            _.focusHandler()
        }
        if (creation) {
            _.$slider.trigger("init", [_])
        }
        if (_.options.accessibility === true) {
            _.initADA()
        }
        if (_.options.autoplay) {
            _.paused = false;
            _.autoPlay()
        }
    };
    Slick.prototype.initADA = function () {
        var _ = this;
        _.$slides.add(_.$slideTrack.find(".slick-cloned")).attr({
            "aria-hidden": "true",
            tabindex: "-1"
        }).find("a, input, button, select").attr({tabindex: "-1"});
        if (_.$dots !== null) {
            _.$slides.not(_.$slideTrack.find(".slick-cloned")).each(function (i) {
                $(this).attr({"aria-labelledby": "slick-slide" + _.instanceUid + i + ""})
            });
            _.$dots.find("li").each(function (i) {
                $(this).attr({id: "slick-slide" + _.instanceUid + i + ""})
            })
        }
        _.activateADA()
    };
    Slick.prototype.initArrowEvents = function () {
        var _ = this;
        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
            _.$prevArrow.off("click.slick").on("click.slick", {message: "previous"}, _.changeSlide);
            _.$nextArrow.off("click.slick").on("click.slick", {message: "next"}, _.changeSlide)
        }
    };
    Slick.prototype.initDotEvents = function () {
        var _ = this;
        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {
            $("li", _.$dots).on("click.slick", {message: "index"}, _.changeSlide)
        }
        if (_.options.dots === true && _.options.pauseOnDotsHover === true) {
            $("li", _.$dots).on("mouseenter.slick", $.proxy(_.interrupt, _, true)).on("mouseleave.slick", $.proxy(_.interrupt, _, false))
        }
    };
    Slick.prototype.initSlideEvents = function () {
        var _ = this;
        if (_.options.pauseOnHover) {
            _.$list.on("mouseenter.slick", $.proxy(_.interrupt, _, true));
            _.$list.on("mouseleave.slick", $.proxy(_.interrupt, _, false))
        }
    };
    Slick.prototype.initializeEvents = function () {
        var _ = this;
        _.initArrowEvents();
        _.initDotEvents();
        _.initSlideEvents();
        _.$list.on("touchstart.slick mousedown.slick", {action: "start"}, _.swipeHandler);
        _.$list.on("touchmove.slick mousemove.slick", {action: "move"}, _.swipeHandler);
        _.$list.on("touchend.slick mouseup.slick", {action: "end"}, _.swipeHandler);
        _.$list.on("touchcancel.slick mouseleave.slick", {action: "end"}, _.swipeHandler);
        _.$list.on("click.slick", _.clickHandler);
        $(document).on(_.visibilityChange, $.proxy(_.visibility, _));
        if (_.options.accessibility === true) {
            _.$list.on("keydown.slick", _.keyHandler)
        }
        if (_.options.focusOnSelect === true) {
            $(_.$slideTrack).children().on("click.slick", _.selectHandler)
        }
        $(window).on("orientationchange.slick.slick-" + _.instanceUid, $.proxy(_.orientationChange, _));
        $(window).on("resize.slick.slick-" + _.instanceUid, $.proxy(_.resize, _));
        $("[draggable!=true]", _.$slideTrack).on("dragstart", _.preventDefault);
        $(window).on("load.slick.slick-" + _.instanceUid, _.setPosition);
        $(document).on("ready.slick.slick-" + _.instanceUid, _.setPosition)
    };
    Slick.prototype.initUI = function () {
        var _ = this;
        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
            _.$prevArrow.show();
            _.$nextArrow.show()
        }
        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {
            _.$dots.show()
        }
    };
    Slick.prototype.keyHandler = function (event) {
        var _ = this;
        if (!event.target.tagName.match("TEXTAREA|INPUT|SELECT")) {
            if (event.keyCode === 37 && _.options.accessibility === true) {
                _.changeSlide({data: {message: _.options.rtl === true ? "next" : "previous"}})
            } else {
                if (event.keyCode === 39 && _.options.accessibility === true) {
                    _.changeSlide({data: {message: _.options.rtl === true ? "previous" : "next"}})
                }
            }
        }
    };
    Slick.prototype.lazyLoad = function () {
        var _ = this, loadRange, cloneRange, rangeStart, rangeEnd;

        function loadImages(imagesScope) {
            $("img[data-lazy]", imagesScope).each(function () {
                var image = $(this), imageSource = $(this).attr("data-lazy"),
                    imageToLoad = document.createElement("img");
                imageToLoad.onload = function () {
                    image.animate({opacity: 0}, 100, function () {
                        image.attr("src", imageSource).animate({opacity: 1}, 200, function () {
                            image.removeAttr("data-lazy").removeClass("slick-loading")
                        });
                        _.$slider.trigger("lazyLoaded", [_, image, imageSource])
                    })
                };
                imageToLoad.onerror = function () {
                    image.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error");
                    _.$slider.trigger("lazyLoadError", [_, image, imageSource])
                };
                imageToLoad.src = imageSource
            })
        }

        if (_.options.centerMode === true) {
            if (_.options.infinite === true) {
                rangeStart = _.currentSlide + (_.options.slidesToShow / 2 + 1);
                rangeEnd = rangeStart + _.options.slidesToShow + 2
            } else {
                rangeStart = Math.max(0, _.currentSlide - (_.options.slidesToShow / 2 + 1));
                rangeEnd = 2 + (_.options.slidesToShow / 2 + 1) + _.currentSlide
            }
        } else {
            rangeStart = _.options.infinite ? _.options.slidesToShow + _.currentSlide : _.currentSlide;
            rangeEnd = Math.ceil(rangeStart + _.options.slidesToShow);
            if (_.options.fade === true) {
                if (rangeStart > 0) {
                    rangeStart--
                }
                if (rangeEnd <= _.slideCount) {
                    rangeEnd++
                }
            }
        }
        loadRange = _.$slider.find(".slick-slide").slice(rangeStart, rangeEnd);
        loadImages(loadRange);
        if (_.slideCount <= _.options.slidesToShow) {
            cloneRange = _.$slider.find(".slick-slide");
            loadImages(cloneRange)
        } else {
            if (_.currentSlide >= _.slideCount - _.options.slidesToShow) {
                cloneRange = _.$slider.find(".slick-cloned").slice(0, _.options.slidesToShow);
                loadImages(cloneRange)
            } else {
                if (_.currentSlide === 0) {
                    cloneRange = _.$slider.find(".slick-cloned").slice(_.options.slidesToShow * -1);
                    loadImages(cloneRange)
                }
            }
        }
    };
    Slick.prototype.loadSlider = function () {
        var _ = this;
        _.setPosition();
        _.$slideTrack.css({opacity: 1});
        _.$slider.removeClass("slick-loading");
        _.initUI();
        if (_.options.lazyLoad === "progressive") {
            _.progressiveLazyLoad()
        }
    };
    Slick.prototype.next = Slick.prototype.slickNext = function () {
        var _ = this;
        _.changeSlide({data: {message: "next"}})
    };
    Slick.prototype.orientationChange = function () {
        var _ = this;
        _.checkResponsive();
        _.setPosition()
    };
    Slick.prototype.pause = Slick.prototype.slickPause = function () {
        var _ = this;
        _.autoPlayClear();
        _.paused = true
    };
    Slick.prototype.play = Slick.prototype.slickPlay = function () {
        var _ = this;
        _.autoPlay();
        _.options.autoplay = true;
        _.paused = false;
        _.focussed = false;
        _.interrupted = false
    };
    Slick.prototype.postSlide = function (index) {
        var _ = this;
        if (!_.unslicked) {
            _.$slider.trigger("afterChange", [_, index]);
            _.animating = false;
            _.setPosition();
            _.swipeLeft = null;
            if (_.options.autoplay) {
                _.autoPlay()
            }
            if (_.options.accessibility === true) {
                _.initADA()
            }
        }
    };
    Slick.prototype.prev = Slick.prototype.slickPrev = function () {
        var _ = this;
        _.changeSlide({data: {message: "previous"}})
    };
    Slick.prototype.preventDefault = function (event) {
        event.preventDefault()
    };
    Slick.prototype.progressiveLazyLoad = function (tryCount) {
        tryCount = tryCount || 1;
        var _ = this, $imgsToLoad = $("img[data-lazy]", _.$slider), image, imageSource, imageToLoad;
        if ($imgsToLoad.length) {
            image = $imgsToLoad.first();
            imageSource = image.attr("data-lazy");
            imageToLoad = document.createElement("img");
            imageToLoad.onload = function () {
                image.attr("src", imageSource).removeAttr("data-lazy").removeClass("slick-loading");
                if (_.options.adaptiveHeight === true) {
                    _.setPosition()
                }
                _.$slider.trigger("lazyLoaded", [_, image, imageSource]);
                _.progressiveLazyLoad()
            };
            imageToLoad.onerror = function () {
                if (tryCount < 3) {
                    setTimeout(function () {
                        _.progressiveLazyLoad(tryCount + 1)
                    }, 500)
                } else {
                    image.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error");
                    _.$slider.trigger("lazyLoadError", [_, image, imageSource]);
                    _.progressiveLazyLoad()
                }
            };
            imageToLoad.src = imageSource
        } else {
            _.$slider.trigger("allImagesLoaded", [_])
        }
    };
    Slick.prototype.refresh = function (initializing) {
        var _ = this, currentSlide, lastVisibleIndex;
        lastVisibleIndex = _.slideCount - _.options.slidesToShow;
        if (!_.options.infinite && (_.currentSlide > lastVisibleIndex)) {
            _.currentSlide = lastVisibleIndex
        }
        if (_.slideCount <= _.options.slidesToShow) {
            _.currentSlide = 0
        }
        currentSlide = _.currentSlide;
        _.destroy(true);
        $.extend(_, _.initials, {currentSlide: currentSlide});
        _.init();
        if (!initializing) {
            _.changeSlide({data: {message: "index", index: currentSlide}}, false)
        }
    };
    Slick.prototype.registerBreakpoints = function () {
        var _ = this, breakpoint, currentBreakpoint, l, responsiveSettings = _.options.responsive || null;
        if ($.type(responsiveSettings) === "array" && responsiveSettings.length) {
            _.respondTo = _.options.respondTo || "window";
            for (breakpoint in responsiveSettings) {
                l = _.breakpoints.length - 1;
                currentBreakpoint = responsiveSettings[breakpoint].breakpoint;
                if (responsiveSettings.hasOwnProperty(breakpoint)) {
                    while (l >= 0) {
                        if (_.breakpoints[l] && _.breakpoints[l] === currentBreakpoint) {
                            _.breakpoints.splice(l, 1)
                        }
                        l--
                    }
                    _.breakpoints.push(currentBreakpoint);
                    _.breakpointSettings[currentBreakpoint] = responsiveSettings[breakpoint].settings
                }
            }
            _.breakpoints.sort(function (a, b) {
                return (_.options.mobileFirst) ? a - b : b - a
            })
        }
    };
    Slick.prototype.reinit = function () {
        var _ = this;
        _.$slides = _.$slideTrack.children(_.options.slide).addClass("slick-slide");
        _.slideCount = _.$slides.length;
        if (_.currentSlide >= _.slideCount && _.currentSlide !== 0) {
            _.currentSlide = _.currentSlide - _.options.slidesToScroll
        }
        if (_.slideCount <= _.options.slidesToShow) {
            _.currentSlide = 0
        }
        _.registerBreakpoints();
        _.setProps();
        _.setupInfinite();
        _.buildArrows();
        _.updateArrows();
        _.initArrowEvents();
        _.buildDots();
        _.updateDots();
        _.initDotEvents();
        _.cleanUpSlideEvents();
        _.initSlideEvents();
        _.checkResponsive(false, true);
        if (_.options.focusOnSelect === true) {
            $(_.$slideTrack).children().on("click.slick", _.selectHandler)
        }
        _.setSlideClasses(typeof _.currentSlide === "number" ? _.currentSlide : 0);
        _.setPosition();
        _.focusHandler();
        _.paused = !_.options.autoplay;
        _.autoPlay();
        _.$slider.trigger("reInit", [_])
    };
    Slick.prototype.resize = function () {
        var _ = this;
        if ($(window).width() !== _.windowWidth) {
            clearTimeout(_.windowDelay);
            _.windowDelay = window.setTimeout(function () {
                _.windowWidth = $(window).width();
                _.checkResponsive();
                if (!_.unslicked) {
                    _.setPosition()
                }
            }, 50)
        }
    };
    Slick.prototype.removeSlide = Slick.prototype.slickRemove = function (index, removeBefore, removeAll) {
        var _ = this;
        if (typeof (index) === "boolean") {
            removeBefore = index;
            index = removeBefore === true ? 0 : _.slideCount - 1
        } else {
            index = removeBefore === true ? --index : index
        }
        if (_.slideCount < 1 || index < 0 || index > _.slideCount - 1) {
            return false
        }
        _.unload();
        if (removeAll === true) {
            _.$slideTrack.children().remove()
        } else {
            _.$slideTrack.children(this.options.slide).eq(index).remove()
        }
        _.$slides = _.$slideTrack.children(this.options.slide);
        _.$slideTrack.children(this.options.slide).detach();
        _.$slideTrack.append(_.$slides);
        _.$slidesCache = _.$slides;
        _.reinit()
    };
    Slick.prototype.setCSS = function (position) {
        var _ = this, positionProps = {}, x, y;
        if (_.options.rtl === true) {
            position = -position
        }
        x = _.positionProp == "left" ? Math.ceil(position) + "px" : "0px";
        y = _.positionProp == "top" ? Math.ceil(position) + "px" : "0px";
        positionProps[_.positionProp] = position;
        if (_.transformsEnabled === false) {
            _.$slideTrack.css(positionProps)
        } else {
            positionProps = {};
            if (_.cssTransitions === false) {
                positionProps[_.animType] = "translate(" + x + ", " + y + ")";
                _.$slideTrack.css(positionProps)
            } else {
                positionProps[_.animType] = "translate3d(" + x + ", " + y + ", 0px)";
                _.$slideTrack.css(positionProps)
            }
        }
    };
    Slick.prototype.setDimensions = function () {
        var _ = this;
        if (_.options.vertical === false) {
            if (_.options.centerMode === true) {
                _.$list.css({padding: ("0px " + _.options.centerPadding)})
            }
        } else {
            _.$list.height(_.$slides.first().outerHeight(true) * _.options.slidesToShow);
            if (_.options.centerMode === true) {
                _.$list.css({padding: (_.options.centerPadding + " 0px")})
            }
        }
        _.listWidth = _.$list.width();
        _.listHeight = _.$list.height();
        if (_.options.vertical === false && _.options.variableWidth === false) {
            _.slideWidth = Math.ceil(_.listWidth / _.options.slidesToShow);
            _.$slideTrack.width(Math.ceil((_.slideWidth * _.$slideTrack.children(".slick-slide").length)))
        } else {
            if (_.options.variableWidth === true) {
                _.$slideTrack.width(5000 * _.slideCount)
            } else {
                _.slideWidth = Math.ceil(_.listWidth);
                _.$slideTrack.height(Math.ceil((_.$slides.first().outerHeight(true) * _.$slideTrack.children(".slick-slide").length)))
            }
        }
        var offset = _.$slides.first().outerWidth(true) - _.$slides.first().width();
        if (_.options.variableWidth === false) {
            _.$slideTrack.children(".slick-slide").width(_.slideWidth - offset)
        }
    };
    Slick.prototype.setFade = function () {
        var _ = this, targetLeft;
        _.$slides.each(function (index, element) {
            targetLeft = (_.slideWidth * index) * -1;
            if (_.options.rtl === true) {
                $(element).css({
                    position: "relative",
                    right: targetLeft,
                    top: 0,
                    zIndex: _.options.zIndex - 2,
                    opacity: 0
                })
            } else {
                $(element).css({
                    position: "relative",
                    left: targetLeft,
                    top: 0,
                    zIndex: _.options.zIndex - 2,
                    opacity: 0
                })
            }
        });
        _.$slides.eq(_.currentSlide).css({zIndex: _.options.zIndex - 1, opacity: 1})
    };
    Slick.prototype.setHeight = function () {
        var _ = this;
        if (_.options.slidesToShow === 1 && _.options.adaptiveHeight === true && _.options.vertical === false) {
            var targetHeight = _.$slides.eq(_.currentSlide).outerHeight(true);
            _.$list.css("height", targetHeight)
        }
    };
    Slick.prototype.setOption = Slick.prototype.slickSetOption = function () {
        var _ = this, l, item, option, value, refresh = false, type;
        if ($.type(arguments[0]) === "object") {
            option = arguments[0];
            refresh = arguments[1];
            type = "multiple"
        } else {
            if ($.type(arguments[0]) === "string") {
                option = arguments[0];
                value = arguments[1];
                refresh = arguments[2];
                if (arguments[0] === "responsive" && $.type(arguments[1]) === "array") {
                    type = "responsive"
                } else {
                    if (typeof arguments[1] !== "undefined") {
                        type = "single"
                    }
                }
            }
        }
        if (type === "single") {
            _.options[option] = value
        } else {
            if (type === "multiple") {
                $.each(option, function (opt, val) {
                    _.options[opt] = val
                })
            } else {
                if (type === "responsive") {
                    for (item in value) {
                        if ($.type(_.options.responsive) !== "array") {
                            _.options.responsive = [value[item]]
                        } else {
                            l = _.options.responsive.length - 1;
                            while (l >= 0) {
                                if (_.options.responsive[l].breakpoint === value[item].breakpoint) {
                                    _.options.responsive.splice(l, 1)
                                }
                                l--
                            }
                            _.options.responsive.push(value[item])
                        }
                    }
                }
            }
        }
        if (refresh) {
            _.unload();
            _.reinit()
        }
    };
    Slick.prototype.setPosition = function () {
        var _ = this;
        _.setDimensions();
        _.setHeight();
        if (_.options.fade === false) {
            _.setCSS(_.getLeft(_.currentSlide))
        } else {
            _.setFade()
        }
        _.$slider.trigger("setPosition", [_])
    };
    Slick.prototype.setProps = function () {
        var _ = this, bodyStyle = document.body.style;
        _.positionProp = _.options.vertical === true ? "top" : "left";
        if (_.positionProp === "top") {
            _.$slider.addClass("slick-vertical")
        } else {
            _.$slider.removeClass("slick-vertical")
        }
        if (bodyStyle.WebkitTransition !== undefined || bodyStyle.MozTransition !== undefined || bodyStyle.msTransition !== undefined) {
            if (_.options.useCSS === true) {
                _.cssTransitions = true
            }
        }
        if (_.options.fade) {
            if (typeof _.options.zIndex === "number") {
                if (_.options.zIndex < 3) {
                    _.options.zIndex = 3
                }
            } else {
                _.options.zIndex = _.defaults.zIndex
            }
        }
        if (bodyStyle.OTransform !== undefined) {
            _.animType = "OTransform";
            _.transformType = "-o-transform";
            _.transitionType = "OTransition";
            if (bodyStyle.perspectiveProperty === undefined && bodyStyle.webkitPerspective === undefined) {
                _.animType = false
            }
        }
        if (bodyStyle.MozTransform !== undefined) {
            _.animType = "MozTransform";
            _.transformType = "-moz-transform";
            _.transitionType = "MozTransition";
            if (bodyStyle.perspectiveProperty === undefined && bodyStyle.MozPerspective === undefined) {
                _.animType = false
            }
        }
        if (bodyStyle.webkitTransform !== undefined) {
            _.animType = "webkitTransform";
            _.transformType = "-webkit-transform";
            _.transitionType = "webkitTransition";
            if (bodyStyle.perspectiveProperty === undefined && bodyStyle.webkitPerspective === undefined) {
                _.animType = false
            }
        }
        if (bodyStyle.msTransform !== undefined) {
            _.animType = "msTransform";
            _.transformType = "-ms-transform";
            _.transitionType = "msTransition";
            if (bodyStyle.msTransform === undefined) {
                _.animType = false
            }
        }
        if (bodyStyle.transform !== undefined && _.animType !== false) {
            _.animType = "transform";
            _.transformType = "transform";
            _.transitionType = "transition"
        }
        _.transformsEnabled = _.options.useTransform && (_.animType !== null && _.animType !== false)
    };
    Slick.prototype.setSlideClasses = function (index) {
        var _ = this, centerOffset, allSlides, indexOffset, remainder;
        allSlides = _.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true");
        _.$slides.eq(index).addClass("slick-current");
        if (_.options.centerMode === true) {
            centerOffset = Math.floor(_.options.slidesToShow / 2);
            if (_.options.infinite === true) {
                if (index >= centerOffset && index <= (_.slideCount - 1) - centerOffset) {
                    _.$slides.slice(index - centerOffset, index + centerOffset + 1).addClass("slick-active").attr("aria-hidden", "false")
                } else {
                    indexOffset = _.options.slidesToShow + index;
                    allSlides.slice(indexOffset - centerOffset + 1, indexOffset + centerOffset + 2).addClass("slick-active").attr("aria-hidden", "false")
                }
                if (index === 0) {
                    allSlides.eq(allSlides.length - 1 - _.options.slidesToShow).addClass("slick-center")
                } else {
                    if (index === _.slideCount - 1) {
                        allSlides.eq(_.options.slidesToShow).addClass("slick-center")
                    }
                }
            }
            _.$slides.eq(index).addClass("slick-center")
        } else {
            if (index >= 0 && index <= (_.slideCount - _.options.slidesToShow)) {
                _.$slides.slice(index, index + _.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false")
            } else {
                if (allSlides.length <= _.options.slidesToShow) {
                    allSlides.addClass("slick-active").attr("aria-hidden", "false")
                } else {
                    remainder = _.slideCount % _.options.slidesToShow;
                    indexOffset = _.options.infinite === true ? _.options.slidesToShow + index : index;
                    if (_.options.slidesToShow == _.options.slidesToScroll && (_.slideCount - index) < _.options.slidesToShow) {
                        allSlides.slice(indexOffset - (_.options.slidesToShow - remainder), indexOffset + remainder).addClass("slick-active").attr("aria-hidden", "false")
                    } else {
                        allSlides.slice(indexOffset, indexOffset + _.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false")
                    }
                }
            }
        }
        if (_.options.lazyLoad === "ondemand") {
            _.lazyLoad()
        }
    };
    Slick.prototype.setupInfinite = function () {
        var _ = this, i, slideIndex, infiniteCount;
        if (_.options.fade === true) {
            _.options.centerMode = false
        }
        if (_.options.infinite === true && _.options.fade === false) {
            slideIndex = null;
            if (_.slideCount > _.options.slidesToShow) {
                if (_.options.centerMode === true) {
                    infiniteCount = _.options.slidesToShow + 1
                } else {
                    infiniteCount = _.options.slidesToShow
                }
                for (i = _.slideCount; i > (_.slideCount - infiniteCount); i -= 1) {
                    slideIndex = i - 1;
                    $(_.$slides[slideIndex]).clone(true).attr("id", "").attr("data-slick-index", slideIndex - _.slideCount).prependTo(_.$slideTrack).addClass("slick-cloned")
                }
                for (i = 0; i < infiniteCount; i += 1) {
                    slideIndex = i;
                    $(_.$slides[slideIndex]).clone(true).attr("id", "").attr("data-slick-index", slideIndex + _.slideCount).appendTo(_.$slideTrack).addClass("slick-cloned")
                }
                _.$slideTrack.find(".slick-cloned").find("[id]").each(function () {
                    $(this).attr("id", "")
                })
            }
        }
    };
    Slick.prototype.interrupt = function (toggle) {
        var _ = this;
        if (!toggle) {
            _.autoPlay()
        }
        _.interrupted = toggle
    };
    Slick.prototype.selectHandler = function (event) {
        var _ = this;
        var targetElement = $(event.target).is(".slick-slide") ? $(event.target) : $(event.target).parents(".slick-slide");
        var index = parseInt(targetElement.attr("data-slick-index"));
        if (!index) {
            index = 0
        }
        if (_.slideCount <= _.options.slidesToShow) {
            _.setSlideClasses(index);
            _.asNavFor(index);
            return
        }
        _.slideHandler(index)
    };
    Slick.prototype.slideHandler = function (index, sync, dontAnimate) {
        var targetSlide, animSlide, oldSlide, slideLeft, targetLeft = null, _ = this, navTarget;
        sync = sync || false;
        if (_.animating === true && _.options.waitForAnimate === true) {
            return
        }
        if (_.options.fade === true && _.currentSlide === index) {
            return
        }
        if (_.slideCount <= _.options.slidesToShow) {
            return
        }
        if (sync === false) {
            _.asNavFor(index)
        }
        targetSlide = index;
        targetLeft = _.getLeft(targetSlide);
        slideLeft = _.getLeft(_.currentSlide);
        _.currentLeft = _.swipeLeft === null ? slideLeft : _.swipeLeft;
        if (_.options.infinite === false && _.options.centerMode === false && (index < 0 || index > _.getDotCount() * _.options.slidesToScroll)) {
            if (_.options.fade === false) {
                targetSlide = _.currentSlide;
                if (dontAnimate !== true) {
                    _.animateSlide(slideLeft, function () {
                        _.postSlide(targetSlide)
                    })
                } else {
                    _.postSlide(targetSlide)
                }
            }
            return
        } else {
            if (_.options.infinite === false && _.options.centerMode === true && (index < 0 || index > (_.slideCount - _.options.slidesToScroll))) {
                if (_.options.fade === false) {
                    targetSlide = _.currentSlide;
                    if (dontAnimate !== true) {
                        _.animateSlide(slideLeft, function () {
                            _.postSlide(targetSlide)
                        })
                    } else {
                        _.postSlide(targetSlide)
                    }
                }
                return
            }
        }
        if (_.options.autoplay) {
            clearInterval(_.autoPlayTimer)
        }
        if (targetSlide < 0) {
            if (_.slideCount % _.options.slidesToScroll !== 0) {
                animSlide = _.slideCount - (_.slideCount % _.options.slidesToScroll)
            } else {
                animSlide = _.slideCount + targetSlide
            }
        } else {
            if (targetSlide >= _.slideCount) {
                if (_.slideCount % _.options.slidesToScroll !== 0) {
                    animSlide = 0
                } else {
                    animSlide = targetSlide - _.slideCount
                }
            } else {
                animSlide = targetSlide
            }
        }
        _.animating = true;
        _.$slider.trigger("beforeChange", [_, _.currentSlide, animSlide]);
        oldSlide = _.currentSlide;
        _.currentSlide = animSlide;
        _.setSlideClasses(_.currentSlide);
        if (_.options.asNavFor) {
            navTarget = _.getNavTarget();
            navTarget = navTarget.slick("getSlick");
            if (navTarget.slideCount <= navTarget.options.slidesToShow) {
                navTarget.setSlideClasses(_.currentSlide)
            }
        }
        _.updateDots();
        _.updateArrows();
        if (_.options.fade === true) {
            if (dontAnimate !== true) {
                _.fadeSlideOut(oldSlide);
                _.fadeSlide(animSlide, function () {
                    _.postSlide(animSlide)
                })
            } else {
                _.postSlide(animSlide)
            }
            _.animateHeight();
            return
        }
        if (dontAnimate !== true) {
            _.animateSlide(targetLeft, function () {
                _.postSlide(animSlide)
            })
        } else {
            _.postSlide(animSlide)
        }
    };
    Slick.prototype.startLoad = function () {
        var _ = this;
        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
            _.$prevArrow.hide();
            _.$nextArrow.hide()
        }
        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {
            _.$dots.hide()
        }
        _.$slider.addClass("slick-loading")
    };
    Slick.prototype.swipeDirection = function () {
        var xDist, yDist, r, swipeAngle, _ = this;
        xDist = _.touchObject.startX - _.touchObject.curX;
        yDist = _.touchObject.startY - _.touchObject.curY;
        r = Math.atan2(yDist, xDist);
        swipeAngle = Math.round(r * 180 / Math.PI);
        if (swipeAngle < 0) {
            swipeAngle = 360 - Math.abs(swipeAngle)
        }
        if ((swipeAngle <= 45) && (swipeAngle >= 0)) {
            return (_.options.rtl === false ? "left" : "right")
        }
        if ((swipeAngle <= 360) && (swipeAngle >= 315)) {
            return (_.options.rtl === false ? "left" : "right")
        }
        if ((swipeAngle >= 135) && (swipeAngle <= 225)) {
            return (_.options.rtl === false ? "right" : "left")
        }
        if (_.options.verticalSwiping === true) {
            if ((swipeAngle >= 35) && (swipeAngle <= 135)) {
                return "down"
            } else {
                return "up"
            }
        }
        return "vertical"
    };
    Slick.prototype.swipeEnd = function (event) {
        var _ = this, slideCount, direction;
        _.dragging = false;
        _.interrupted = false;
        _.shouldClick = (_.touchObject.swipeLength > 10) ? false : true;
        if (_.touchObject.curX === undefined) {
            return false
        }
        if (_.touchObject.edgeHit === true) {
            _.$slider.trigger("edge", [_, _.swipeDirection()])
        }
        if (_.touchObject.swipeLength >= _.touchObject.minSwipe) {
            direction = _.swipeDirection();
            switch (direction) {
                case"left":
                case"down":
                    slideCount = _.options.swipeToSlide ? _.checkNavigable(_.currentSlide + _.getSlideCount()) : _.currentSlide + _.getSlideCount();
                    _.currentDirection = 0;
                    break;
                case"right":
                case"up":
                    slideCount = _.options.swipeToSlide ? _.checkNavigable(_.currentSlide - _.getSlideCount()) : _.currentSlide - _.getSlideCount();
                    _.currentDirection = 1;
                    break;
                default:
            }
            if (direction != "vertical") {
                _.slideHandler(slideCount);
                _.touchObject = {};
                _.$slider.trigger("swipe", [_, direction])
            }
        } else {
            if (_.touchObject.startX !== _.touchObject.curX) {
                _.slideHandler(_.currentSlide);
                _.touchObject = {}
            }
        }
    };
    Slick.prototype.swipeHandler = function (event) {
        var _ = this;
        if ((_.options.swipe === false) || ("ontouchend" in document && _.options.swipe === false)) {
            return
        } else {
            if (_.options.draggable === false && event.type.indexOf("mouse") !== -1) {
                return
            }
        }
        _.touchObject.fingerCount = event.originalEvent && event.originalEvent.touches !== undefined ? event.originalEvent.touches.length : 1;
        _.touchObject.minSwipe = _.listWidth / _.options.touchThreshold;
        if (_.options.verticalSwiping === true) {
            _.touchObject.minSwipe = _.listHeight / _.options.touchThreshold
        }
        switch (event.data.action) {
            case"start":
                _.swipeStart(event);
                break;
            case"move":
                _.swipeMove(event);
                break;
            case"end":
                _.swipeEnd(event);
                break
        }
    };
    Slick.prototype.swipeMove = function (event) {
        var _ = this, edgeWasHit = false, curLeft, swipeDirection, swipeLength, positionOffset, touches;
        touches = event.originalEvent !== undefined ? event.originalEvent.touches : null;
        if (!_.dragging || touches && touches.length !== 1) {
            return false
        }
        curLeft = _.getLeft(_.currentSlide);
        _.touchObject.curX = touches !== undefined ? touches[0].pageX : event.clientX;
        _.touchObject.curY = touches !== undefined ? touches[0].pageY : event.clientY;
        _.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(_.touchObject.curX - _.touchObject.startX, 2)));
        if (_.options.verticalSwiping === true) {
            _.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(_.touchObject.curY - _.touchObject.startY, 2)))
        }
        swipeDirection = _.swipeDirection();
        if (swipeDirection === "vertical") {
            return
        }
        if (event.originalEvent !== undefined && _.touchObject.swipeLength > 4) {
            event.preventDefault()
        }
        positionOffset = (_.options.rtl === false ? 1 : -1) * (_.touchObject.curX > _.touchObject.startX ? 1 : -1);
        if (_.options.verticalSwiping === true) {
            positionOffset = _.touchObject.curY > _.touchObject.startY ? 1 : -1
        }
        swipeLength = _.touchObject.swipeLength;
        _.touchObject.edgeHit = false;
        if (_.options.infinite === false) {
            if ((_.currentSlide === 0 && swipeDirection === "right") || (_.currentSlide >= _.getDotCount() && swipeDirection === "left")) {
                swipeLength = _.touchObject.swipeLength * _.options.edgeFriction;
                _.touchObject.edgeHit = true
            }
        }
        if (_.options.vertical === false) {
            _.swipeLeft = curLeft + swipeLength * positionOffset
        } else {
            _.swipeLeft = curLeft + (swipeLength * (_.$list.height() / _.listWidth)) * positionOffset
        }
        if (_.options.verticalSwiping === true) {
            _.swipeLeft = curLeft + swipeLength * positionOffset
        }
        if (_.options.fade === true || _.options.touchMove === false) {
            return false
        }
        if (_.animating === true) {
            _.swipeLeft = null;
            return false
        }
        _.setCSS(_.swipeLeft)
    };
    Slick.prototype.swipeStart = function (event) {
        var _ = this, touches;
        _.interrupted = true;
        if (_.touchObject.fingerCount !== 1 || _.slideCount <= _.options.slidesToShow) {
            _.touchObject = {};
            return false
        }
        if (event.originalEvent !== undefined && event.originalEvent.touches !== undefined) {
            touches = event.originalEvent.touches[0]
        }
        _.touchObject.startX = _.touchObject.curX = touches !== undefined ? touches.pageX : event.clientX;
        _.touchObject.startY = _.touchObject.curY = touches !== undefined ? touches.pageY : event.clientY;
        _.dragging = true
    };
    Slick.prototype.unfilterSlides = Slick.prototype.slickUnfilter = function () {
        var _ = this;
        if (_.$slidesCache !== null) {
            _.unload();
            _.$slideTrack.children(this.options.slide).detach();
            _.$slidesCache.appendTo(_.$slideTrack);
            _.reinit()
        }
    };
    Slick.prototype.unload = function () {
        var _ = this;
        $(".slick-cloned", _.$slider).remove();
        if (_.$dots) {
            _.$dots.remove()
        }
        if (_.$prevArrow && _.htmlExpr.test(_.options.prevArrow)) {
            _.$prevArrow.remove()
        }
        if (_.$nextArrow && _.htmlExpr.test(_.options.nextArrow)) {
            _.$nextArrow.remove()
        }
        _.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "")
    };
    Slick.prototype.unslick = function (fromBreakpoint) {
        var _ = this;
        _.$slider.trigger("unslick", [_, fromBreakpoint]);
        _.destroy()
    };
    Slick.prototype.updateArrows = function () {
        var _ = this, centerOffset;
        centerOffset = Math.floor(_.options.slidesToShow / 2);
        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow && !_.options.infinite) {
            _.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false");
            _.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false");
            if (_.currentSlide === 0) {
                _.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true");
                _.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")
            } else {
                if (_.currentSlide >= _.slideCount - _.options.slidesToShow && _.options.centerMode === false) {
                    _.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true");
                    _.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")
                } else {
                    if (_.currentSlide >= _.slideCount - 1 && _.options.centerMode === true) {
                        _.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true");
                        _.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")
                    }
                }
            }
        }
    };
    Slick.prototype.updateDots = function () {
        var _ = this;
        if (_.$dots !== null) {
            _.$dots.find("li").removeClass("slick-active");
            _.$dots.find("li").find("button").attr("aria-current", "false");
            _.$dots.find("li").eq(Math.floor(_.currentSlide / _.options.slidesToScroll)).addClass("slick-active");
            _.$dots.find("li.slick-active").find("button").attr("aria-current", "true")
        }
    };
    Slick.prototype.visibility = function () {
        var _ = this;
        if (_.options.autoplay) {
            if (document[_.hidden]) {
                _.interrupted = true
            } else {
                _.interrupted = false
            }
        }
    };
    $.fn.slick = function () {
        var _ = this, opt = arguments[0], args = Array.prototype.slice.call(arguments, 1), l = _.length, i, ret;
        for (i = 0; i < l; i++) {
            if (typeof opt == "object" || typeof opt == "undefined") {
                _[i].slick = new Slick(_[i], opt)
            } else {
                ret = _[i].slick[opt].apply(_[i].slick, args)
            }
            if (typeof ret != "undefined") {
                return ret
            }
        }
        return _
    }
}));

function EmbedCalendar(options) {
    (function ($) {
        $(function () {
            options = jQuery.extend({
                SiteId: -1,
                PageWidgetId: -1,
                Display: "grid",
                Date: "",
                CategoryId: -1,
                EventLimit: null,
                HidePhoto: false,
                HideCategory: true,
                HidePerformer: true,
                HideLocationName: true,
                HideLocationAddress: true,
                HideDescription: false,
                HideBookingLink: true,
                MonthCount: -1,
                DestinationSelector: "#pageWidgetXXXXEmbedGrid",
                EmbedCallback: null
            }, options);
            var uri = parseUri(window.location);
            var url = options.AppURL + "?siteid=" + options.SiteId + "&pagewidgetid=" + options.PageWidgetId + "&display=" + options.Display + (options.Date != "" ? "&date=" + options.Date : "") + "&category=" + options.CategoryId + (typeof (uri.queryKey.siteguid) != "undefined" ? "&siteguid=" + uri.queryKey.siteguid : "") + (typeof (uri.queryKey.action) != "undefined" ? "&action=" + uri.queryKey.action : "") + (typeof (uri.queryKey.pageid) != "undefined" ? "&pageid=" + uri.queryKey.pageid : "") + "&embed=1" + (options.EventLimit != null ? "&embedeventlimit=" + options.EventLimit : "") + (options.HidePhoto == true ? "&embedhidephoto=1" : "") + (options.HideDescription == true ? "&embedhidedescription=1" : "") + (options.HideCategory == false ? "&embedhidecategory=0" : "") + (options.HidePerformer == false ? "&embedhideperformer=0" : "") + (options.HideLocationName == false ? "&embedhidelocationname=0" : "") + (options.HideLocationAddress == false ? "&embedhidelocationaddress=0" : "") + (options.HideBookingLink == false ? "&embedHideBookingLink=0" : "") + (options.MonthCount != -1 ? "&embedmonthcount=" + options.MonthCount : "");
            var sCacheURL = "";
            if (typeof (WWPSiteProperties) == "undefined" || WWPSiteProperties.hasOwnProperty("hasCDN") == false || (WWPSiteProperties.hasOwnProperty("hasCDN") == true && WWPSiteProperties.hasCDN == false) || WWPSiteProperties.hasOwnProperty("inCMS") == false || WWPSiteProperties.inCMS == true) {
                sCacheURL = "https://app.hospitalitysem.com/cms/cdn-cache.aspx"
            } else {
                var sWWW = "";
                if (WWPSiteProperties.domain.indexOf(".") == WWPSiteProperties.domain.lastIndexOf(".")) {
                    sWWW = "www."
                }
                sCacheURL = "https://" + sWWW + WWPSiteProperties.domain + "/cdn-cache.aspx"
            }
            if (typeof (WWPSiteProperties) == "undefined" || WWPSiteProperties.CMSDomainName.indexOf("dev.com") > -1 || WWPSiteProperties.CMSDomainName.indexOf("release.com") > -1) {
                sCacheURL = "/vsites/cdn-cache.aspx"
            }
            var sCallback = "EmbedCalendar" + options.DestinationSelector.replace(/[^0-9a-zA-Z]/g, "");
            var sAppendParameterCharacter = "&";
            if (url.indexOf("?") == -1) {
                sAppendParameterCharacter = "?"
            }
            url += sAppendParameterCharacter + "callback=" + sCallback;
            $.ajax({
                url: sCacheURL + "?url=" + encodeURIComponent(url),
                dataType: "jsonp",
                cache: true,
                jsonp: false,
                jsonpCallback: sCallback,
                success: function (data) {
                    $(options.DestinationSelector).append(data.HTML);
                    if (options.EmbedCallback != null) {
                        options.EmbedCallback(options)
                    }
                }
            })
        })
    })(jQuery)
}

/* Swipebox v1.4.1 | Constantin Saguin csag.co | MIT License | github.com/brutaldesign/swipebox */
(function (window, document, $, undefined) {
    $.swipebox = function (elem, options) {
        var ui, defaults = {
                useCSS: true,
                useSVG: true,
                initialIndexOnArray: 0,
                removeBarsOnMobile: true,
                hideCloseButtonOnMobile: false,
                hideBarsDelay: 3000,
                videoMaxWidth: 1140,
                vimeoColor: "cccccc",
                beforeOpen: null,
                afterOpen: null,
                afterClose: null,
                afterMedia: null,
                nextSlide: null,
                prevSlide: null,
                loopAtEnd: false,
                autoplayVideos: false,
                queryStringData: {},
                toggleClassOnLoad: ""
            }, plugin = this, elements = [], $elem, selector = elem.selector, $selector = $(selector),
            isMobile = navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(Android)|(PlayBook)|(BB10)|(BlackBerry)|(Opera Mini)|(IEMobile)|(webOS)|(MeeGo)/i),
            isTouch = isMobile !== null || document.createTouch !== undefined || ("ontouchstart" in window) || ("onmsgesturechange" in window) || navigator.msMaxTouchPoints,
            supportSVG = !!document.createElementNS && !!document.createElementNS("http://www.w3.org/2000/svg", "svg").createSVGRect,
            winWidth = window.innerWidth ? window.innerWidth : $(window).width(),
            winHeight = window.innerHeight ? window.innerHeight : $(window).height(), currentX = 0,
            html = '<div id="swipebox-overlay" tabindex="-1" aria-hidden="false">                         <div id="swipebox-container">                              <div id="swipebox-slider"></div>                              <div id="swipebox-top-bar">                                   <div id="swipebox-title" aria-live="polite"></div>                              </div>                              <div id="swipebox-bottom-bar">                                   <div id="swipebox-arrows">                                        <button id="swipebox-prev" tabindex="1"><span class="sr-only">Previous Item</span></button>                                        <button id="swipebox-next" tabindex="1"><span class="sr-only">Next Item</span></button>                                   </div>                              </div>                              <div id="swipebox-share">                                   <button id="swipebox-shareControl" tabindex="1"><span class="sr-only">Share Menu</span></button>                                   <div id="swipebox-shareMenu">                                   </div>                              </div>                              <button id="swipebox-close" tabindex="1"><span class="sr-only">Close</span></button>                         </div>               </div>';
        plugin.settings = {};
        $.swipebox.close = function () {
            ui.closeSlide()
        };
        $.swipebox.extend = function () {
            return ui
        };
        plugin.init = function () {
            plugin.settings = $.extend({}, defaults, options);
            if ($.isArray(elem)) {
                elements = elem;
                ui.target = $(window);
                ui.init(plugin.settings.initialIndexOnArray)
            } else {
                $(document).on("click", selector, function (event) {
                    if (event.target.parentNode.className === "slide current") {
                        return false
                    }
                    if (!$.isArray(elem)) {
                        ui.destroy();
                        $elem = $(selector);
                        ui.actions()
                    }
                    elements = [];
                    var index, relType, relVal;
                    if (!relVal) {
                        relType = "data-rel";
                        relVal = $(this).attr(relType)
                    }
                    if (!relVal) {
                        relType = "rel";
                        relVal = $(this).attr(relType)
                    }
                    if (relVal && relVal !== "" && relVal !== "nofollow") {
                        $elem = $selector.filter("[" + relType + '="' + relVal + '"]')
                    } else {
                        $elem = $(selector)
                    }
                    $elem.each(function () {
                        var title = null, swipealt = null, href = null, linkFb = null, linkTw = null, linkPin = null,
                            linkDl = null, imgid = null;
                        if ($(this).attr("title")) {
                            title = $(this).attr("title");
                            swipealt = title
                        }
                        if ($(this).attr("data-swipealt")) {
                            swipealt = $(this).attr("data-swipealt")
                        }
                        if ($(this).attr("href")) {
                            href = $(this).attr("href")
                        }
                        if ($(this).attr("data-facebooklink")) {
                            linkFb = $(this).attr("data-facebooklink")
                        }
                        if ($(this).attr("data-twitterlink")) {
                            linkTw = $(this).attr("data-twitterlink")
                        }
                        if ($(this).attr("data-pinterestlink")) {
                            linkPin = $(this).attr("data-pinterestlink")
                        }
                        if ($(this).attr("data-downloadlink")) {
                            linkDl = $(this).attr("data-downloadlink")
                        }
                        if ($(this).attr("id")) {
                            imgid = $(this).attr("id")
                        }
                        elements.push({
                            href: href,
                            title: title,
                            alt: swipealt,
                            linkFb: linkFb,
                            linkTw: linkTw,
                            linkPin: linkPin,
                            linkDl: linkDl,
                            imgid: imgid
                        })
                    });
                    index = $elem.index($(this));
                    event.preventDefault();
                    event.stopPropagation();
                    ui.target = $(event.target);
                    ui.init(index)
                })
            }
        };
        ui = {
            init: function (index) {
                if (plugin.settings.beforeOpen) {
                    plugin.settings.beforeOpen()
                }
                this.target.trigger("swipebox-start");
                $.swipebox.isOpen = true;
                this.build();
                this.openSlide(index);
                this.openMedia(index);
                this.preloadMedia(index + 1);
                this.preloadMedia(index - 1);
                if (plugin.settings.afterOpen) {
                    plugin.settings.afterOpen()
                }
            }, build: function () {
                var $this = this, bg;
                $("body").append(html);
                if (supportSVG && plugin.settings.useSVG === true) {
                    bg = $("#swipebox-close").css("background-image");
                    bg = bg.replace("png", "svg");
                    $("#swipebox-prev, #swipebox-next, #swipebox-close").css({"background-image": bg})
                }
                if (isMobile && plugin.settings.removeBarsOnMobile) {
                    $("#swipebox-bottom-bar, #swipebox-top-bar").remove()
                }
                $.each(elements, function () {
                    $("#swipebox-slider").append('<div class="slide"></div>')
                });
                $this.setDim();
                $this.actions();
                if (isTouch) {
                    $this.gesture()
                }
                $this.keyboard();
                $this.animBars();
                $this.resize()
            }, setDim: function () {
                var width, height, sliderCss = {};
                if ("onorientationchange" in window) {
                    window.addEventListener("orientationchange", function () {
                        if (window.orientation === 0) {
                            width = winWidth;
                            height = winHeight
                        } else {
                            if (window.orientation === 90 || window.orientation === -90) {
                                width = winHeight;
                                height = winWidth
                            }
                        }
                    }, false)
                } else {
                    width = window.innerWidth ? window.innerWidth : $(window).width();
                    height = window.innerHeight ? window.innerHeight : $(window).height()
                }
                sliderCss = {width: width, height: height};
                $("#swipebox-overlay").css(sliderCss)
            }, resize: function () {
                var $this = this;
                $(window).resize(function () {
                    $this.setDim()
                }).resize()
            }, supportTransition: function () {
                var prefixes = "transition WebkitTransition MozTransition OTransition msTransition KhtmlTransition".split(" "),
                    i;
                for (i = 0; i < prefixes.length; i++) {
                    if (document.createElement("div").style[prefixes[i]] !== undefined) {
                        return prefixes[i]
                    }
                }
                return false
            }, doCssTrans: function () {
                if (plugin.settings.useCSS && this.supportTransition()) {
                    return true
                }
            }, gesture: function () {
                var $this = this, index, hDistance, vDistance, hDistanceLast, vDistanceLast, hDistancePercent,
                    vSwipe = false, hSwipe = false, hSwipMinDistance = 10, vSwipMinDistance = 50, startCoords = {},
                    endCoords = {}, bars = $("#swipebox-top-bar, #swipebox-bottom-bar"), slider = $("#swipebox-slider");
                bars.addClass("visible-bars");
                $this.setTimeout();
                $("body").bind("touchstart", function (event) {
                    $(this).addClass("touching");
                    index = $("#swipebox-slider .slide").index($("#swipebox-slider .slide.current"));
                    endCoords = event.originalEvent.targetTouches[0];
                    startCoords.pageX = event.originalEvent.targetTouches[0].pageX;
                    startCoords.pageY = event.originalEvent.targetTouches[0].pageY;
                    $("#swipebox-slider").css({
                        "-webkit-transform": "translate3d(" + currentX + "%, 0, 0)",
                        transform: "translate3d(" + currentX + "%, 0, 0)"
                    });
                    $(".touching").bind("touchmove", function (event) {
                        event.preventDefault();
                        event.stopPropagation();
                        endCoords = event.originalEvent.targetTouches[0];
                        if (!hSwipe) {
                            vDistanceLast = vDistance;
                            vDistance = endCoords.pageY - startCoords.pageY;
                            if (Math.abs(vDistance) >= vSwipMinDistance || vSwipe) {
                                var opacity = 0.75 - Math.abs(vDistance) / slider.height();
                                slider.css({top: vDistance + "px"});
                                slider.css({opacity: opacity});
                                vSwipe = true
                            }
                        }
                        hDistanceLast = hDistance;
                        hDistance = endCoords.pageX - startCoords.pageX;
                        hDistancePercent = hDistance * 100 / winWidth;
                        if (!hSwipe && !vSwipe && Math.abs(hDistance) >= hSwipMinDistance) {
                            $("#swipebox-slider").css({"-webkit-transition": "", transition: ""});
                            hSwipe = true
                        }
                        if (hSwipe) {
                            if (0 < hDistance) {
                                if (0 === index) {
                                    $("#swipebox-overlay").addClass("leftSpringTouch")
                                } else {
                                    $("#swipebox-overlay").removeClass("leftSpringTouch").removeClass("rightSpringTouch");
                                    $("#swipebox-slider").css({
                                        "-webkit-transform": "translate3d(" + (currentX + hDistancePercent) + "%, 0, 0)",
                                        transform: "translate3d(" + (currentX + hDistancePercent) + "%, 0, 0)"
                                    })
                                }
                            } else {
                                if (0 > hDistance) {
                                    if (elements.length === index + 1) {
                                        $("#swipebox-overlay").addClass("rightSpringTouch")
                                    } else {
                                        $("#swipebox-overlay").removeClass("leftSpringTouch").removeClass("rightSpringTouch");
                                        $("#swipebox-slider").css({
                                            "-webkit-transform": "translate3d(" + (currentX + hDistancePercent) + "%, 0, 0)",
                                            transform: "translate3d(" + (currentX + hDistancePercent) + "%, 0, 0)"
                                        })
                                    }
                                }
                            }
                        }
                    });
                    return false
                }).bind("touchend", function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    $("#swipebox-slider").css({
                        "-webkit-transition": "-webkit-transform 0.4s ease",
                        transition: "transform 0.4s ease"
                    });
                    vDistance = endCoords.pageY - startCoords.pageY;
                    hDistance = endCoords.pageX - startCoords.pageX;
                    hDistancePercent = hDistance * 100 / winWidth;
                    if (vSwipe) {
                        vSwipe = false;
                        if (Math.abs(vDistance) >= 2 * vSwipMinDistance && Math.abs(vDistance) > Math.abs(vDistanceLast)) {
                            var vOffset = vDistance > 0 ? slider.height() : -slider.height();
                            slider.animate({top: vOffset + "px", opacity: 0}, 300, function () {
                                $this.closeSlide()
                            })
                        } else {
                            slider.animate({top: 0, opacity: 1}, 300)
                        }
                    } else {
                        if (hSwipe) {
                            hSwipe = false;
                            if (hDistance >= hSwipMinDistance && hDistance >= hDistanceLast) {
                                $this.getPrev()
                            } else {
                                if (hDistance <= -hSwipMinDistance && hDistance <= hDistanceLast) {
                                    $this.getNext()
                                }
                            }
                        } else {
                            if (!bars.hasClass("visible-bars")) {
                                $this.showBars();
                                $this.setTimeout()
                            } else {
                                $this.clearTimeout();
                                $this.hideBars()
                            }
                        }
                    }
                    $("#swipebox-slider").css({
                        "-webkit-transform": "translate3d(" + currentX + "%, 0, 0)",
                        transform: "translate3d(" + currentX + "%, 0, 0)"
                    });
                    $("#swipebox-overlay").removeClass("leftSpringTouch").removeClass("rightSpringTouch");
                    $(".touching").off("touchmove").removeClass("touching")
                })
            }, setTimeout: function () {
                if (plugin.settings.hideBarsDelay > 0) {
                    var $this = this;
                    $this.clearTimeout();
                    $this.timeout = window.setTimeout(function () {
                        $this.hideBars()
                    }, plugin.settings.hideBarsDelay)
                }
            }, clearTimeout: function () {
                window.clearTimeout(this.timeout);
                this.timeout = null
            }, showBars: function () {
                var bars = $("#swipebox-top-bar, #swipebox-bottom-bar");
                if (this.doCssTrans()) {
                    bars.addClass("visible-bars")
                } else {
                    $("#swipebox-top-bar").animate({top: 0}, 500);
                    $("#swipebox-bottom-bar").animate({bottom: 0}, 500);
                    setTimeout(function () {
                        bars.addClass("visible-bars")
                    }, 1000)
                }
            }, hideBars: function () {
                var bars = $("#swipebox-top-bar, #swipebox-bottom-bar");
                if (this.doCssTrans()) {
                    bars.removeClass("visible-bars")
                } else {
                    $("#swipebox-top-bar").animate({top: "-50px"}, 500);
                    $("#swipebox-bottom-bar").animate({bottom: "-50px"}, 500);
                    setTimeout(function () {
                        bars.removeClass("visible-bars")
                    }, 1000)
                }
            }, animBars: function () {
                var $this = this, bars = $("#swipebox-top-bar, #swipebox-bottom-bar");
                bars.addClass("visible-bars");
                $this.setTimeout();
                $("#swipebox-slider").click(function () {
                    if (!bars.hasClass("visible-bars")) {
                        $this.showBars();
                        $this.setTimeout()
                    }
                });
                $("#swipebox-bottom-bar").hover(function () {
                    $this.showBars();
                    bars.addClass("visible-bars");
                    $this.clearTimeout()
                }, function () {
                    if (plugin.settings.hideBarsDelay > 0) {
                        bars.removeClass("visible-bars");
                        $this.setTimeout()
                    }
                })
            }, keyboard: function () {
                var $this = this;
                $(window).bind("keyup", function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    if (event.keyCode === 37) {
                        $this.getPrev()
                    } else {
                        if (event.keyCode === 39) {
                            $this.getNext()
                        } else {
                            if (event.keyCode === 27) {
                                $this.closeSlide()
                            }
                        }
                    }
                })
            }, actions: function () {
                var $this = this, action = "touchend click";
                if (elements.length < 2) {
                    $("#swipebox-bottom-bar").hide();
                    if (undefined === elements[1]) {
                        $("#swipebox-top-bar").hide()
                    }
                } else {
                    $("#swipebox-prev").bind(action, function (event) {
                        event.preventDefault();
                        event.stopPropagation();
                        $this.getPrev();
                        $this.setTimeout()
                    });
                    $("#swipebox-next").bind(action, function (event) {
                        event.preventDefault();
                        event.stopPropagation();
                        $this.getNext();
                        $this.setTimeout()
                    })
                }
                $("#swipebox-close").bind(action, function () {
                    $this.closeSlide()
                })
            }, setSlide: function (index, isFirst) {
                isFirst = isFirst || false;
                var slider = $("#swipebox-slider");
                currentX = -index * 100;
                if (this.doCssTrans()) {
                    slider.css({
                        "-webkit-transform": "translate3d(" + (-index * 100) + "%, 0, 0)",
                        transform: "translate3d(" + (-index * 100) + "%, 0, 0)"
                    })
                } else {
                    slider.animate({left: (-index * 100) + "%"})
                }
                $("#swipebox-slider .slide").removeClass("current");
                $("#swipebox-slider .slide").eq(index).addClass("current");
                this.setTitle(index);
                if (isFirst) {
                    slider.fadeIn()
                }
                $("#swipebox-prev, #swipebox-next").removeClass("disabled");
                if (index === 0) {
                    $("#swipebox-prev").addClass("disabled")
                } else {
                    if (index === elements.length - 1 && plugin.settings.loopAtEnd !== true) {
                        $("#swipebox-next").addClass("disabled")
                    }
                }
            }, openSlide: function (index) {
                $("html").addClass("swipebox-html");
                if (isTouch) {
                    $("html").addClass("swipebox-touch");
                    if (plugin.settings.hideCloseButtonOnMobile) {
                        $("html").addClass("swipebox-no-close-button")
                    }
                } else {
                    $("html").addClass("swipebox-no-touch")
                }
                $(window).trigger("resize");
                this.setSlide(index, true)
            }, preloadMedia: function (index) {
                var $this = this, src = null;
                if (elements[index] !== undefined) {
                    src = elements[index].href
                }
                if (!$this.isVideo(src)) {
                    setTimeout(function () {
                        $this.openMedia(index)
                    }, 1000)
                } else {
                    $this.openMedia(index)
                }
            }, openMedia: function (index) {
                var $this = this, src, slide, alt, imgid;
                if (elements[index] !== undefined) {
                    src = elements[index].href;
                    alt = elements[index].alt;
                    imgid = elements[index].imgid
                }
                if (index < 0 || index >= elements.length) {
                    return false
                }
                slide = $("#swipebox-slider .slide").eq(index);
                if (!$this.isVideo(src)) {
                    slide.addClass("slide-loading");
                    $this.loadMedia(src, function () {
                        slide.removeClass("slide-loading");
                        slide.html(this);
                        var html = this;
                        html[0].alt = alt;
                        html[0].id = imgid;
                        slide.html(html);
                        if (plugin.settings.afterMedia) {
                            plugin.settings.afterMedia(index)
                        }
                    })
                } else {
                    slide.html($this.getVideo(src));
                    if (plugin.settings.afterMedia) {
                        plugin.settings.afterMedia(index)
                    }
                }
            }, setTitle: function (index) {
                var title = null;
                $("#swipebox-title").empty();
                if (elements[index] !== undefined) {
                    title = elements[index].title
                }
                if (title) {
                    $("#swipebox-top-bar").show();
                    $("#swipebox-title").append(title)
                } else {
                    $("#swipebox-top-bar").hide()
                }
                $("#swipebox-shareMenu").empty();
                $("#swipebox-share #swipebox-shareMenu").append('<a href="' + elements[index].linkFb + '" target="_blank" class="shareFacebook" tabindex="1">Share on Facebook</a>');
                $("#swipebox-share #swipebox-shareMenu").append('<a href="' + elements[index].linkTw + '" target="_blank" class="shareTwitter" tabindex="1">Tweet</a>');
                $("#swipebox-share #swipebox-shareMenu").append('<a href="' + elements[index].linkPin + '" target="_blank" class="sharePinterest" tabindex="1">Pin It</a>');
                $("#swipebox-share #swipebox-shareMenu").append('<a href="' + elements[index].linkDl + '" target="_blank" class="shareDownload" download tabindex="1">Download Image</a>')
            }, isVideo: function (src) {
                if (src) {
                    if (src.match(/(youtube\.com|youtube-nocookie\.com)\/watch\?v=([a-zA-Z0-9\-_]+)/) || src.match(/vimeo\.com\/([0-9]*)/) || src.match(/youtu\.be\/([a-zA-Z0-9\-_]+)/)) {
                        return true
                    }
                    if (src.toLowerCase().indexOf("swipeboxvideo=1") >= 0) {
                        return true
                    }
                }
            }, parseUri: function (uri, customData) {
                var a = document.createElement("a"), qs = {};
                a.href = decodeURIComponent(uri);
                if (a.search) {
                    qs = JSON.parse('{"' + a.search.toLowerCase().replace("?", "").replace(/&/g, '","').replace(/=/g, '":"') + '"}')
                }
                if ($.isPlainObject(customData)) {
                    qs = $.extend(qs, customData, plugin.settings.queryStringData)
                }
                return $.map(qs, function (val, key) {
                    if (val && val > "") {
                        return encodeURIComponent(key) + "=" + encodeURIComponent(val)
                    }
                }).join("&")
            }, getVideo: function (url) {
                var iframe = "",
                    youtubeUrl = url.match(/((?:www\.)?youtube\.com|(?:www\.)?youtube-nocookie\.com)\/watch\?v=([a-zA-Z0-9\-_]+)/),
                    youtubeShortUrl = url.match(/(?:www\.)?youtu\.be\/([a-zA-Z0-9\-_]+)/),
                    vimeoUrl = url.match(/(?:www\.)?vimeo\.com\/([0-9]*)/), qs = "";
                if (youtubeUrl || youtubeShortUrl) {
                    if (youtubeShortUrl) {
                        youtubeUrl = youtubeShortUrl
                    }
                    qs = ui.parseUri(url, {autoplay: (plugin.settings.autoplayVideos ? "1" : "0"), v: ""});
                    iframe = '<iframe width="560" height="315" src="//' + youtubeUrl[1] + "/embed/" + youtubeUrl[2] + "?" + qs + '" frameborder="0" allowfullscreen></iframe>'
                } else {
                    if (vimeoUrl) {
                        qs = ui.parseUri(url, {
                            autoplay: (plugin.settings.autoplayVideos ? "1" : "0"),
                            byline: "0",
                            portrait: "0",
                            color: plugin.settings.vimeoColor
                        });
                        iframe = '<iframe width="560" height="315"  src="//player.vimeo.com/video/' + vimeoUrl[1] + "?" + qs + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'
                    } else {
                        iframe = '<iframe width="560" height="315" src="' + url + '" frameborder="0" allowfullscreen></iframe>'
                    }
                }
                return '<div class="swipebox-video-container" style="max-width:' + plugin.settings.videoMaxWidth + 'px"><div class="swipebox-video">' + iframe + "</div></div>"
            }, loadMedia: function (src, callback) {
                if (src.trim().indexOf("#") === 0) {
                    callback.call($("<div>", {"class": "swipebox-inline-container"}).append($(src).clone().toggleClass(plugin.settings.toggleClassOnLoad)))
                } else {
                    if (!this.isVideo(src)) {
                        var img = $("<img>").on("load", function () {
                            callback.call(img)
                        });
                        img.attr("src", src)
                    }
                }
            }, getNext: function () {
                var $this = this, src, index = $("#swipebox-slider .slide").index($("#swipebox-slider .slide.current"));
                if (index + 1 < elements.length) {
                    src = $("#swipebox-slider .slide").eq(index).contents().find("iframe").attr("src");
                    $("#swipebox-slider .slide").eq(index).contents().find("iframe").attr("src", src);
                    index++;
                    $this.setSlide(index);
                    $this.preloadMedia(index + 1);
                    if (plugin.settings.nextSlide) {
                        plugin.settings.nextSlide()
                    }
                } else {
                    if (plugin.settings.loopAtEnd === true) {
                        src = $("#swipebox-slider .slide").eq(index).contents().find("iframe").attr("src");
                        $("#swipebox-slider .slide").eq(index).contents().find("iframe").attr("src", src);
                        index = 0;
                        $this.preloadMedia(index);
                        $this.setSlide(index);
                        $this.preloadMedia(index + 1);
                        if (plugin.settings.nextSlide) {
                            plugin.settings.nextSlide()
                        }
                    } else {
                        $("#swipebox-overlay").addClass("rightSpring");
                        setTimeout(function () {
                            $("#swipebox-overlay").removeClass("rightSpring")
                        }, 500)
                    }
                }
            }, getPrev: function () {
                var index = $("#swipebox-slider .slide").index($("#swipebox-slider .slide.current")), src;
                if (index > 0) {
                    src = $("#swipebox-slider .slide").eq(index).contents().find("iframe").attr("src");
                    $("#swipebox-slider .slide").eq(index).contents().find("iframe").attr("src", src);
                    index--;
                    this.setSlide(index);
                    this.preloadMedia(index - 1);
                    if (plugin.settings.prevSlide) {
                        plugin.settings.prevSlide()
                    }
                } else {
                    $("#swipebox-overlay").addClass("leftSpring");
                    setTimeout(function () {
                        $("#swipebox-overlay").removeClass("leftSpring")
                    }, 500)
                }
            }, nextSlide: function () {
            }, prevSlide: function () {
            }, closeSlide: function () {
                $("html").removeClass("swipebox-html");
                $("html").removeClass("swipebox-touch");
                $(window).trigger("resize");
                this.destroy()
            }, destroy: function () {
                $(window).unbind("keyup");
                $("body").unbind("touchstart");
                $("body").unbind("touchmove");
                $("body").unbind("touchend");
                $("#swipebox-slider").unbind();
                $("#swipebox-overlay").remove();
                if (!$.isArray(elem)) {
                    elem.removeData("_swipebox")
                }
                if (this.target) {
                    this.target.trigger("swipebox-destroy")
                }
                $.swipebox.isOpen = false;
                if (plugin.settings.afterClose) {
                    plugin.settings.afterClose()
                }
            }
        };
        plugin.init()
    };
    $.fn.swipebox = function (options) {
        if (!$.data(this, "_swipebox")) {
            var swipebox = new $.swipebox(this, options);
            this.data("_swipebox", swipebox)
        }
        return this.data("_swipebox")
    }
}(window, document, jQuery));
var imgLiquid = imgLiquid || {VER: "0.9.944"};
imgLiquid.bgs_Available = !1, imgLiquid.bgs_CheckRunned = !1, imgLiquid.injectCss = ".imgLiquid img {visibility:hidden}", function (i) {
    function t() {
        if (!imgLiquid.bgs_CheckRunned) {
            imgLiquid.bgs_CheckRunned = !0;
            var t = i('<span style="background-size:cover" />');
            i("body").append(t), !function () {
                var i = t[0];
                if (i && window.getComputedStyle) {
                    var e = window.getComputedStyle(i, null);
                    e && e.backgroundSize && (imgLiquid.bgs_Available = "cover" === e.backgroundSize)
                }
            }(), t.remove()
        }
    }

    i.fn.extend({
        imgLiquid: function (e) {
            this.defaults = {
                fill: !0,
                verticalAlign: "center",
                horizontalAlign: "center",
                useBackgroundSize: !0,
                useDataHtmlAttr: !0,
                responsive: !0,
                delay: 0,
                fadeInTime: 0,
                removeBoxBackground: !0,
                hardPixels: !0,
                responsiveCheckTime: 500,
                timecheckvisibility: 500,
                onStart: null,
                onFinish: null,
                onItemStart: null,
                onItemFinish: null,
                onItemError: null
            }, t();
            var a = this;
            return this.options = e, this.settings = i.extend({}, this.defaults, this.options), this.settings.onStart && this.settings.onStart(), this.each(function (t) {
                function e() {
                    -1 === u.css("background-image").indexOf(encodeURI(c.attr("src"))) && u.css({"background-image": 'url("' + encodeURI(c.attr("src")) + '")'}), u.css({
                        "background-size": g.fill ? "cover" : "contain",
                        "background-position": (g.horizontalAlign + " " + g.verticalAlign).toLowerCase(),
                        "background-repeat": "no-repeat"
                    }), i("a:first", u).css({
                        display: "block",
                        width: "100%",
                        height: "100%"
                    }), i("img", u).css({display: "none"}), g.onItemFinish && g.onItemFinish(t, u, c), u.addClass("imgLiquid_bgSize"), u.addClass("imgLiquid_ready"), l()
                }

                function d() {
                    function e() {
                        c.data("imgLiquid_error") || c.data("imgLiquid_loaded") || c.data("imgLiquid_oldProcessed") || (u.is(":visible") && c[0].complete && c[0].width > 0 && c[0].height > 0 ? (c.data("imgLiquid_loaded", !0), setTimeout(r, t * g.delay)) : setTimeout(e, g.timecheckvisibility))
                    }

                    if (c.data("oldSrc") && c.data("oldSrc") !== c.attr("src")) {
                        var a = c.clone().removeAttr("style");
                        return a.data("imgLiquid_settings", c.data("imgLiquid_settings")), c.parent().prepend(a), c.remove(), c = a, c[0].width = 0, setTimeout(d, 10), void 0
                    }
                    return c.data("imgLiquid_oldProcessed") ? (r(), void 0) : (c.data("imgLiquid_oldProcessed", !1), c.data("oldSrc", c.attr("src")), i("img:not(:first)", u).css("display", "none"), u.css({overflow: "hidden"}), c.fadeTo(0, 0).removeAttr("width").removeAttr("height").css({
                        visibility: "visible",
                        "max-width": "none",
                        "max-height": "none",
                        width: "auto",
                        height: "auto",
                        display: "block"
                    }), c.on("error", n), c[0].onerror = n, e(), o(), void 0)
                }

                function o() {
                    (g.responsive || c.data("imgLiquid_oldProcessed")) && c.data("imgLiquid_settings") && (g = c.data("imgLiquid_settings"), u.actualSize = u.get(0).offsetWidth + u.get(0).offsetHeight / 10000, u.sizeOld && u.actualSize !== u.sizeOld && r(), u.sizeOld = u.actualSize, setTimeout(o, g.responsiveCheckTime))
                }

                function n() {
                    c.data("imgLiquid_error", !0), u.addClass("imgLiquid_error"), g.onItemError && g.onItemError(t, u, c), l()
                }

                function s() {
                    var i = {};
                    if (a.settings.useDataHtmlAttr) {
                        var t = u.attr("data-imgLiquid-fill"), e = u.attr("data-imgLiquid-horizontalAlign"),
                            d = u.attr("data-imgLiquid-verticalAlign");
                        ("true" === t || "false" === t) && (i.fill = Boolean("true" === t)), void 0 === e || "left" !== e && "center" !== e && "right" !== e && -1 === e.indexOf("%") || (i.horizontalAlign = e), void 0 === d || "top" !== d && "bottom" !== d && "center" !== d && -1 === d.indexOf("%") || (i.verticalAlign = d)
                    }
                    return imgLiquid.isIE && a.settings.ieFadeInDisabled && (i.fadeInTime = 0), i
                }

                function r() {
                    var i, e, a, d, o, n, s, r, m = 0, h = 0, f = u.width(), v = u.height();
                    void 0 === c.data("owidth") && c.data("owidth", c[0].width), void 0 === c.data("oheight") && c.data("oheight", c[0].height), g.fill === f / v >= c.data("owidth") / c.data("oheight") ? (i = "100%", e = "auto", a = Math.floor(f), d = Math.floor(f * (c.data("oheight") / c.data("owidth")))) : (i = "auto", e = "100%", a = Math.floor(v * (c.data("owidth") / c.data("oheight"))), d = Math.floor(v)), o = g.horizontalAlign.toLowerCase(), s = f - a, "left" === o && (h = 0), "center" === o && (h = 0.5 * s), "right" === o && (h = s), -1 !== o.indexOf("%") && (o = parseInt(o.replace("%", ""), 10), o > 0 && (h = 0.01 * s * o)), n = g.verticalAlign.toLowerCase(), r = v - d, "left" === n && (m = 0), "center" === n && (m = 0.5 * r), "bottom" === n && (m = r), -1 !== n.indexOf("%") && (n = parseInt(n.replace("%", ""), 10), n > 0 && (m = 0.01 * r * n)), g.hardPixels && (i = a, e = d), c.css({
                        width: i,
                        height: e,
                        "margin-left": Math.floor(h),
                        "margin-top": Math.floor(m)
                    }), c.data("imgLiquid_oldProcessed") || (c.fadeTo(g.fadeInTime, 1), c.data("imgLiquid_oldProcessed", !0), g.removeBoxBackground && u.css("background-image", "none"), u.addClass("imgLiquid_nobgSize"), u.addClass("imgLiquid_ready")), g.onItemFinish && g.onItemFinish(t, u, c), l()
                }

                function l() {
                    t === a.length - 1 && a.settings.onFinish && a.settings.onFinish()
                }

                var g = a.settings, u = i(this), c = i("img:first", u);
                return c.length ? (c.data("imgLiquid_settings") ? (u.removeClass("imgLiquid_error").removeClass("imgLiquid_ready"), g = i.extend({}, c.data("imgLiquid_settings"), a.options)) : g = i.extend({}, a.settings, s()), c.data("imgLiquid_settings", g), g.onItemStart && g.onItemStart(t, u, c), imgLiquid.bgs_Available && g.useBackgroundSize ? e() : d(), void 0) : (n(), void 0)
            })
        }
    })
}(jQuery), !function () {
    var i = imgLiquid.injectCss, t = document.getElementsByTagName("head")[0], e = document.createElement("style");
    e.type = "text/css", e.styleSheet ? e.styleSheet.cssText = i : e.appendChild(document.createTextNode(i)), t.appendChild(e)
}();
!function ($) {
    var TabCollapse = function (el, options) {
        this.options = options;
        this.$tabs = $(el);
        this._accordionVisible = false;
        this._initAccordion();
        this._checkStateOnResize();
        var that = this;
        setTimeout(function () {
            that.checkState()
        }, 0)
    };
    TabCollapse.DEFAULTS = {
        accordionClass: "visible-xs",
        tabsClass: "hidden-xs",
        accordionTemplate: function (heading, groupId, parentId, active) {
            return '<div class="panel panel-default">   <div class="panel-heading">      <span class="panel-title">      </span>   </div>   <div id="' + groupId + '" class="panel-collapse collapse ' + (active ? "in" : "") + '">       <div class="panel-body js-tabcollapse-panel-body">       </div>   </div></div>'
        }
    };
    TabCollapse.prototype.checkState = function () {
        if (this.$tabs.is(":visible") && this._accordionVisible) {
            this.showTabs();
            this._accordionVisible = false
        } else {
            if (this.$accordion.is(":visible") && !this._accordionVisible) {
                this.showAccordion();
                this._accordionVisible = true
            }
        }
    };
    TabCollapse.prototype.showTabs = function () {
        var view = this;
        this.$tabs.trigger($.Event("show-tabs.bs.tabcollapse"));
        var $panelHeadings = this.$accordion.find(".js-tabcollapse-panel-heading").detach();
        $panelHeadings.each(function () {
            var $panelHeading = $(this), $parentLi = $panelHeading.data("bs.tabcollapse.parentLi");
            view._panelHeadingToTabHeading($panelHeading);
            $parentLi.append($panelHeading)
        });
        var $panelBodies = this.$accordion.find(".js-tabcollapse-panel-body");
        $panelBodies.each(function () {
            var $panelBody = $(this), $tabPane = $panelBody.data("bs.tabcollapse.tabpane");
            $tabPane.append($panelBody.children("*").detach())
        });
        this.$accordion.html("");
        this.$tabs.trigger($.Event("shown-tabs.bs.tabcollapse"))
    };
    TabCollapse.prototype.showAccordion = function () {
        this.$tabs.trigger($.Event("show-accordion.bs.tabcollapse"));
        var $headings = this.$tabs.find('li:not(.dropdown) [data-toggle="tab"], li:not(.dropdown) [data-toggle="pill"]'),
            view = this;
        $headings.each(function () {
            var $heading = $(this), $parentLi = $heading.parent();
            $heading.data("bs.tabcollapse.parentLi", $parentLi);
            view.$accordion.append(view._createAccordionGroup(view.$accordion.attr("id"), $heading.detach()))
        });
        this.$tabs.trigger($.Event("shown-accordion.bs.tabcollapse"))
    };
    TabCollapse.prototype._panelHeadingToTabHeading = function ($heading) {
        var href = $heading.attr("href").replace(/-collapse$/g, "");
        $heading.attr({"data-toggle": "tab", href: href, "data-parent": ""});
        return $heading
    };
    TabCollapse.prototype._tabHeadingToPanelHeading = function ($heading, groupId, parentId, active) {
        $heading.addClass("js-tabcollapse-panel-heading " + (active ? "" : "collapsed"));
        $heading.attr({"data-toggle": "collapse", "data-parent": "#" + parentId, href: "#" + groupId});
        return $heading
    };
    TabCollapse.prototype._checkStateOnResize = function () {
        var view = this;
        $(window).resize(function () {
            clearTimeout(view._resizeTimeout);
            view._resizeTimeout = setTimeout(function () {
                view.checkState()
            }, 100)
        })
    };
    TabCollapse.prototype._initAccordion = function () {
        this.$accordion = $('<div class="panel-group ' + this.options.accordionClass + '" id="' + this.$tabs.attr("id") + '-accordion"></div>');
        this.$tabs.after(this.$accordion);
        this.$tabs.addClass(this.options.tabsClass);
        this.$tabs.siblings(".tab-content").addClass(this.options.tabsClass)
    };
    TabCollapse.prototype._createAccordionGroup = function (parentId, $heading) {
        var tabSelector = $heading.attr("data-target"), active = $heading.data("bs.tabcollapse.parentLi").is(".active");
        if (!tabSelector) {
            tabSelector = $heading.attr("href");
            tabSelector = tabSelector && tabSelector.replace(/.*(?=#[^\s]*$)/, "")
        }
        var $tabPane = $(tabSelector), groupId = $tabPane.attr("id") + "-collapse",
            $panel = $(this.options.accordionTemplate($heading, groupId, parentId, active));
        $panel.find(".panel-heading > .panel-title").append(this._tabHeadingToPanelHeading($heading, groupId, parentId, active));
        $panel.find(".panel-body").append($tabPane.children("*").detach()).data("bs.tabcollapse.tabpane", $tabPane);
        return $panel
    };
    $.fn.tabCollapse = function (option) {
        return this.each(function () {
            var $this = $(this);
            var data = $this.data("bs.tabcollapse");
            var options = $.extend({}, TabCollapse.DEFAULTS, $this.data(), typeof option === "object" && option);
            if (!data) {
                $this.data("bs.tabcollapse", new TabCollapse(this, options))
            }
        })
    };
    $.fn.tabCollapse.Constructor = TabCollapse
}(window.jQuery);/* Combined JS End */
