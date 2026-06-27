# Privacy — read before adding real data

This folder lives inside a Git repository for your **public** portfolio website.
That's convenient (backed up, versioned, editable anywhere) but it means you must
be deliberate about real personal data.

## The risks, plainly

- **Git history is forever.** If you commit a file with your bank balance, then
  delete it later, the number still exists in the repo history. Removing it
  properly means rewriting history.
- **Pushing is publishing-ish.** If this repo's remote is public (e.g. a public
  GitHub repo), anything you push can be read by others.
- **The website could render it.** This folder is deliberately *not* wired into
  any route, but don't move these files into `templates/markdown/` (that folder
  *is* used by the site).

## Recommended setup (pick one)

**Option A — keep real data out of Git entirely (simplest, safest).**
Add the real-data files to `.gitignore` so you can keep them locally but never
commit them. A ready-made ignore block:

```gitignore
# Personal life-admin data — never commit
life-admin/finances/*.local.md
```

Then save your real trackers as e.g. `parking-fines.local.md` (copy the template,
add `.local` before `.md`). The templates stay in Git; your real numbers don't.

**Option B — commit, but only to a private repo.**
Only do this if you've confirmed the remote is **private**. Check with:

```bash
git remote -v
```

…then verify that repo's visibility in your Git host's settings. If you're not
100% sure it's private, use Option A.

## If you've already committed something sensitive

1. Stop pushing.
2. Remove the file and commit the removal.
3. To purge it from history, use `git filter-repo` (or the BFG Repo-Cleaner) and
   force-push. Ask me and I'll walk you through it for your exact case.

---
**Default assumption in these templates:** placeholders only. Replace `[...]`
markers with real values *after* you've chosen Option A or B above.
