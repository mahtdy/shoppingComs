tinymce.PluginManager.add("link", function(a) {
    function b(b) {
        return function() {
            var c = a.settings.link_list;
            "string" == typeof c ? tinymce.util.XHR.send({
                url: c,
                success: function(a) {
                    b(tinymce.util.JSON.parse(a))
                }
            }) : "function" == typeof c ? c(b) : b(c)
        }
    }

    function c(a, b, c) {
        function d(a, c) {
            return c = c || [], tinymce.each(a, function(a) {
                var e = {
                    text: a.text || a.title
                };
                a.menu ? e.menu = d(a.menu) : (e.value = a.value, b && b(e)), c.push(e)
            }), c
        }
        return d(a, c || [])
    }

    function d(b) {
        function d(a) {
            var b = l.find("#text");
            (!b.value() || a.lastControl && b.value() == a.lastControl.text()) && b.value(a.control.text()), l.find("#href").value(a.control.value())
        }

        function e(b) {
            var c = [];
            return tinymce.each(a.dom.select("a:not([href])"), function(a) {
                var d = a.name || a.id;
                d && c.push({
                    text: d,
                    value: "#" + d,
                    selected: -1 != b.indexOf("#" + d)
                })
            }), c.length ? (c.unshift({
                text: "None",
                value: ""
            }), {
                name: "anchor",
                type: "listbox",
                label: "Anchors",
                values: c,
                onselect: d
            }) : void 0
        }

        function f() {
            !k && 0 === u.text.length && m && this.parent().parent().find("#text")[0].value(this.value())
        }

        function g(b) {
            var c = b.meta || {};
            o && o.value(a.convertURL(this.value(), "href")), tinymce.each(b.meta, function(a, b) {
                l.find("#" + b).value(a)
            }), c.text || f.call(this)
        }

        function h(a) {
            var b = v.getContent();
            if (/</.test(b) && (!/^<a [^>]+>[^<]+<\/a>$/.test(b) || -1 == b.indexOf("href="))) return !1;
            if (a) {
                var c, d = a.childNodes;
                if (0 === d.length) return !1;
                for (c = d.length - 1; c >= 0; c--)
                    if (3 != d[c].nodeType) return !1
            }
            return !0
        }
        var i, j, k, l, m, n, o, p, q, r, s, t, u = {},
            v = a.selection,
            w = a.dom;
        i = v.getNode(), j = w.getParent(i, "a[href]"), m = h(), u.text = k = j ? j.innerText || j.textContent : v.getContent({
            format: "text"
        }), u.href = j ? w.getAttrib(j, "href") : "", j ? u.target = w.getAttrib(j, "target") : a.settings.default_link_target && (u.target = a.settings.default_link_target), (t = w.getAttrib(j, "rel")) && (u.rel = t), (t = w.getAttrib(j, "class")) && (u["class"] = t), (t = w.getAttrib(j, "title")) && (u.title = t), m && (n = {
            name: "text",
            type: "textbox",
            size: 40,
            label: "Text to display",
            onchange: function() {
                u.text = this.value()
            }
        }), b && (o = {
            type: "listbox",
            label: "Link list",
            values: c(b, function(b) {
                b.value = a.convertURL(b.value || b.url, "href")
            }, [{
                text: "None",
                value: ""
            }]),
            onselect: d,
            value: a.convertURL(u.href, "href"),
            onPostRender: function() {
                o = this
            }
        }), a.settings.target_list !== !1 && (a.settings.target_list || (a.settings.target_list = [{
            text: "None",
            value: ""
        }, {
            text: "New window",
            value: "_blank"
        }]), q = {
            name: "target",
            type: "listbox",
            label: "Target",
            values: c(a.settings.target_list)
        }), a.settings.rel_list && (p = {
            name: "rel",
            type: "listbox",
            label: "Rel",
            values: c(a.settings.rel_list)
        }), a.settings.link_class_list && (r = {
            name: "class",
            type: "listbox",
            label: "Class",
            values: c(a.settings.link_class_list, function(b) {
                b.value && (b.textStyle = function() {
                    return a.formatter.getCssText({
                        inline: "a",
                        classes: [b.value]
                    })
                })
            })
        }), a.settings.link_title !== !1 && (s = {
            name: "title",
            type: "textbox",
            label: "Title",
            value: u.title
        }), l = a.windowManager.open({
            title: "Insert link",
            data: u,
            body: [{
                name: "href",
                type: "filepicker",
                filetype: "file",
                size: 40,
                autofocus: !0,
                label: "Url",
                onchange: g,
                onkeyup: f
            }, n, s, e(u.href), o, p, q, r],
            onSubmit: function(b) {
                function c(b, c) {
                    var d = a.selection.getRng();
                    window.setTimeout(function() {
                        a.windowManager.confirm(b, function(b) {
                            a.selection.setRng(d), c(b)
                        })
                    }, 0)
                }

                function d() {
                    var b = {
                        href: e,
                        target: u.target ? u.target : null,
                        rel: u.rel ? u.rel : null,
                        "class": u["class"] ? u["class"] : null,
                        title: u.title ? u.title : null
                    };
                    j ? (a.focus(), m && u.text != k && ("innerText" in j ? j.innerText = u.text : j.textContent = u.text), w.setAttribs(j, b), v.select(j), a.undoManager.add()) : m ? a.insertContent(w.createHTML("a", b, w.encode(u.text))) : a.execCommand("mceInsertLink", !1, b)
                }
                var e;
                return u = tinymce.extend(u, b.data), (e = u.href) ? e.indexOf("@") > 0 && -1 == e.indexOf("//") && -1 == e.indexOf("mailto:") ? void c("The URL you entered seems to be an email address. Do you want to add the required mailto: prefix?", function(a) {
                    a && (e = "mailto:" + e), d()
                }) : a.settings.link_assume_external_targets && !/^\w+:/i.test(e) || !a.settings.link_assume_external_targets && /^\s*www\./i.test(e) ? void c("The URL you entered seems to be an external link. Do you want to add the required http:// prefix?", function(a) {
                    a && (e = "http://" + e), d()
                }) : void d() : void a.execCommand("unlink")
            }
        })
    }
    a.addButton("link", {
        icon: "link",
        tooltip: "Insert/edit link",
        shortcut: "Meta+K",
        onclick: b(d),
        stateSelector: "a[href]"
    }),a.addButton("link1", {
        icon: "help",
        tooltip: "Insert/edit link",
        shortcut: "Meta+K",
        onclick: b(d),
        stateSelector: "a[href]"
    }), a.addButton("unlink", {
        icon: "unlink",
        tooltip: "Remove link",
        cmd: "unlink",
        stateSelector: "a[href]"
    }), a.addShortcut("Meta+K", "", b(d)), a.addCommand("mceLink", b(d)), this.showDialog = d, a.addMenuItem("link", {
        icon: "link",
        text: "Insert/edit link",
        shortcut: "Meta+K",
        onclick: b(d),
        stateSelector: "a[href]",
        context: "insert",
        prependToContext: !0
    })
});