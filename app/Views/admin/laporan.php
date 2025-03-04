<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.4/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.4/vfs_fonts.js"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Groowy Klinik</a>
        </div>
    </nav>

    <div class="container py-4">
        <h2 class="text-center mb-4">Laporan Groowy Klinik</h2>

        <!-- Filter ID Transaksi -->
        <div class="mb-3">
            <label for="searchId" class="form-label">Cari ID Transaksi</label>
            <input type="text" id="searchId" class="form-control" placeholder="Masukkan ID Transaksi" onkeyup="filterTable()">
        </div>

        <!-- Laporan Penjualan -->
        <section class="mb-5">
            <h4>Laporan Penjualan</h4>
            <table id="laporanTable" class="table">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Metode Pembayaran</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>TRX001</td>
                        <td>Obat Cacing</td>
                        <td>2</td>
                        <td>Rp 50.000</td>
                        <td>Transfer Bank</td>
                        <td>15-02-2025</td>
                    </tr>
                    <tr>
                        <td>TRX002</td>
                        <td>Obat Diare</td>
                        <td>2</td>
                        <td>Rp 60.000</td>
                        <td>Transfer Bank</td>
                        <td>25-02-2025</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-between">
            <a href="http://localhost:8080/index.php/admin" class="btn btn-secondary">Kembali</a>
            <div>
                <button class="btn btn-success" onclick="exportToExcel()">Ekspor ke Excel</button>
                <button class="btn btn-danger" onclick="exportToPDF()">Cetak PDF</button>
            </div>
        </div>
    </div>

    <script>
        function filterTable() {
            let inputId = document.getElementById("searchId").value.toUpperCase().trim();
            let table = document.getElementById("laporanTable");
            let rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                let idCell = rows[i].getElementsByTagName("td")[0];
                if (idCell) {
                    let idText = idCell.innerText.toUpperCase();
                    rows[i].style.display = (inputId === "" || idText.includes(inputId)) ? "" : "none";
                }
            }
        }

        function exportToPDF() {
            let inputId = document.getElementById("searchId").value.toUpperCase().trim();
            let table = document.getElementById("laporanTable");
            let rows = table.getElementsByTagName("tr");
            let bodyData = [];

            for (let i = 1; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName("td");
                let rowData = [];
                if (cells.length > 0) {
                    let idTransaksi = cells[0].innerText.toUpperCase().trim();
                    if (inputId === "" || idTransaksi.includes(inputId)) {
                        for (let j = 0; j < cells.length; j++) {
                            rowData.push(cells[j].innerText);
                        }
                        bodyData.push(rowData);
                    }
                }
            }

            if (bodyData.length === 0) {
                alert("ID Transaksi tidak ditemukan");
                return;
            }

            let docDefinition = {
                content: [
                    { text: 'Laporan Klinik', style: 'header' },
                    {
                        table: {
                            headerRows: 1,
                            widths: ['*', '*', '*', '*', '*', '*'],
                            body: [
                                ['ID Transaksi', 'Produk', 'Jumlah', 'Total Harga', 'Metode Pembayaran', 'Tanggal'],
                                ...bodyData
                            ]
                        }
                    }
                ],
                styles: {
                    header: { fontSize: 18, bold: true, margin: [0, 0, 0, 10] }
                }
            };
            pdfMake.createPdf(docDefinition).download("Laporan_Klinik.pdf");
        }

        function exportToExcel() {
            let inputId = document.getElementById("searchId").value.toUpperCase().trim();
            let table = document.getElementById("laporanTable");
            let rows = table.getElementsByTagName("tr");
            let filteredData = [];

            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName("td");
                let rowData = [];
                if (cells.length > 0) {
                    let idTransaksi = cells[0].innerText.toUpperCase().trim();
                    if (inputId === "" || idTransaksi.includes(inputId)) {
                        for (let j = 0; j < cells.length; j++) {
                            rowData.push(cells[j].innerText);
                        }
                        filteredData.push(rowData);
                    }
                }
            }

            if (filteredData.length === 0) {
                alert("ID Transaksi tidak ditemukan");
                return;
            }

            let wb = XLSX.utils.book_new();
            let ws = XLSX.utils.aoa_to_sheet([["ID Transaksi", "Produk", "Jumlah", "Total Harga", "Metode Pembayaran", "Tanggal"], ...filteredData]);
            XLSX.utils.book_append_sheet(wb, ws, "Laporan Klinik");
            XLSX.writeFile(wb, "Laporan_Klinik.xlsx");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
