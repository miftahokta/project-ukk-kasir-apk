"use strict";
let direction = "ltr";
isRtl && (direction = "rtl"),
document.addEventListener("DOMContentLoaded", function() {
    {
        const u = document.getElementById("calendar")
          , v = document.querySelector(".app-calendar-sidebar")
          , m = document.getElementById("addEventSidebar")
          , p = document.querySelector(".app-overlay")
          , f = {
            Business: "primary",
            Holiday: "success",
            Personal: "danger",
            Family: "warning",
            ETC: "info"
        }
          , g = document.querySelector(".offcanvas-title")
          , b = document.querySelector(".btn-toggle-sidebar")
          , h = document.querySelector('button[type="submit"]')
          , y = document.querySelector(".btn-delete-event")
          , S = document.querySelector(".btn-cancel")
          , L = document.querySelector("#eventTitle")
          , E = document.querySelector("#eventStartDate")
          , k = document.querySelector("#eventEndDate")
          , w = document.querySelector("#eventURL")
          , x = $("#eventLabel")
          , q = $("#eventGuests")
          , P = document.querySelector("#eventLocation")
          , D = document.querySelector("#eventDescription")
          , T = document.querySelector(".allDay-switch")
          , M = document.querySelector(".select-all")
          , A = [].slice.call(document.querySelectorAll(".input-filter"));
        let a, l = events, r = !1;
        const F = new bootstrap.Offcanvas(m);
        function e(e) {
            return e.id ? "<span class='badge badge-dot bg-" + $(e.element).data("label") + " me-2'> </span>" + e.text : e.text
        }
        function t(e) {
            return e.id ? "<div class='d-flex flex-wrap align-items-center'><div class='avatar avatar-xs me-2'><img src='" + assetsPath + "img/avatars/" + $(e.element).data("avatar") + "' alt='avatar' class='rounded-circle' /></div>" + e.text + "</div>" : e.text
        }
        var n, d;
        function o() {
            var e = document.querySelector(".fc-sidebarToggle-button");
            for (e.classList.remove("fc-button-primary"),
            e.classList.add("d-lg-none", "d-inline-block", "ps-0"); e.firstChild; )
                e.firstChild.remove();
            e.setAttribute("data-bs-toggle", "sidebar"),
            e.setAttribute("data-overlay", ""),
            e.setAttribute("data-target", "#app-calendar-sidebar"),
            e.insertAdjacentHTML("beforeend", '<i class="mdi mdi-menu mdi-24px text-body"></i>')
        }
        x.length && (select2Focus(x),
        x.wrap('<div class="position-relative"></div>').select2({
            placeholder: "Select value",
            dropdownParent: x.parent(),
            templateResult: e,
            templateSelection: e,
            minimumResultsForSearch: -1,
            escapeMarkup: function(e) {
                return e
            }
        })),
        q.length && (select2Focus(q),
        q.wrap('<div class="position-relative"></div>').select2({
            placeholder: "Select value",
            dropdownParent: q.parent(),
            closeOnSelect: !1,
            templateResult: t,
            templateSelection: t,
            escapeMarkup: function(e) {
                return e
            }
        })),
        E && (n = E.flatpickr({
            enableTime: !0,
            altFormat: "Y-m-dTH:i:S",
            onReady: function(e, t, n) {
                n.isMobile && n.mobileInput.setAttribute("step", null)
            }
        })),
        k && (d = k.flatpickr({
            enableTime: !0,
            altFormat: "Y-m-dTH:i:S",
            onReady: function(e, t, n) {
                n.isMobile && n.mobileInput.setAttribute("step", null)
            }
        }));
        let i = new Calendar(u,{
            initialView: "dayGridMonth",
            events: function(e, t) {
                let n = function() {
                    let t = []
                      , e = [].slice.call(document.querySelectorAll(".input-filter:checked"));
                    return e.forEach(e=>{
                        t.push(e.getAttribute("data-value"))
                    }
                    ),
                    t
                }();
                t(l.filter(function(e) {
                    return n.includes(e.extendedProps.calendar.toLowerCase())
                }))
            },
            plugins: [dayGridPlugin, interactionPlugin, listPlugin, timegridPlugin],
            editable: !0,
            dragScroll: !0,
            dayMaxEvents: 2,
            eventResizableFromStart: !0,
            customButtons: {
                sidebarToggle: {
                    text: "Sidebar"
                }
            },
            headerToolbar: {
                start: "sidebarToggle, prev,next, title",
                end: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
            },
            direction: direction,
            initialDate: new Date,
            navLinks: !0,
            eventClassNames: function({event: e}) {
                return ["fc-event-" + f[e._def.extendedProps.calendar]]
            },
            dateClick: function(e) {
                e = moment(e.date).format("YYYY-MM-DD");
                c(),
                F.show(),
                g && (g.innerHTML = "Add Event"),
                h.innerHTML = "Add",
                h.classList.remove("btn-update-event"),
                h.classList.add("btn-add-event"),
                y.classList.add("d-none"),
                E.value = e,
                k.value = e
            },
            eventClick: function(e) {
                e = e,
                (a = e.event).url && (e.jsEvent.preventDefault(),
                window.open(a.url, "_blank")),
                F.show(),
                g && (g.innerHTML = "Update Event"),
                h.innerHTML = "Update",
                h.classList.add("btn-update-event"),
                h.classList.remove("btn-add-event"),
                y.classList.remove("d-none"),
                L.value = a.title,
                n.setDate(a.start, !0, "Y-m-d"),
                !0 === a.allDay ? T.checked = !0 : T.checked = !1,
                null !== a.end ? d.setDate(a.end, !0, "Y-m-d") : d.setDate(a.start, !0, "Y-m-d"),
                x.val(a.extendedProps.calendar).trigger("change"),
                void 0 !== a.extendedProps.location && (P.value = a.extendedProps.location),
                void 0 !== a.extendedProps.guests && q.val(a.extendedProps.guests).trigger("change"),
                void 0 !== a.extendedProps.description && (D.value = a.extendedProps.description)
            },
            datesSet: function() {
                o()
            },
            viewDidMount: function() {
                o()
            }
        });
        i.render(),
        o();
        var s = document.getElementById("eventForm");
        function c() {
            k.value = "",
            w.value = "",
            E.value = "",
            L.value = "",
            P.value = "",
            T.checked = !1,
            q.val("").trigger("change"),
            D.value = ""
        }
        FormValidation.formValidation(s, {
            fields: {
                eventTitle: {
                    validators: {
                        notEmpty: {
                            message: "Please enter event title "
                        }
                    }
                },
                eventStartDate: {
                    validators: {
                        notEmpty: {
                            message: "Please enter start date "
                        }
                    }
                },
                eventEndDate: {
                    validators: {
                        notEmpty: {
                            message: "Please enter end date "
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger,
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    eleValidClass: "",
                    rowSelector: function(e, t) {
                        return ".mb-4"
                    }
                }),
                submitButton: new FormValidation.plugins.SubmitButton,
                autoFocus: new FormValidation.plugins.AutoFocus
            }
        }).on("core.form.valid", function() {
            r = !0
        }).on("core.form.invalid", function() {
            r = !1
        }),
        b && b.addEventListener("click", e=>{
            S.classList.remove("d-none")
        }
        ),
        h.addEventListener("click", e=>{
            var t, n;
            h.classList.contains("btn-add-event") ? r && (n = {
                id: i.getEvents().length + 1,
                title: L.value,
                start: E.value,
                end: k.value,
                startStr: E.value,
                endStr: k.value,
                display: "block",
                extendedProps: {
                    location: P.value,
                    guests: q.val(),
                    calendar: x.val(),
                    description: D.value
                }
            },
            w.value && (n.url = w.value),
            T.checked && (n.allDay = !0),
            n = n,
            l.push(n),
            i.refetchEvents(),
            F.hide()) : r && (n = {
                id: a.id,
                title: L.value,
                start: E.value,
                end: k.value,
                url: w.value,
                extendedProps: {
                    location: P.value,
                    guests: q.val(),
                    calendar: x.val(),
                    description: D.value
                },
                display: "block",
                allDay: !!T.checked
            },
            (t = n).id = parseInt(t.id),
            l[l.findIndex(e=>e.id === t.id)] = t,
            i.refetchEvents(),
            F.hide())
        }
        ),
        y.addEventListener("click", e=>{
            var t;
            t = parseInt(a.id),
            l = l.filter(function(e) {
                return e.id != t
            }),
            i.refetchEvents(),
            F.hide()
        }
        ),
        m.addEventListener("hidden.bs.offcanvas", function() {
            c()
        }),
        b.addEventListener("click", e=>{
            g && (g.innerHTML = "Add Event"),
            h.innerHTML = "Add",
            h.classList.remove("btn-update-event"),
            h.classList.add("btn-add-event"),
            y.classList.add("d-none"),
            v.classList.remove("show"),
            p.classList.remove("show")
        }
        ),
        M && M.addEventListener("click", e=>{
            e.currentTarget.checked ? document.querySelectorAll(".input-filter").forEach(e=>e.checked = 1) : document.querySelectorAll(".input-filter").forEach(e=>e.checked = 0),
            i.refetchEvents()
        }
        ),
        A && A.forEach(e=>{
            e.addEventListener("click", ()=>{
                document.querySelectorAll(".input-filter:checked").length < document.querySelectorAll(".input-filter").length ? M.checked = !1 : M.checked = !0,
                i.refetchEvents()
            }
            )
        }
        )
    }
});
