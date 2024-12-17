document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  const templateId = urlParams.get("template");

  if (templateId) {
    loadTemplate(templateId);
  }

  document.getElementById("saveButton").addEventListener("click", function () {
    const designCode = document.getElementById("designCode").value;
    localStorage.setItem("designCode", designCode);
    alert("Template saved!");
  });

  document.getElementById("renderLink").addEventListener("click", function () {
    window.location.href = "render.html";
  });

  if (window.location.pathname.endsWith("render.html")) {
    const designCode = localStorage.getItem("designCode");
    document.getElementById("renderedDesign").innerHTML = designCode;
  }
});

function loadTemplate(templateId) {
  // Ini adalah contoh statis, sebaiknya gunakan AJAX untuk mengambil template dinamis
  const templates = {
    1: '<div style="background-color: #f0f0f0; padding: 20px;">Template 1 Content</div>',
    2: '<div style="background-color: #e0e0e0; padding: 20px;">Template 2 Content</div>',
  };
  document.getElementById("designCode").value =
    templates[templateId] || "Template not found";
}
