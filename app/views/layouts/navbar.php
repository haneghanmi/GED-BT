<nav style="background:#004a99; color:white; padding:15px 25px; display:flex; justify-content:space-between; align-items:center; font-family: Arial, sans-serif;">
    <strong>Banque de Tunisie - GED</strong>

    <div style="display:flex; gap:20px; align-items: center;">
        <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="/GED-BT/app/views/auth/login.php" style="color:white; text-decoration:none;">Login</a>
            <a href="/GED-BT/app/views/auth/register.php" style="color:white; text-decoration:none;">Register</a>
        <?php else: ?>
            <span style="font-size: 0.9em; opacity: 0.9;">👤 <?php echo htmlspecialchars($_SESSION['email']); ?></span>
            <a href="/GED-BT/app/views/dashboard/select-module.php" style="color:white; text-decoration:none;">Modules</a>
            <a href="/GED-BT/app/controllers/AuthController.php?action=logout" style="color:#ffcc00; text-decoration:none; font-weight:bold;">Logout</a>
        <?php endif; ?>
    </div>
</nav>