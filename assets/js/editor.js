// Inisialisasi canvas
const canvas = new fabric.Canvas("editorCanvas");
let zoomLevel = 1; // Tingkat zoom awal (1 = normal)
let clipboard = []; // Array untuk menyimpan objek yang disalin
let history = []; // Menyimpan riwayat canvas
let redoHistory = []; // Menyimpan riwayat yang telah di-undo untuk redo
let currentHistoryIndex = -1; // Menunjukkan indeks riwayat saat ini

canvas.backgroundColor = "#fff";
canvas.renderAll();

// Default options
canvas.isDrawingMode = false;
canvas.freeDrawingBrush = new fabric.PencilBrush(canvas);
canvas.freeDrawingBrush.color = "#000000";
canvas.freeDrawingBrush.width = 2;
canvas.freeDrawingBrush.shadow = new fabric.Shadow({
  color: "#000000",
  blur: 0,
  offsetX: 0,
  offsetY: 0,
});

// Pattern Brushes
let vLinePatternBrush = new fabric.PatternBrush(canvas);
vLinePatternBrush.getPatternSrc = function () {
  let patternCanvas = document.createElement("canvas");
  patternCanvas.width = 10;
  patternCanvas.height = 10;
  let ctx = patternCanvas.getContext("2d");
  ctx.strokeStyle = this.color;
  ctx.lineWidth = 5;
  ctx.beginPath();
  ctx.moveTo(0, 5);
  ctx.lineTo(10, 5);
  ctx.stroke();
  return patternCanvas;
};

let hLinePatternBrush = new fabric.PatternBrush(canvas);
hLinePatternBrush.getPatternSrc = function () {
  let patternCanvas = document.createElement("canvas");
  patternCanvas.width = 10;
  patternCanvas.height = 10;
  let ctx = patternCanvas.getContext("2d");
  ctx.strokeStyle = this.color;
  ctx.lineWidth = 5;
  ctx.beginPath();
  ctx.moveTo(5, 0);
  ctx.lineTo(5, 10);
  ctx.stroke();
  return patternCanvas;
};

let squarePatternBrush = new fabric.PatternBrush(canvas);
squarePatternBrush.getPatternSrc = function () {
  let patternCanvas = document.createElement("canvas");
  patternCanvas.width = 12;
  patternCanvas.height = 12;
  let ctx = patternCanvas.getContext("2d");
  ctx.fillStyle = this.color;
  ctx.fillRect(0, 0, 10, 10);
  return patternCanvas;
};

// Update brush settings
function updateBrushSettings() {
  const color = document.getElementById("drawingColor").value;
  const shadowColor = document.getElementById("drawingShadowColor").value;
  const lineWidth = parseInt(document.getElementById("lineWidth").value, 10);
  const shadowWidth = parseInt(
    document.getElementById("shadowWidth").value,
    10
  );
  const shadowOffset = parseInt(
    document.getElementById("shadowOffset").value,
    10
  );

  if (canvas.freeDrawingBrush) {
    canvas.freeDrawingBrush.color = color;
    canvas.freeDrawingBrush.width = lineWidth;
    canvas.freeDrawingBrush.shadow = new fabric.Shadow({
      color: shadowColor,
      blur: shadowWidth,
      offsetX: shadowOffset,
      offsetY: shadowOffset,
    });
  }
}

// Checkbox untuk aktivasi menggambar
document
  .getElementById("activateDrawing")
  .addEventListener("change", function () {
    canvas.isDrawingMode = this.checked;
  });

// Ganti mode menggambar
document.getElementById("drawingMode").addEventListener("change", function () {
  const mode = this.value;

  switch (mode) {
    case "pencil":
      canvas.freeDrawingBrush = new fabric.PencilBrush(canvas);
      break;
    case "circle":
      canvas.freeDrawingBrush = new fabric.CircleBrush(canvas);
      break;
    case "spray":
      canvas.freeDrawingBrush = new fabric.SprayBrush(canvas);
      break;
    default:
      canvas.freeDrawingBrush = new fabric.PencilBrush(canvas);
      break;
  }

  updateBrushSettings();
});

// Event untuk memperbarui pengaturan
document
  .getElementById("drawingColor")
  .addEventListener("input", updateBrushSettings);
document
  .getElementById("drawingShadowColor")
  .addEventListener("input", updateBrushSettings);
document
  .getElementById("lineWidth")
  .addEventListener("input", updateBrushSettings);
document
  .getElementById("shadowWidth")
  .addEventListener("input", updateBrushSettings);
document
  .getElementById("shadowOffset")
  .addEventListener("input", updateBrushSettings);

// Clear canvas
document.getElementById("clearCanvas").addEventListener("click", function () {
  canvas.clear();
  canvas.backgroundColor = "#fff";
  canvas.renderAll();
});
// akhir lukis

// awal text

const textInput = document.getElementById("textInput");
const addTextBtn = document.getElementById("addTextBtn");
const textFont = document.getElementById("textFont");
const textColor = document.getElementById("textColor");
const textSize = document.getElementById("textSize");
const textSizeValue = document.getElementById("textSizeValue");

// Daftar font
const fonts = [
  "Arial",
  "Verdana",
  "Helvetica",
  "Times New Roman",
  "Georgia",
  "Courier New",
  "Lucida Console",
  "Tahoma",
  "Trebuchet MS",
  "Impact",
  "Comic Sans MS",
  "Monaco",
  "Brush Script MT",
  "Caveat",
  "Dancing Script",
  "Pacifico",
  "Roboto",
  "Oswald",
  "Lobster",
  "Raleway",
  "Montserrat",
  "Lora",
  "Merriweather",
  "Ubuntu",
  "Poppins",
  "PT Sans",
  "Playfair Display",
  "Nunito",
  "Open Sans",
  "Quicksand",
  "Source Sans Pro",
  "Lato",
  "Fira Sans",
  "Kanit",
  "Overpass",
  "Prompt",
  "Righteous",
  "Spectral",
  "Titan One",
  "Zilla Slab",
  "Balsamiq Sans",
  "Fredericka the Great",
  "Gloria Hallelujah",
  "Amatic SC",
  "Architects Daughter",
  "Cookie",
  "Indie Flower",
  "Permanent Marker",
];

// Mengisi daftar font ke dropdown dengan gaya sesuai font
fonts.forEach((font) => {
  const option = document.createElement("option");
  option.value = font;
  option.textContent = font;
  option.style.fontFamily = font; // Terapkan gaya font ke opsi
  textFont.appendChild(option);
});

// Fungsi untuk menambahkan teks ke canvas
addTextBtn.addEventListener("click", () => {
  const text = new fabric.IText(textInput.value || "Teks Baru", {
    left: 100,
    top: 100,
    fontSize: parseInt(textSize.value, 10),
    fill: textColor.value,
    fontFamily: textFont.value,
  });
  canvas.add(text);
  canvas.setActiveObject(text); // Membuat teks yang baru ditambahkan aktif untuk diedit
  textInput.value = ""; // Reset input teks setelah menambahkan
});

// Fungsi untuk mengubah font teks
textFont.addEventListener("change", () => {
  const activeObject = canvas.getActiveObject();
  if (activeObject && activeObject.type === "i-text") {
    activeObject.set({ fontFamily: textFont.value });
    canvas.renderAll();
  }
});

// Fungsi untuk mengubah warna teks
textColor.addEventListener("input", () => {
  const activeObject = canvas.getActiveObject();
  if (activeObject && activeObject.type === "i-text") {
    activeObject.set({ fill: textColor.value });
    canvas.renderAll();
  }
});

// Fungsi untuk mengubah ukuran font teks
textSize.addEventListener("input", () => {
  const activeObject = canvas.getActiveObject();
  textSizeValue.textContent = textSize.value; // Update ukuran di UI
  if (activeObject && activeObject.type === "i-text") {
    activeObject.set({ fontSize: parseInt(textSize.value, 10) });
    canvas.renderAll();
  }
});

// Event untuk mendeteksi double-click pada teks
canvas.on("mouse:dblclick", (event) => {
  const target = event.target;
  if (target && target.type === "i-text") {
    target.enterEditing(); // Memasuki mode editing
    target.selectAll(); // Memilih semua teks untuk mempermudah pengeditan
  }
});

// Event listener untuk memperbarui kontrol teks saat teks dipilih
canvas.on("selection:updated", updateTextInputs);
canvas.on("selection:created", updateTextInputs);

// Fungsi untuk sinkronisasi kontrol dengan teks yang dipilih
function updateTextInputs() {
  const activeObject = canvas.getActiveObject();
  if (activeObject && activeObject.type === "i-text") {
    textColor.value = activeObject.fill || "#000000";
    textSize.value = activeObject.fontSize || 30;
    textSizeValue.textContent = textSize.value;
  }
}

// Event untuk menghapus kontrol jika tidak ada objek yang dipilih
canvas.on("selection:cleared", () => {
  textColor.value = "#000000";
  textSize.value = 30;
  textSizeValue.textContent = 30;
});

const saveBtn = document.getElementById("saveBtn");
const saveBtnDua = document.getElementById("saveBtn2");

// Fungsi untuk menyimpan seluruh gambar dari canvas
saveBtn.addEventListener("click", () => {
  const dataURL = canvas.toDataURL({ format: "png" }); // Mengonversi canvas ke PNG
  const link = document.createElement("a");
  link.href = dataURL;
  link.download = "canvas-image.png"; // Nama file yang akan diunduh
  link.click(); // Memulai proses download
});

saveBtnDua.addEventListener("click", () => {
  const dataURL = canvas.toDataURL({ format: "png" }); // Mengonversi canvas ke PNG
  const link = document.createElement("a");
  link.href = dataURL;
  link.download = "canvas-image.png"; // Nama file yang akan diunduh
  link.click(); // Memulai proses download
});

const imageInput = document.getElementById("imageInput");
const deleteImageButton = document.getElementById("deleteImage");
const imageWidth = document.getElementById("imageWidth");
const imageHeight = document.getElementById("imageHeight");
const imageWidthValue = document.getElementById("imageWidthValue");
const imageHeightValue = document.getElementById("imageHeightValue");

// Event Listener untuk scroll pada kanvas
canvas.on("mouse:wheel", (event) => {
  if (event.e.ctrlKey) {
    // Pastikan Ctrl ditekan
    const delta = event.e.deltaY; // Arah scroll
    let zoomChange = delta < 0 ? 0.1 : -0.1; // Tentukan perubahan zoom (+ untuk zoom in, - untuk zoom out)

    if (zoomLevel + zoomChange >= 0.1 && zoomLevel + zoomChange <= 3) {
      // Batas zoom antara 0.1 dan 3
      zoomLevel += zoomChange;
    }

    // Ambil posisi pointer pada kanvas
    const pointer = canvas.getPointer(event.e); // Menentukan posisi kursor pada kanvas

    // Hitung pergeseran posisi kanvas yang diperlukan untuk zoom di titik kursor
    const zoomPointX = pointer.x;
    const zoomPointY = pointer.y;

    // Tentukan transformasi yang diperlukan untuk menjaga zoom pada titik tersebut
    const scaleX = zoomPointX * (zoomLevel / canvas.getZoom());
    const scaleY = zoomPointY * (zoomLevel / canvas.getZoom());

    // Set zoom dan sesuaikan posisi tampilan
    canvas.setZoom(zoomLevel);

    // Mengatur viewportTransform untuk menjaga posisi kursor pada titik yang sama setelah zoom
    const deltaX = scaleX - zoomPointX;
    const deltaY = scaleY - zoomPointY;
    canvas.setViewportTransform([
      zoomLevel,
      0,
      0,
      zoomLevel,
      canvas.viewportTransform[4] - deltaX,
      canvas.viewportTransform[5] - deltaY,
    ]);

    canvas.renderAll(); // Render ulang kanvas
    console.log(`Zoom Level: ${zoomLevel}`);

    // Mencegah scroll halaman
    event.e.preventDefault();
    event.e.stopPropagation();
  }
});

// Event Listener untuk Ctrl + Panah Atas/Bawah
document.addEventListener("keydown", (event) => {
  if (event.ctrlKey) {
    if (event.key === "ArrowUp") {
      // Ctrl + Panah Atas: Zoom In
      if (zoomLevel < 3) {
        // Batas maksimal zoom
        zoomLevel += 0.1;
        canvas.setZoom(zoomLevel);
        canvas.renderAll();
        console.log(`Zoom In: ${zoomLevel}`);
      }
    } else if (event.key === "ArrowDown") {
      // Ctrl + Panah Bawah: Zoom Out
      if (zoomLevel > 0.1) {
        // Batas minimal zoom
        zoomLevel -= 0.1;
        canvas.setZoom(zoomLevel);
        canvas.renderAll();
        console.log(`Zoom Out: ${zoomLevel}`);
      } else {
        console.log("Cannot zoom out further.");
      }
    }
  }
});

imageInput.addEventListener("change", (event) => {
  const file = event.target.files[0];

  if (file) {
    const reader = new FileReader();
    reader.onload = (e) => {
      fabric.Image.fromURL(e.target.result, (img) => {
        img.set({
          left: 100,
          top: 100,
          selectable: true,
        });
        canvas.add(img);
        canvas.setActiveObject(img);
        canvas.renderAll();

        // Set default slider values based on image size
        imageWidth.value = img.getScaledWidth();
        imageHeight.value = img.getScaledHeight();
        imageWidthValue.textContent = img.getScaledWidth();
        imageHeightValue.textContent = img.getScaledHeight();
      });
    };
    reader.readAsDataURL(file);
  }
});

deleteImageButton.addEventListener("click", () => {
  const selectedObject = canvas.getActiveObject();

  if (selectedObject && selectedObject.type === "image") {
    canvas.remove(selectedObject);
    canvas.renderAll();
  } else {
    alert("Pilih gambar untuk dihapus.");
  }
});

imageWidth.addEventListener("input", () => {
  const selectedObject = canvas.getActiveObject();

  if (selectedObject && selectedObject.type === "image") {
    const newWidth = parseInt(imageWidth.value, 10);
    selectedObject.scaleToWidth(newWidth);
    canvas.renderAll();
    imageWidthValue.textContent = newWidth;
  } else {
    alert("Pilih gambar untuk mengatur ukuran.");
  }
});

imageHeight.addEventListener("input", () => {
  const selectedObject = canvas.getActiveObject();

  if (selectedObject && selectedObject.type === "image") {
    const newHeight = parseInt(imageHeight.value, 10);
    selectedObject.scaleToHeight(newHeight);
    canvas.renderAll();
    imageHeightValue.textContent = newHeight;
  } else {
    alert("Pilih gambar untuk mengatur ukuran.");
  }
});

// Mendapatkan elemen input
const borderActive = document.getElementById("borderActive");
const borderColor = document.getElementById("borderColor");
const borderSize = document.getElementById("borderSize");
const borderSizeValue = document.getElementById("borderSizeValue");

// Event untuk mengaktifkan atau menonaktifkan border
borderActive.addEventListener("change", () => {
  const selectedObject = canvas.getActiveObject();
  if (selectedObject) {
    if (borderActive.checked) {
      selectedObject.set({
        stroke: borderColor.value,
        strokeWidth: parseInt(borderSize.value, 10),
      });
    } else {
      selectedObject.set({
        stroke: null, // Nonaktifkan border
        strokeWidth: 0,
      });
    }
    canvas.renderAll(); // Render ulang canvas
  } else {
    alert("Pilih sebuah shape terlebih dahulu.");
  }
});

// Event untuk mengubah warna border
borderColor.addEventListener("input", () => {
  const selectedObject = canvas.getActiveObject();
  if (selectedObject && borderActive.checked) {
    selectedObject.set({
      stroke: borderColor.value,
    });
    canvas.renderAll();
  }
});

// Event untuk mengubah ukuran border
borderSize.addEventListener("input", () => {
  const selectedObject = canvas.getActiveObject();
  borderSizeValue.textContent = borderSize.value; // Update nilai ukuran di UI
  if (selectedObject && borderActive.checked) {
    selectedObject.set({
      strokeWidth: parseInt(borderSize.value, 10),
    });
    canvas.renderAll();
  }
});

// Event untuk mendeteksi perubahan objek yang aktif di canvas
canvas.on("selection:updated", updateBorderInputs);
canvas.on("selection:created", updateBorderInputs);

// Fungsi untuk sinkronisasi input dengan objek yang dipilih
function updateBorderInputs() {
  const selectedObject = canvas.getActiveObject();
  if (selectedObject) {
    borderActive.checked = !!selectedObject.stroke; // Periksa apakah border aktif
    borderColor.value = selectedObject.stroke || "#000000";
    borderSize.value = selectedObject.strokeWidth || 0;
    borderSizeValue.textContent = borderSize.value;
  }
}

// Mendapatkan elemen input transparansi dan kontrol border
const opacitySlider = document.getElementById("opacitySlider");
const opacityValue = document.getElementById("opacityValue");

// Event untuk mengubah transparansi objek
opacitySlider.addEventListener("input", function () {
  const opacity = opacitySlider.value / 100; // Mengubah nilai slider (0-100) menjadi nilai (0-1)
  opacityValue.textContent = opacitySlider.value; // Menampilkan nilai transparansi pada UI

  const selectedObject = canvas.getActiveObject();
  if (selectedObject) {
    selectedObject.set({
      opacity: opacity, // Mengubah transparansi objek menggunakan properti opacity
    });
    canvas.renderAll(); // Render ulang kanvas
  } else {
    console.log("Tidak ada objek yang dipilih.");
  }
});

// logika tombol kopy
document.getElementById("copy").addEventListener("click", () => {
  const selectedObject = canvas.getActiveObject();
  if (selectedObject) {
    clipboard = selectedObject.clone((cloned) => {
      cloned.set({
        left: cloned.left + 10,
        top: cloned.top + 10,
      });

      clipboards = cloned;
      console.log("Object copied:", clipboards);
    });
  } else {
    console.log("No object selected for copy.");
  }
});

// logika tombol paste
document.getElementById("paste").addEventListener("click", () => {
  const selectedObject = canvas.getActiveObject();
  if (clipboards) {
    clipboards.clone((cloned) => {
      cloned.set({
        left: cloned.left + 10,
        top: cloned.top + 10,
      });

      canvas.add(cloned);
      canvas.setActiveObject(cloned);
      canvas.renderAll();

      console.log("Object pasted:", cloned);
      saveHistory(); // Simpan perubahan setelah paste
    });
  } else {
    console.log("No object to paste.");
    alert("Tidak ada objek yang disalin untuk dipaste.");
  }
});

// logika tombol cut
document.getElementById("cut").addEventListener("click", () => {
  const selectedObject = canvas.getActiveObject();
  if (selectedObject) {
    clipboard = selectedObject.clone((cloned) => {
      cloned.set({
        left: cloned.left + 10,
        top: cloned.top + 10,
      });

      clipboards = cloned;
      console.log("Object copied:", clipboards);
    });
    canvas.remove(selectedObject);
    console.log("Object cut:", selectedObject);
    saveHistory(); // Simpan perubahan setelah cut
  } else {
    console.log("No object selected for cut.");
  }
});

// logika tombol undo
document.getElementById("undo").addEventListener("click", () => {
  // Ctrl+Z: Undo
  if (currentHistoryIndex > 0) {
    redoHistory.push(history[currentHistoryIndex]); // Simpan untuk redo
    currentHistoryIndex--;

    const previousState = history[currentHistoryIndex];
    canvas.loadFromJSON(previousState, () => {
      canvas.renderAll();
      console.log("Undo: Reverted to state at index", currentHistoryIndex);
    });
  } else {
    console.log("No more history to undo.");
  }
});

// logika tombol redo
document.getElementById("redo").addEventListener("click", () => {
  // Ctrl+Y: Redo
  if (redoHistory.length > 0) {
    const redoState = redoHistory.pop();
    history.push(redoState); // Tambahkan kembali ke history
    currentHistoryIndex++;

    canvas.loadFromJSON(redoState, () => {
      canvas.renderAll();
      console.log("Redo: Reverted to state at index", currentHistoryIndex);
    });
  } else {
    console.log("No more history to redo.");
  }
});

// logika tombol naikan sheep ke lapisan paling atas canvas
document.getElementById("naikan").addEventListener("click", () => {
  const selectedObject = canvas.getActiveObject();
  if (selectedObject) {
    selectedObject.bringToFront(); // Memindahkan objek terpilih ke lapisan teratas
    canvas.renderAll(); // Merender ulang canvas agar perubahan terlihat
    console.log("Object brought to front:", selectedObject);
  } else {
    console.log("No object selected to bring to front.");
    alert("Pilih objek yang ingin dinaikkan ke atas!");
  }
});

// logika tombol turunkan sheep ke lapisan paling bawah canvas
document.getElementById("turunkan").addEventListener("click", () => {
  const selectedObject = canvas.getActiveObject();
  if (selectedObject) {
    selectedObject.sendToBack(); // Memindahkan objek terpilih ke lapisan terbawah
    canvas.renderAll(); // Merender ulang canvas agar perubahan terlihat
    console.log("Object sent to back:", selectedObject);
  } else {
  }
});

// logika tombol delate
document.getElementById("delate").addEventListener("click", () => {
  // Delete: Hapus
  const activeObjects = canvas.getActiveObjects(); // Mendapatkan semua objek yang dipilih
  if (activeObjects.length > 0) {
    activeObjects.forEach((object) => {
      canvas.remove(object); // Hapus semua objek yang dipilih
    });
    canvas.discardActiveObject(); // Hilangkan seleksi
    canvas.renderAll();
    saveHistory(); // Simpan perubahan setelah menghapus
    console.log(`${activeObjects.length} object(s) deleted.`);
  } else {
    console.log("No objects selected for deletion.");
  }
});

// Fungsi untuk memindahkan objek
function moveObject(direction) {
  const selectedObject = canvas.getActiveObject();
  if (selectedObject) {
    const step = 10; // Jarak perpindahan
    switch (direction) {
      case "up":
        selectedObject.set("top", selectedObject.top - step);
        break;
      case "down":
        selectedObject.set("top", selectedObject.top + step);
        break;
      case "left":
        selectedObject.set("left", selectedObject.left - step);
        break;
      case "right":
        selectedObject.set("left", selectedObject.left + step);
        break;
    }
    // Refresh canvas untuk menerapkan perubahan
    canvas.requestRenderAll();
  } else {
    alert("Pilih objek terlebih dahulu!");
  }
}

// Event listener untuk tombol
document
  .getElementById("keatas")
  .addEventListener("click", () => moveObject("up"));
document
  .getElementById("kebawa")
  .addEventListener("click", () => moveObject("down"));
document
  .getElementById("kekiri")
  .addEventListener("click", () => moveObject("left"));
document
  .getElementById("kekanan")
  .addEventListener("click", () => moveObject("right"));

// bagian nav
// logika tombol kopy
document.getElementById("nav-copy").addEventListener("click", () => {
  const selectedObject = canvas.getActiveObject();
  if (selectedObject) {
    clipboard = selectedObject.clone((cloned) => {
      cloned.set({
        left: cloned.left + 10,
        top: cloned.top + 10,
      });

      clipboards = cloned;
      console.log("Object copied:", clipboards);
    });
  } else {
    console.log("No object selected for copy.");
  }
});

// logika tombol paste
document.getElementById("nav-paste").addEventListener("click", () => {
  const selectedObject = canvas.getActiveObject();
  if (clipboards) {
    clipboards.clone((cloned) => {
      cloned.set({
        left: cloned.left + 10,
        top: cloned.top + 10,
      });

      canvas.add(cloned);
      canvas.setActiveObject(cloned);
      canvas.renderAll();

      console.log("Object pasted:", cloned);
      saveHistory(); // Simpan perubahan setelah paste
    });
  } else {
    console.log("No object to paste.");
    alert("Tidak ada objek yang disalin untuk dipaste.");
  }
});

// logika tombol cut
document.getElementById("nav-cut").addEventListener("click", () => {
  const selectedObject = canvas.getActiveObject();
  if (selectedObject) {
    clipboard = selectedObject.clone((cloned) => {
      cloned.set({
        left: cloned.left + 10,
        top: cloned.top + 10,
      });

      clipboards = cloned;
      console.log("Object copied:", clipboards);
    });
    canvas.remove(selectedObject);
    console.log("Object cut:", selectedObject);
    saveHistory(); // Simpan perubahan setelah cut
  } else {
    console.log("No object selected for cut.");
  }
});

// logika tombol undo
document.getElementById("nav-undo").addEventListener("click", () => {
  // Ctrl+Z: Undo
  if (currentHistoryIndex > 0) {
    redoHistory.push(history[currentHistoryIndex]); // Simpan untuk redo
    currentHistoryIndex--;

    const previousState = history[currentHistoryIndex];
    canvas.loadFromJSON(previousState, () => {
      canvas.renderAll();
      console.log("Undo: Reverted to state at index", currentHistoryIndex);
    });
  } else {
    console.log("No more history to undo.");
  }
});

// logika tombol redo
document.getElementById("nav-redo").addEventListener("click", () => {
  // Ctrl+Y: Redo
  if (redoHistory.length > 0) {
    const redoState = redoHistory.pop();
    history.push(redoState); // Tambahkan kembali ke history
    currentHistoryIndex++;

    canvas.loadFromJSON(redoState, () => {
      canvas.renderAll();
      console.log("Redo: Reverted to state at index", currentHistoryIndex);
    });
  } else {
    console.log("No more history to redo.");
  }
});

// logika tombol naikan sheep ke lapisan paling atas canvas
document.getElementById("nav-naikan-lapisan").addEventListener("click", () => {
  const selectedObject = canvas.getActiveObject();
  if (selectedObject) {
    selectedObject.bringToFront(); // Memindahkan objek terpilih ke lapisan teratas
    canvas.renderAll(); // Merender ulang canvas agar perubahan terlihat
    console.log("Object brought to front:", selectedObject);
  } else {
    console.log("No object selected to bring to front.");
    alert("Pilih objek yang ingin dinaikkan ke atas!");
  }
});

// logika tombol turunkan sheep ke lapisan paling bawah canvas
document.getElementById("nav-turukan-lapisan").addEventListener("click", () => {
  const selectedObject = canvas.getActiveObject();
  if (selectedObject) {
    selectedObject.sendToBack(); // Memindahkan objek terpilih ke lapisan terbawah
    canvas.renderAll(); // Merender ulang canvas agar perubahan terlihat
    console.log("Object sent to back:", selectedObject);
  } else {
  }
});

// logika tombol delate
document.getElementById("nav-delate").addEventListener("click", () => {
  // Delete: Hapus
  const activeObjects = canvas.getActiveObjects(); // Mendapatkan semua objek yang dipilih
  if (activeObjects.length > 0) {
    activeObjects.forEach((object) => {
      canvas.remove(object); // Hapus semua objek yang dipilih
    });
    canvas.discardActiveObject(); // Hilangkan seleksi
    canvas.renderAll();
    saveHistory(); // Simpan perubahan setelah menghapus
    console.log(`${activeObjects.length} object(s) deleted.`);
  } else {
    console.log("No objects selected for deletion.");
  }
});

// Event listener untuk tombol
document
  .getElementById("nav-keatas")
  .addEventListener("click", () => moveObject("up"));
document
  .getElementById("nav-kebawa")
  .addEventListener("click", () => moveObject("down"));
document
  .getElementById("nav-kekiri")
  .addEventListener("click", () => moveObject("left"));
document
  .getElementById("nav-kekanan")
  .addEventListener("click", () => moveObject("right"));

document.addEventListener("keydown", (event) => {
  const selectedObject = canvas.getActiveObject();

  if (event.ctrlKey && event.key === "c") {
    // Ctrl+C: Copy
    const activeObjects = canvas.getActiveObjects();

    if (activeObjects.length > 0) {
      clipboard = [];
      activeObjects.forEach((obj) => {
        obj.clone((cloned) => {
          cloned.set({
            left: obj.left + 10,
            top: obj.top + 10,
          });
          clipboard.push(cloned);
        });
      });

      console.log("Objects copied:", clipboard);
    } else {
      console.log("No objects selected for copy.");
    }
  } else if (event.ctrlKey && event.key === "v") {
    // Ctrl+V: Paste
    if (clipboard.length > 0) {
      clipboard.forEach((cloned) => {
        cloned.clone((newClone) => {
          newClone.set({
            left: newClone.left + 10, // Geser posisi sedikit
            top: newClone.top + 10,
          });

          canvas.add(newClone);
          canvas.setActiveObject(newClone);
        });
      });

      canvas.renderAll();
      console.log("Objects pasted:", clipboard);
      saveHistory(); // Simpan perubahan setelah paste
    } else {
      console.log("No objects to paste.");
    }
  } else if (event.ctrlKey && event.key === "x") {
    // Ctrl+X: Cut
    const activeObjects = canvas.getActiveObjects();

    if (activeObjects.length > 0) {
      clipboard = [];
      activeObjects.forEach((obj) => {
        obj.clone((cloned) => {
          cloned.set({
            left: obj.left + 10,
            top: obj.top + 10,
          });
          clipboard.push(cloned);
        });

        canvas.remove(obj); // Hapus objek dari canvas
      });

      canvas.discardActiveObject(); // Hilangkan seleksi aktif
      canvas.renderAll();

      console.log("Objects cut:", clipboard);
      saveHistory(); // Simpan perubahan setelah cut
    } else {
      console.log("No objects selected for cut.");
    }
  } else if (event.key === "Delete") {
    // Delete: Hapus
    const activeObjects = canvas.getActiveObjects(); // Mendapatkan semua objek yang dipilih
    if (activeObjects.length > 0) {
      activeObjects.forEach((object) => {
        canvas.remove(object); // Hapus semua objek yang dipilih
      });
      canvas.discardActiveObject(); // Hilangkan seleksi
      canvas.renderAll();
      saveHistory(); // Simpan perubahan setelah menghapus
      console.log(`${activeObjects.length} object(s) deleted.`);
    } else {
      console.log("No objects selected for deletion.");
    }
  } else if (event.ctrlKey && event.key === "z") {
    // Ctrl+Z: Undo
    if (currentHistoryIndex > 0) {
      redoHistory.push(history[currentHistoryIndex]); // Simpan untuk redo
      currentHistoryIndex--;

      const previousState = history[currentHistoryIndex];
      canvas.loadFromJSON(previousState, () => {
        canvas.renderAll();
        console.log("Undo: Reverted to state at index", currentHistoryIndex);
      });
    } else {
      console.log("No more history to undo.");
    }
  } else if (event.ctrlKey && event.key === "y") {
    // Ctrl+Y: Redo
    if (redoHistory.length > 0) {
      const redoState = redoHistory.pop();
      history.push(redoState); // Tambahkan kembali ke history
      currentHistoryIndex++;

      canvas.loadFromJSON(redoState, () => {
        canvas.renderAll();
        console.log("Redo: Reverted to state at index", currentHistoryIndex);
      });
    } else {
      console.log("No more history to redo.");
    }
  } else if (event.key === "ArrowUp") {
    // Panah atas
    selectedObject.top -= 10;
  } else if (event.key === "ArrowDown") {
    // Panah bawah
    selectedObject.top += 10;
  } else if (event.key === "ArrowLeft") {
    // Panah kiri
    selectedObject.left -= 10;
  } else if (event.key === "ArrowRight") {
    // Panah kanan
    selectedObject.left += 10;
  }

  // Setelah setiap perubahan, update canvas
  canvas.renderAll();
});

/*************  ✨ Codeium Command ⭐  *************/
/**
 * Simpan riwayat canvas sebelumnya. Jika ada perubahan setelah posisi
 * saat ini, maka perubahan-perubahan itu akan dihapus.
 *
 * @return {void}
 */

/******  18646b9d-867a-4ffb-8eaa-71810f4cab79  *******/
function saveHistory() {
  if (currentHistoryIndex < history.length - 1) {
    // Hapus riwayat setelah posisi saat ini
    history = history.slice(0, currentHistoryIndex + 1);
  }

  // Simpan seluruh keadaan canvas dalam JSON
  const currentState = JSON.stringify(canvas.toJSON());
  history.push(currentState);
  currentHistoryIndex++;

  console.log("History saved. Current index:", currentHistoryIndex);
}

// Fungsi untuk menyimpan status canvas ke dalam redoHistory
function saveRedoHistory() {
  // Simpan salinan canvas untuk redo setelah undo
  if (currentHistoryIndex >= 0) {
    redoHistory.push(canvas.toJSON());
  }
}

canvas.on("object:modified", () => saveHistory());
canvas.on("object:added", () => saveHistory());
canvas.on("object:removed", () => saveHistory());

canvas.loadFromJSON(history[currentHistoryIndex], () => {
  canvas.renderAll();
  console.log("Canvas state loaded successfully at index", currentHistoryIndex);
});

canvas.on("selection:created", (e) => {
  console.log("Objects selected:", e.selected);
});

canvas.on("selection:updated", (e) => {
  console.log("Objects reselected:", e.selected);
});

canvas.on("selection:cleared", () => {
  console.log("Selection cleared");
});

// Ambil elemen input warna
const elementColorInput = document.getElementById("elementColor");

// Event listener untuk mengubah warna elemen yang dipilih
elementColorInput.addEventListener("input", (event) => {
  const selectedObject = canvas.getActiveObject();
  if (selectedObject) {
    selectedObject.set("fill", event.target.value);
    canvas.renderAll();
  }
});

// Opsional: Ganti warna latar belakang canvas
const backgroundColorInput = document.getElementById("backgroundColor");
backgroundColorInput.addEventListener("input", (event) => {
  canvas.setBackgroundColor(event.target.value, canvas.renderAll.bind(canvas));
});

// Fungsi untuk mengubah ukuran latar belakang canvas berdasarkan rasio yang dipilih
const aspectRatioSelect = document.getElementById("aspectRatio");
aspectRatioSelect.addEventListener("change", (event) => {
  const aspectRatio = event.target.value;
  let newWidth = 800; // Default width
  let newHeight = 600; // Default height

  if (aspectRatio === "16:9") {
    newHeight = (newWidth * 9) / 16;
  } else if (aspectRatio === "9:16") {
    newHeight = (newWidth * 16) / 9;
  } else if (aspectRatio === "4:5") {
    newHeight = (newWidth * 5) / 4;
  } else if (aspectRatio === "1:1") {
    newHeight = newWidth;
  } else if (aspectRatio === "4:3") {
    newHeight = (newWidth * 3) / 4;
  }

  canvas.setWidth(newWidth);
  canvas.setHeight(newHeight);
});

// Event listener untuk tombol-tombol shape
const shapeOptions = document.getElementById("shapeOptions");
shapeOptions.addEventListener("click", (event) => {
  const shapeType = event.target.getAttribute("data-shape");
  const shapeSize = 100; // Ukuran shape default
  if (shapeType) {
    addShapeToCanvas(shapeType, shapeSize, 100, 100); // Tambahkan shape ke posisi default
  }
});

// Ambil input slider untuk ukuran shape
const sizeSlider = document.getElementById("shapeSize");
const sizeValueDisplay = document.getElementById("sizeValue");

// Variabel untuk menyimpan shape yang sedang dipilih
let selectedShape = null;

// Tampilkan nilai ukuran yang dipilih dan ubah ukuran shape
sizeSlider.addEventListener("input", () => {
  sizeValueDisplay.textContent = sizeSlider.value;

  // Jika ada shape yang sedang dipilih, perbarui ukurannya
  if (selectedShape) {
    const newSize = parseInt(sizeSlider.value, 10);

    // Perbarui ukuran shape secara umum menggunakan skala
    const scaleFactor =
      newSize / (selectedShape.width || selectedShape.radius * 2);
    selectedShape.scale(scaleFactor);

    // Refresh canvas untuk menerapkan perubahan
    canvas.requestRenderAll();
  }
});

// Event drag-and-drop
shapeOptions.addEventListener("dragstart", (event) => {
  const shapeType = event.target.getAttribute("data-shape");
  event.dataTransfer.setData("shapeType", shapeType);
});

canvas.wrapperEl.addEventListener("dragover", (event) => {
  event.preventDefault(); // Izinkan drop
});

canvas.wrapperEl.addEventListener("drop", (event) => {
  event.preventDefault();
  const shapeType = event.dataTransfer.getData("shapeType");
  if (shapeType) {
    const rect = canvas.wrapperEl.getBoundingClientRect();
    const dropX = event.clientX - rect.left;
    const dropY = event.clientY - rect.top;
    addShapeToCanvas(shapeType, parseInt(sizeSlider.value, 10), dropX, dropY); // Tambahkan shape ke posisi drop
  }
});

// Fungsi untuk menambahkan shape ke canvas
function addShapeToCanvas(shapeType, shapeSize, left, top) {
  let newShape;
  if (shapeType === "circle") {
    newShape = new fabric.Circle({
      type: "circle",
      radius: shapeSize / 2,
      fill: "red",
      left,
      top,
    });
  } else if (shapeType === "rectangle") {
    newShape = new fabric.Rect({
      type: "rectangle",
      width: shapeSize,
      height: shapeSize / 2,
      fill: "blue",
      left,
      top,
    });
  } else if (shapeType === "triangle") {
    newShape = new fabric.Triangle({
      type: "triangle",
      width: shapeSize,
      height: shapeSize,
      fill: "green",
      left,
      top,
    });
  } else if (shapeType === "equilateral") {
    newShape = new fabric.Polygon(
      [
        { x: 0, y: shapeSize },
        { x: shapeSize / 2, y: 0 },
        { x: shapeSize, y: shapeSize },
      ],
      {
        fill: "pink",
        left,
        top,
      }
    );
  } else if (shapeType === "isosceles") {
    newShape = new fabric.Polygon(
      [
        { x: 0, y: shapeSize },
        { x: shapeSize / 2, y: 0 },
        { x: shapeSize, y: shapeSize },
      ],
      {
        fill: "yellow",
        left,
        top,
      }
    );
  } else if (shapeType === "hexagon") {
    newShape = new fabric.Polygon(
      [
        { x: shapeSize / 2, y: 0 },
        { x: shapeSize, y: shapeSize / 4 },
        { x: shapeSize, y: (shapeSize * 3) / 4 },
        { x: shapeSize / 2, y: shapeSize },
        { x: 0, y: (shapeSize * 3) / 4 },
        { x: 0, y: shapeSize / 4 },
      ],
      {
        fill: "cyan",
        left,
        top,
      }
    );
  } else if (shapeType === "pentagon") {
    newShape = new fabric.Polygon(
      [
        { x: shapeSize / 2, y: 0 },
        { x: shapeSize, y: shapeSize / 4 },
        { x: (shapeSize * 3) / 4, y: shapeSize },
        { x: shapeSize / 4, y: shapeSize },
        { x: 0, y: shapeSize / 4 },
      ],
      {
        fill: "magenta",
        left,
        top,
      }
    );
  } else if (shapeType === "oval") {
    newShape = new fabric.Ellipse({
      rx: shapeSize / 2,
      ry: shapeSize / 4,
      fill: "orange",
      left,
      top,
    });
  }

  // Tambahkan event listener untuk mendeteksi klik pada shape
  newShape.on("selected", () => {
    selectedShape = newShape;
    sizeSlider.value =
      selectedShape.type === "circle"
        ? selectedShape.radius * 2
        : selectedShape.width || selectedShape.rx * 2;
    sizeValueDisplay.textContent = sizeSlider.value;
  });

  // Tambahkan ke canvas
  canvas.add(newShape);
}

// Menampilkan shapes tambahan ketika tombol "Pilih Shape Lainnya" diklik
const showMoreShapesButton = document.getElementById("showMoreShapes");
const additionalShapes = document.getElementById("additionalShapes");

showMoreShapesButton.addEventListener("click", () => {
  additionalShapes.style.display = "block";
  showMoreShapesButton.style.display = "none";
});

// Event listener untuk menghapus referensi shape yang dipilih saat tidak ada selection
canvas.on("selection:cleared", () => {
  selectedShape = null;
});
