var sidebar = document.getElementById("sidebar");
sidebar.className = "sidebarDefault";
function toggleSidebar() {
  if (sidebar.className == "sidebarClose") {
    openSidebar();
  } else if (sidebar.className == "sidebarOpen") {
    closeSidebar();
  } else  {
    openSidebar();
  }
}

function closeSidebar() {
  sidebar.className = "sidebarClose";
  sidebarToggleButton.className = "sidebarToggleClosed";

}

function openSidebar() {
  sidebar.className = "sidebarOpen";
  sidebarToggleButton.className = "sidebarToggleOpen";
}
