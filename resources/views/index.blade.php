<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth Studio &mdash; Secure Authentication System</title>
    <meta name="description" content="A secure, modern authentication system with email & password sign-in, social OAuth, password recovery, and two-step verification.">
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/auth-logo.svg') }}">
    <link href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ $assetVersion }}">
    <style>
        :root {
            --ls-bg: #0b1020;
            --ls-card: #ffffff;
            --ls-ink: #0f172a;
            --ls-muted: #64748b;
            --ls-primary: #4f46e5;
            --ls-primary-2: #7c3aed;
            --ls-ring: rgba(79, 70, 229, .18);
        }
        body { background: #f6f7fb; color: var(--ls-ink); }
        .ls-hero {
            position: relative;
            overflow: hidden;
            background: radial-gradient(1200px 600px at 80% -10%, #312e81 0%, transparent 60%),
                        linear-gradient(135deg, #0b1020 0%, #1e1b4b 55%, #312e81 100%);
            color: #fff;
            padding: 96px 0 120px;
        }
        .ls-hero::after {
            content: "";
            position: absolute; inset: auto 0 -1px 0; height: 80px;
            background: linear-gradient(to bottom, transparent, #f6f7fb);
        }
        .ls-eyebrow {
            display: inline-flex; align-items: center; gap: 8px;
            font-size: .8rem; letter-spacing: .08em; text-transform: uppercase;
            color: #c7d2fe; background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.16);
            padding: 6px 14px; border-radius: 999px; margin-bottom: 22px;
        }
        .ls-hero h1 { font-size: clamp(2.1rem, 4vw, 3.4rem); font-weight: 800; line-height: 1.08; max-width: 18ch; }
        .ls-hero p.lead { color: #cbd5e1; font-size: 1.12rem; max-width: 52ch; margin-top: 18px; }
        .ls-cta { display: flex; gap: 14px; flex-wrap: wrap; margin-top: 32px; }
        .ls-btn {
            display: inline-flex; align-items: center; gap: 10px;
            font-weight: 600; border-radius: 12px; padding: 13px 24px;
            text-decoration: none; transition: transform .15s ease, box-shadow .15s ease;
        }
        .ls-btn-primary { background: linear-gradient(135deg, var(--ls-primary), var(--ls-primary-2)); color: #fff; box-shadow: 0 10px 30px rgba(79,70,229,.45); }
        .ls-btn-primary:hover { transform: translateY(-2px); box-shadow: 0 16px 40px rgba(79,70,229,.55); color:#fff; }
        .ls-btn-ghost { background: rgba(255,255,255,.08); color: #fff; border: 1px solid rgba(255,255,255,.2); }
        .ls-btn-ghost:hover { background: rgba(255,255,255,.16); color:#fff; }
        .ls-hero-stats { display: flex; gap: 36px; margin-top: 48px; flex-wrap: wrap; }
        .ls-hero-stats div strong { display:block; font-size: 1.6rem; font-weight: 800; }
        .ls-hero-stats div span { color:#a5b4fc; font-size:.9rem; }

        .ls-section { padding: 80px 0; }
        .ls-section h2 { font-size: clamp(1.6rem, 3vw, 2.3rem); font-weight: 800; }
        .ls-section .section-sub { color: var(--ls-muted); max-width: 56ch; margin: 12px auto 0; }
        .ls-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 22px; margin-top: 48px; }
        .ls-card {
            background: var(--ls-card); border: 1px solid #eef0f6; border-radius: 18px;
            padding: 28px; box-shadow: 0 8px 30px rgba(15,23,42,.05);
            transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
        }
        .ls-card:hover { transform: translateY(-4px); box-shadow: 0 18px 50px rgba(15,23,42,.10); border-color: #e0e3f0; }
        .ls-ico {
            width: 52px; height: 52px; border-radius: 14px; display: grid; place-items: center;
            font-size: 1.4rem; color: #fff; margin-bottom: 18px;
            background: linear-gradient(135deg, var(--ls-primary), var(--ls-primary-2));
        }
        .ls-card h3 { font-size: 1.15rem; font-weight: 700; }
        .ls-card p { color: var(--ls-muted); margin: 8px 0 0; font-size: .96rem; }

        .ls-dash {
            background: var(--ls-card); border: 1px solid #eef0f6; border-radius: 20px;
            padding: 32px; box-shadow: 0 18px 50px rgba(15,23,42,.08); max-width: 720px; margin: -80px auto 0;
            position: relative; z-index: 2;
        }
        .ls-dash-head { display:flex; align-items:center; gap:18px; }
        .ls-avatar {
            width: 64px; height: 64px; border-radius: 50%; display:grid; place-items:center;
            font-weight:700; font-size:1.4rem; color:#fff; overflow:hidden;
            background: linear-gradient(135deg, var(--ls-primary), var(--ls-primary-2));
        }
        .ls-avatar img { width:100%; height:100%; object-fit:cover; }
        .ls-dash-actions { display:flex; gap:12px; flex-wrap:wrap; margin-top:24px; }
        .ls-chip { display:inline-flex; align-items:center; gap:8px; background:#eef2ff; color:var(--ls-primary); border-radius:999px; padding:6px 14px; font-size:.85rem; font-weight:600; }
        @media (max-width: 575px){ .ls-hero{padding:72px 0 100px;} }
    </style>
</head>
<body>
    @include('partials.header')

    <main>
        <section class="ls-hero">
            <div class="container">
                <span class="ls-eyebrow"><i class="bi bi-shield-lock-fill"></i> Secure Authentication</span>
                <h1>Sign in once. Stay protected everywhere.</h1>
                <p class="lead">A complete, production-ready login system: email &amp; password accounts, Google &amp; Microsoft OAuth, email password recovery, and two-step verification.</p>

                @if($currentUser ?? false)
                    <div class="ls-cta">
                        <a class="ls-btn ls-btn-primary" href="/profile"><i class="bi bi-person-circle"></i> Go to your profile</a>
                        <a class="ls-btn ls-btn-ghost" href="/settings"><i class="bi bi-gear"></i> Security settings</a>
                    </div>
                @else
                    <div class="ls-cta">
                        <a class="ls-btn ls-btn-primary" href="/signup"><i class="bi bi-rocket-takeoff"></i> Create your account</a>
                        <a class="ls-btn ls-btn-ghost" href="/signin"><i class="bi bi-box-arrow-in-right"></i> Sign in</a>
                    </div>
                @endif

                <div class="ls-hero-stats">
                    <div><strong>2</strong><span>OAuth providers</span></div>
                    <div><strong>2FA</strong><span>Two-step verification</span></div>
                    <div><strong>0&nbsp;DB</strong><span>File-based storage</span></div>
                </div>
            </div>
        </section>

        @if($currentUser ?? false)
            @php
                $dashName = $currentUser['name'] ?? $currentUser['email'] ?? 'Account';
                $dashInitials = collect(explode(' ', trim($dashName)))->filter()->take(2)->map(fn ($p) => strtoupper(substr($p, 0, 1)))->implode('') ?: 'U';
            @endphp
            <div class="container">
                <div class="ls-dash">
                    <div class="ls-dash-head">
                        <span class="ls-avatar">
                            {{ $dashInitials }}
                            @if(!empty($currentUser['avatar']))<img src="{{ $currentUser['avatar'] }}" alt="" onerror="this.remove()">@endif
                        </span>
                        <div>
                            <h2 class="h4 mb-1">Welcome back, {{ $dashName }}</h2>
                            <span class="ls-chip"><i class="bi bi-patch-check"></i> {{ ucfirst($currentUser['provider'] ?? 'local') }} account</span>
                            @if(!empty($currentUser['two_step_enabled']))
                                <span class="ls-chip"><i class="bi bi-shield-check"></i> Two-step on</span>
                            @endif
                        </div>
                    </div>
                    <div class="ls-dash-actions">
                        <a class="ls-btn ls-btn-primary" href="/profile"><i class="bi bi-person"></i> Edit profile</a>
                        <a class="ls-btn ls-btn-ghost" style="color:var(--ls-ink);border-color:#e2e5f0;background:#f8f9fc;" href="/settings"><i class="bi bi-gear"></i> Settings</a>
                        <a class="ls-btn ls-btn-ghost" style="color:#dc2626;border-color:#fecaca;background:#fef2f2;" href="/signout"><i class="bi bi-box-arrow-right"></i> Sign out</a>
                    </div>
                </div>
            </div>
        @endif

        <section class="ls-section">
            <div class="container text-center">
                <h2>Everything a modern login needs</h2>
                <p class="section-sub">Built on Laravel with secure password hashing, CSRF protection, and session-based authentication.</p>
                <div class="ls-grid text-start">
                    <article class="ls-card">
                        <div class="ls-ico"><i class="bi bi-envelope-lock"></i></div>
                        <h3>Email &amp; Password</h3>
                        <p>Register and sign in with hashed passwords using PHP's secure bcrypt-based hashing.</p>
                    </article>
                    <article class="ls-card">
                        <div class="ls-ico"><i class="bi bi-google"></i></div>
                        <h3>Social OAuth</h3>
                        <p>One-click sign-in with Google and Microsoft via Laravel Socialite, ready to extend.</p>
                    </article>
                    <article class="ls-card">
                        <div class="ls-ico"><i class="bi bi-shield-lock"></i></div>
                        <h3>Two-Step Verification</h3>
                        <p>Optional 6-digit verification code after sign-in for an extra layer of account security.</p>
                    </article>
                    <article class="ls-card">
                        <div class="ls-ico"><i class="bi bi-key"></i></div>
                        <h3>Password Recovery</h3>
                        <p>Forgot password flow with emailed verification codes and secure, expiring reset tokens.</p>
                    </article>
                    <article class="ls-card">
                        <div class="ls-ico"><i class="bi bi-person-gear"></i></div>
                        <h3>Profile &amp; Settings</h3>
                        <p>Manage display name, avatar, contact details, email, and security from one place.</p>
                    </article>
                    <article class="ls-card">
                        <div class="ls-ico"><i class="bi bi-hdd-stack"></i></div>
                        <h3>Zero-Config Storage</h3>
                        <p>Accounts persist to a JSON store with file locking &mdash; no database setup required.</p>
                    </article>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')
    <script src="{{ asset('vendor/bootstrap/bootstrap.bundle.min.js') }}?v={{ $assetVersion }}"></script>
</body>
</html>

