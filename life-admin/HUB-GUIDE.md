# Life Hub — quick guide

Your interactive dashboard is **`public/life-hub.html`**. The deep fill-in
templates in this `life-admin/` folder remain the detailed reference.

## Opening it

- **As a file:** double-click `public/life-hub.html`, or drag it into a browser
  tab. Works fully offline.
- **At a URL:** once the site is deployed, it's served at **`/goal`** (e.g.
  `serhatdereli.me/goal`).
- **As an installed app (PWA):** open it at a `http(s)` URL, then use your
  browser's **Install** / "Add to Home Screen" option. It then opens in its own
  window with its own icon, like a desktop/phone app, and works offline.

## The passcode lock

The Hub opens behind a passcode screen. Once you unlock on a device, it stays
unlocked there until you tap **🔒 Lock** (in the *Your data & privacy* card).

> ⚠️ **What the lock is and isn't.** It deters casual access to the dashboard on
> a shared screen. It is **not** strong security — the page is static, so the
> check runs in your browser and a determined person could bypass it. That's
> fine here because **your real data never leaves your browser** (it's in
> `localStorage`); there's nothing sensitive in the page itself to steal.
> Because of that, **don't reuse an important password** for this — pick a
> simple passcode you don't use elsewhere.

### Changing the passcode

1. Open the Hub in a browser and open the **developer console** (F12 → Console).
2. Run: `hashPass('your-new-passcode')` and copy the short string it prints.
3. In `public/life-hub.html`, find `var PASS_HASH = "...";` and replace the value
   with what you copied. Save, commit, redeploy.

(Your plaintext passcode is never stored anywhere — only this one-way hash is.)

## Features

- **Today** — the 1–3 things worth doing now (urgent fines first).
- **All areas** — fines, bills & debts, weekly money review, your goals, life admin.
- **What's left** — every open item, urgency-sorted, filterable.
- **Calendar** — everything with a date, grouped (overdue / 7 days / month / later).
- **🅿️ Fine reminders** — each fine has **📅** (download a calendar `.ics` for the
  pay-by date, with a 3-day-ahead alert) and **✉️** (open a pre-filled challenge
  email). The Calendar tab also has a **weekly money-review** `.ics`.
- **🙈 Hide amounts** — masks all money figures for using the Hub in public.
- **Goals** — add/check/delete your own goals; they feed the progress ring.

## Back up your data (important)

Because data lives only in this browser, use **⬇ Export backup** (in *Your data
& privacy*) now and then to save a JSON copy somewhere safe. Restore it on any
device with **⬆ Import backup**.

## Your plan

The Hub links to your personal plan, **`public/serhat-plan.html`** — a 12-month
"stabilise → land a role → grow income" plan you can revisit monthly.
