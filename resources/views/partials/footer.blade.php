<footer class="site-footer">
    <div class="container footer-shell">
        <div class="footer-brand-block">
            <a class="footer-brand" href="/">
                <img class="brand-logo" src="{{ asset('img/auth-logo.svg') }}" alt="Auth Studio logo">
                <span>Auth Studio</span>
            </a>
            <p class="mb-0">A secure, modern authentication system with email &amp; password sign-in, social OAuth, password recovery, and two-step verification.</p>
        </div>
        <div class="footer-links-grid">
            <div>
                <span class="footer-title">Account</span>
                <div class="footer-links">
                    @if($currentUser ?? false)
                        <a href="/profile">Profile</a>
                        <a href="/settings">Settings</a>
                        <a href="/signout">Sign Out</a>
                    @else
                        <a href="/signin">Sign In</a>
                        <a href="/signup">Sign Up</a>
                        <a href="/forgot-password">Forgot Password</a>
                    @endif
                </div>
            </div>
            <div>
                <span class="footer-title">Security</span>
                <div class="footer-links">
                    <a href="/settings">Two-step verification</a>
                    <a href="/signin">Social sign-in</a>
                </div>
            </div>
        </div>
        <div class="footer-socials">
            <a href="#" class="footer-social-link" aria-label="Facebook"><span class="social-tooltip">Facebook</span><i class="bi bi-facebook"></i></a>
            <a href="#" class="footer-social-link" aria-label="Instagram"><span class="social-tooltip">Instagram</span><i class="bi bi-instagram"></i></a>
            <a href="#" class="footer-social-link" aria-label="Twitter"><span class="social-tooltip">Twitter</span><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="footer-social-link" aria-label="LinkedIn"><span class="social-tooltip">LinkedIn</span><i class="bi bi-linkedin"></i></a>
        </div>
    </div>
    <div class="container footer-bottom">
        <span>&copy; 2026 Auth Studio</span>
        <div class="footer-bottom-links">
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
            <a href="#">Support</a>
        </div>
    </div>
</footer>

