<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="Auth Studio authentication">
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/auth-logo.svg') }}">
    <link href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}?v={{ $assetVersion }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ $assetVersion }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}?v={{ $assetVersion }}">
</head>
<body class="auth-body auth-{{ $mode }}">
    <header class="site-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand brand-mark" href="/">
                    <img class="brand-logo" src="{{ asset('img/auth-logo.svg') }}" alt="Auth Studio logo">
                    <span>Auth Studio</span>
                </a>
                <div class="ms-auto">
                    @if($mode === 'signin')
                        <a class="nav-link nav-signin d-inline-block" href="/signup">Create account</a>
                    @else
                        <a class="nav-link nav-signin d-inline-block" href="/signin">Sign in</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <main class="auth-shell">
        <div class="auth-card">
            <section class="auth-showcase">
                <span class="auth-badge">Secure by design</span>
                <h1>One account, signed in everywhere with confidence.</h1>
                <p>
                    Email &amp; password or social sign-in, password recovery, and optional
                    two-step verification &mdash; all in a clean, modern authentication flow.
                </p>
                <div class="showcase-visual">
                    <div class="orb orb-a"></div>
                    <div class="orb orb-b"></div>
                    <div class="showcase-panel panel-large">
                        <span class="panel-label">Single Sign-On</span>
                        <strong>Google &amp; Microsoft</strong>
                        <small>OAuth 2.0 ready</small>
                    </div>
                    <div class="showcase-panel panel-small">
                        <span class="panel-label">Protection</span>
                        <strong>Two-step verification</strong>
                    </div>
                    <div class="showcase-panel panel-mini">
                        <span class="panel-label">Recovery</span>
                        <strong>Email reset codes</strong>
                    </div>
                </div>
            </section>

            <section class="auth-form-wrap">
                <div class="auth-form-head">
                    <span class="auth-eyebrow">{{ $mode === 'signin' ? 'Sign In' : 'Sign Up' }}</span>
                    <h2>{{ $heading }}</h2>
                    <p>{{ $subheading }}</p>
                </div>

                <form class="auth-form" action="{{ $mode === 'signup' ? '/signup' : '/signin' }}" method="post" autocomplete="{{ $mode === 'signup' ? 'off' : 'on' }}">
                    @csrf
                    @if($mode === 'signup')
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="form-label" for="first_name">First Name</label>
                            <input class="form-control auth-input" id="first_name" name="first_name" type="text" placeholder="First Name">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="last_name">Last Name</label>
                            <input class="form-control auth-input" id="last_name" name="last_name" type="text" placeholder="Last Name">
                        </div>
                    </div>
                    @endif

                    <div class="mt-3">
                        <label class="form-label" for="email">Email Address</label>
                        <input class="form-control auth-input" id="email" name="email" type="email" placeholder="you@example.com" autocomplete="{{ $mode === 'signup' ? 'off' : 'username' }}" value="{{ $mode === 'signup' ? '' : old('email') }}" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label" for="password">Password</label>
                        <div class="auth-password-field">
                            <input class="form-control auth-input" id="password" name="password" type="password" placeholder="Enter your password" autocomplete="{{ $mode === 'signup' ? 'new-password' : 'current-password' }}" value="" required>
                            <button type="button" class="auth-eye">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="auth-row">
                        <label class="auth-check">
                            <input type="checkbox" name="{{ $mode === 'signin' ? 'remember' : 'terms' }}" value="1">
                            <span>{{ $mode === 'signin' ? 'Remember me' : 'I agree to the Terms and Privacy Policy' }}</span>
                        </label>
                        @if($mode === 'signin')
                        <a class="auth-inline-link" href="/forgot-password">Forgot password?</a>
                        @endif
                    </div>

                    <button class="btn auth-submit" type="submit">{{ $primaryAction }}</button>

                    <div class="auth-divider"><span>or continue with</span></div>

                    <div class="auth-socials">
                        <button type="submit" class="btn auth-social-btn" form="google-auth-form"><i class="bi bi-google"></i> Google</button>
                        <button type="submit" class="btn auth-social-btn" form="microsoft-auth-form"><i class="bi bi-microsoft"></i> Microsoft</button>
                    </div>
                    @if($authMessage)
                    <div class="auth-social-status" role="alert" aria-live="assertive">
                        <i class="bi bi-exclamation-circle"></i>
                        <span>{{ $authMessage }}</span>
                    </div>
                    @endif

                    <p class="auth-bottom-text">
                        {{ $alternateText }}
                        <a href="{{ $alternateHref }}">{{ $alternateLabel }}</a>
                    </p>
                </form>
                <form id="google-auth-form" action="/auth/google" method="get">
                    <input type="hidden" name="next" value="{{ $mode }}">
                </form>
                <form id="microsoft-auth-form" action="/auth/microsoft" method="get">
                    <input type="hidden" name="next" value="{{ $mode }}">
                </form>
            </section>
        </div>
    </main>

    <footer class="auth-footer">
        <div class="container auth-footer-inner">
            <span>&copy; 2026 Auth Studio</span>
            <div class="auth-footer-links">
                <a href="/">Home</a>
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
                <a href="#">Support</a>
            </div>
        </div>
    </footer>

    <script src="{{ asset('vendor/bootstrap/bootstrap.bundle.min.js') }}?v={{ $assetVersion }}"></script>
    <script>
        document.querySelectorAll(".auth-eye").forEach((button) => {
            button.addEventListener("click", () => {
                const input = button.closest(".auth-password-field")?.querySelector("input");
                const icon = button.querySelector("i");
                if (!input) {
                    return;
                }

                const isPassword = input.type === "password";
                input.type = isPassword ? "text" : "password";
                icon?.classList.toggle("bi-eye", !isPassword);
                icon?.classList.toggle("bi-eye-slash", isPassword);
            });
        });
    </script>
</body>
</html>

