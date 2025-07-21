function setRole(role)
{ document.querySelectorAll(".account-section").forEach(sec => { sec.style.display = "none"; });
const section = document.getElementById("content-" + role);
if (section) { section.style.display = "block";
    document.getElementById("welcome-msg").textContent = `Bienvenue ${role}!`;
} }