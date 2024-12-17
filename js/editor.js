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

  document.getElementById("applyButton").addEventListener("click", function () {
    applyChanges();
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
  const templates = {
    1: '<div style="background-color: #f0f0f0; padding: 20px;" id="editable">Template 1 Content</div>',
    2: '<div style="background-color: #e0e0e0; padding: 20px;" id="editable">Template 2 Content</div>',
  };
  document.getElementById("designCode").value =
    templates[templateId] || "Template not found";
}

function applyChanges() {
  const textColor = document.getElementById("textColor").value;
  const bgColor = document.getElementById("bgColor").value;
  const fontSize = document.getElementById("fontSize").value;
  const fontFamily = document.getElementById("fontFamily").value;
  const textContent = document.getElementById("textContent").value;

  const editableDiv = document.getElementById("editable");

  editableDiv.style.color = textColor;
  editableDiv.style.backgroundColor = bgColor;
  editableDiv.style.fontSize = `${fontSize}px`;
  editableDiv.style.fontFamily = fontFamily;
  editableDiv.textContent = textContent;

  document.getElementById("designCode").value = editableDiv.outerHTML;
}
