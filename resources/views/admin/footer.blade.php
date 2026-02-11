
        </div>
        <!-- Admin Content End -->
    </main>
    <!-- Main End -->

    <!-- JavaScript -->
    <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Admin Scripts -->
    <script>
        // Sidebar Toggle
        const sidebar = document.getElementById('adminSidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                if (window.innerWidth <= 992) {
                    document.body.classList.toggle('sidebar-open');
                } else {
                    sidebar.classList.toggle('collapsed');
                }
            });
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', () => {
                document.body.classList.remove('sidebar-open');
            });
        }

        // Close sidebar on window resize to desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth > 992) {
                document.body.classList.remove('sidebar-open');
            }
        });

        // Profile Dropdown Toggle
        const profileToggle = document.getElementById('profileDropdownToggle');
        const profileDropdown = document.getElementById('profileDropdown');

        if (profileToggle && profileDropdown) {
            profileToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                profileDropdown.classList.toggle('show');
            });

            document.addEventListener('click', (e) => {
                if (!profileToggle.contains(e.target)) {
                    profileDropdown.classList.remove('show');
                }
            });
        }

        // Auto-dismiss alerts after 5 seconds
        document.querySelectorAll('.admin-alert').forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-10px)';
                setTimeout(() => alert.remove(), 300);
            }, 5000);
        });

        // Responsive table data labels
        document.querySelectorAll('.admin-table').forEach(table => {
            const headers = Array.from(table.querySelectorAll('th')).map(th => th.textContent.trim());
            table.querySelectorAll('tbody tr').forEach(row => {
                row.querySelectorAll('td').forEach((cell, index) => {
                    if (headers[index]) {
                        cell.setAttribute('data-label', headers[index]);
                    }
                });
            });
        });
    </script>

    @stack('scripts')
</body>

</html>