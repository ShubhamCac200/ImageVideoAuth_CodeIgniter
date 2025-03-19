<nav style="
    background-color: #222;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
">
    <!-- Left Side: Logo & Links -->
    <div style="display: flex; align-items: center; gap: 20px;">
        <a href="/dashboard" style="color: white; font-size: 18px; text-decoration: none; font-weight: bold;">Shubham_Project</a>
        <a href="/dashboard" style="color: white; text-decoration: none; font-size: 16px; transition: 0.3s;">Dashboard</a>
        <a href="/search" style="color: white; text-decoration: none; font-size: 16px; transition: 0.3s;">Search</a>
    </div>

    <!-- Right Side: Profile Picture & Logout -->
    <div style="display: flex; align-items: center; gap: 15px;">
        <a href="/profile" style="display: flex; align-items: center; text-decoration: none;">
            <img src="/uploads/<?= session()->get('profile_picture') ?>" width="40" height="40" 
                style="border-radius: 50%; border: 2px solid white; cursor: pointer;">
        </a>
        <a href="/logout" style="
            color: white; 
            text-decoration: none; 
            font-size: 16px; 
            background: #ff4d4d; 
            padding: 8px 15px; 
            border-radius: 5px; 
            transition: 0.3s;">
            Logout
        </a>
    </div>
</nav>
