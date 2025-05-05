document.querySelectorAll('.sidebar a').forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default anchor behavior
        const contentArea = document.getElementById('content');
        const section = this.getAttribute('href').substring(1); // Get the section name

        // Update content based on the selected section
        switch (section) {
            case 'home':
                contentArea.innerHTML = '<h2>Home</h2><p>Welcome to the home section.</p>';
                break;
            case 'reports':
                contentArea.innerHTML = '<h2>Reports</h2><p>Here are your reports.</p>';
                break;
            case 'users':
                contentArea.innerHTML = '<h2>Users</h2><p>List of users will be displayed here.</p>';
                break;
            case 'temp-users':
                contentArea.innerHTML = '<h2>Temp Users</h2><p>List of temporary users will be displayed here.</p>';
                break;
            case 'total-users':
                contentArea.innerHTML = '<h2>Total Number of Users</h2><p>Total count of users will be displayed here.</p>';
                break;
            case 'logout':
                contentArea.innerHTML = '<h2>Logout</h2><p>You have been logged out.</p>';
                break;
            default:
                contentArea.innerHTML = '<h2>Welcome to the Dashboard</h2><p>Select an option from the sidebar to get started.</p>';
        }
    });
});
``