# Life Admin

A private, version-controlled system for getting your money and life back under
control — starting with the urgent stuff: **cash flow and parking fines.**

> ⚠️ **This folder is intentionally *not* wired into the website.** It lives in
> the repo so it's backed up and editable from anywhere, but it is never
> rendered or routed by the site. Keep it that way. See
> [`PRIVACY.md`](./PRIVACY.md) before you put any real numbers in here.

## 🧠 Your Life Hub (the interactive "main brain")

These markdown files are the **deep reference**. The day-to-day **dashboard** is
[`../public/life-hub.html`](../public/life-hub.html) — a single self-contained
page you open in any browser (double-click the file, or drag it into a browser
tab) on your laptop or phone. It gives you a 60-second check-in, an overall
progress ring, your fines/bills/career in one place, and a "what's left" view.

- **Your data lives only in that browser** (localStorage) — it is never uploaded,
  never committed to git, never published. Use its **Export backup** button now
  and then to save a JSON copy somewhere safe.
- It's **local-only by design**: this repo no longer deploys anything to the
  public web, so nothing here is viewable by anyone but you.
- The Hub links to your personal plan (`serhat-plan.html`) and echoes the
  actionable parts of these trackers; the detailed templates below stay the
  source of truth for amounts, deadlines and letter drafts.

## How to use this

1. **Start here:** open [`00-start-here.md`](./00-start-here.md). It's a 30–60
   minute "stop the bleeding" triage. Do that first, today.
2. **Fill in the trackers** under [`finances/`](./finances/). They ship as
   templates with placeholder rows — replace them with your real data.
3. **Set the reminders.** [`reminders/calendar-and-email-setup.md`](./reminders/calendar-and-email-setup.md)
   tells you exactly which deadlines to put in your calendar, with ready-to-use
   email/letter drafts for contesting fines and contacting creditors.
4. **Run the weekly review** ([`finances/weekly-money-review.md`](./finances/weekly-money-review.md))
   — 15 minutes, same time each week. This is the habit that keeps you out of
   the hole once you're out.

## What's here

| File | What it's for |
|------|---------------|
| [`00-start-here.md`](./00-start-here.md) | First-session triage. Do this first. |
| [`finances/money-snapshot.md`](./finances/money-snapshot.md) | One honest picture: what's coming in, going out, owed. |
| [`finances/parking-fines.md`](./finances/parking-fines.md) | Every fine, its deadline, and pay-or-contest decision. |
| [`finances/debts-and-bills.md`](./finances/debts-and-bills.md) | All debts/bills, who's chasing, payoff order. |
| [`finances/weekly-money-review.md`](./finances/weekly-money-review.md) | The 15-min weekly habit. |
| [`reminders/calendar-and-email-setup.md`](./reminders/calendar-and-email-setup.md) | Deadline reminders + email drafts. |
| [`PRIVACY.md`](./PRIVACY.md) | Read before adding real personal/financial data. |

## The one rule

**Deadlines beat amounts.** A small fine that's about to escalate is more urgent
than a large bill that isn't. Sort by *what gets worse soonest*, not by size.

---
*This is an organizational template, not financial or legal advice. For debt you
genuinely can't pay, talk to a free, regulated debt advice service (e.g. in the
UK: National Debtline 0808 808 4000, or StepChange — both free and confidential).*
