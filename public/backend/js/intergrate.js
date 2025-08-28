(() => {

    function i(n) {
        var a = e[n];
        if (void 0 !== a) return a.exports;
        var r = (e[n] = { exports: {} });
        return t[n].call(r.exports, r, r.exports, i), r.exports;
    }
    (i.n = (t) => {
        var e = t && t.__esModule ? () => t.default : () => t;
        return i.d(e, { a: e }), e;
    }),
        (i.d = (t, e) => {
            for (var n in e)
                i.o(e, n) &&
                    !i.o(t, n) &&
                    Object.defineProperty(t, n, { enumerable: !0, get: e[n] });
        }),
        (i.o = (t, e) => Object.prototype.hasOwnProperty.call(t, e)),
        (() => {
            "use strict";
            var t = i(418),
                e = i(6294),
                n = i(27);
            function a(t) {
                return (
                    (a =
                        "function" == typeof Symbol &&
                        "symbol" == typeof Symbol.iterator
                            ? function (t) {
                                  return typeof t;
                              }
                            : function (t) {
                                  return t &&
                                      "function" == typeof Symbol &&
                                      t.constructor === Symbol &&
                                      t !== Symbol.prototype
                                      ? "symbol"
                                      : typeof t;
                              }),
                    a(t)
                );
            }
            function r(t, e) {
                if (!(t instanceof e))
                    throw new TypeError("Cannot call a class as a function");
            }
            function o(t, e) {
                for (var i = 0; i < e.length; i++) {
                    var n = e[i];
                    (n.enumerable = n.enumerable || !1),
                        (n.configurable = !0),
                        "value" in n && (n.writable = !0),
                        Object.defineProperty(t, h(n.key), n);
                }
            }
            function s(t, e, i) {
                return (
                    e && o(t.prototype, e),
                    i && o(t, i),
                    Object.defineProperty(t, "prototype", { writable: !1 }),
                    t
                );
            }
            function h(t) {
                var e = (function (t, e) {
                    if ("object" != a(t) || !t) return t;
                    var i = t[Symbol.toPrimitive];
                    if (void 0 !== i) {
                        var n = i.call(t, e || "default");
                        if ("object" != a(n)) return n;
                        throw new TypeError(
                            "@@toPrimitive must return a primitive value."
                        );
                    }
                    return ("string" === e ? String : Number)(t);
                })(t, "string");
                return "symbol" == a(e) ? e : e + "";
            }
            var c = (function () {
                    return s(
                        function t() {
                            r(this, t);
                        },
                        null,
                        [
                            {
                                key: "editorSelectFile",
                                value: function (e) {
                                    var i =
                                        t.M.getUrlParam("CKEditor") ||
                                        t.M.getUrlParam("CKEditorFuncNum");
                                    if (window.opener && i) {
                                        var n = t.M.arrayFirst(e);
                                        window.opener.CKEDITOR.tools.callFunction(
                                            t.M.getUrlParam("CKEditorFuncNum"),
                                            n.full_url
                                        ),
                                            window.opener && window.close();
                                    }
                                },
                            },
                        ]
                    );
                })(),
                l = s(function i(a, o) {
                    r(this, i);
                    var s = window.RvMediaCustomCallback || null;
                    if ("function" != typeof s) {
                        window.rvMedia = window.rvMedia || {};
                        var h = $("body");
                        o = $.extend(
                            !0,
                            {
                                multiple: !0,
                                type: "*",
                                onSelectFiles: function (t, e) {},
                            },
                            o
                        );
                        var c = function (i) {
                            i.preventDefault();
                            var a = $(i.currentTarget);
                            $("#rv_media_modal").modal("show"),
                                (window.rvMedia.options = o),
                                (window.rvMedia.options.open_in = "modal"),
                                (window.rvMedia.$el = a),
                                (e.T.request_params.filter = "everything"),
                                t.M.storeConfig();
                            var r = window.rvMedia.$el.data("rv-media");
                            void 0 !== r &&
                                r.length > 0 &&
                                ((r = r[0]),
                                (window.rvMedia.options = $.extend(
                                    !0,
                                    window.rvMedia.options,
                                    r || {}
                                )),
                                void 0 !== r.selected_file_id
                                    ? (window.rvMedia.options.is_popup = !0)
                                    : void 0 !==
                                          window.rvMedia.options.is_popup &&
                                      (window.rvMedia.options.is_popup =
                                          void 0)),
                                0 ===
                                $("#rv_media_body .rv-media-container").length
                                    ? $("#rv_media_body").load(
                                          RV_MEDIA_URL.popup,
                                          function (e) {
                                              e.error && alert(e.message),
                                                  $("#rv_media_body")
                                                      .removeClass(
                                                          "media-modal-loading"
                                                      )
                                                      .closest(".modal-content")
                                                      .removeClass(
                                                          "bb-loading"
                                                      ),
                                                  $(document)
                                                      .find(
                                                          ".rv-media-container .js-change-action[data-type=refresh]"
                                                      )
                                                      .trigger("click"),
                                                  "everything" !==
                                                      t.M.getRequestParams()
                                                          .filter &&
                                                      $(
                                                          ".rv-media-actions .btn.js-rv-media-change-filter-group.js-filter-by-type"
                                                      ).hide(),
                                                  n.K.destroyContext(),
                                                  n.K.initContext();
                                          }
                                      )
                                    : $(document)
                                          .find(
                                              ".rv-media-container .js-change-action[data-type=refresh]"
                                          )
                                          .trigger("click");
                        };
                        "string" == typeof a
                            ? h.off("click", a).on("click", a, c)
                            : a.off("click").on("click", c);
                    } else s(a, o);
                });
            (window.RvMediaStandAlone = l),
                $(".js-insert-to-editor")
                    .off("click")
                    .on("click", function (e) {
                        e.preventDefault();
                        var i = t.M.getSelectedFiles();
                        t.M.size(i) > 0 && c.editorSelectFile(i);
                    }),
                ($.fn.rvMedia = function (i) {
                    var n = $(this);
                    (e.T.request_params.filter = "everything"),
                        $(document)
                            .find(".js-insert-to-editor")
                            .prop(
                                "disabled",
                                "trash" === e.T.request_params.view_in
                            ),
                        t.M.storeConfig();
                    var a = window.RvMediaCustomCallback || null;
                    "function" != typeof a ? new l(n, i) : a(n, i);
                }),
                document.dispatchEvent(new CustomEvent("core-media-loaded"));
        })();
})();
