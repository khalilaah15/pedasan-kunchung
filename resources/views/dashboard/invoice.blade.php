<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ str_pad($transaksi->id_transaksi, 6, '0', STR_PAD_LEFT) }}</title>
    <style>
        body {
            font-family: 'Segoe UI', 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
            line-height: 1.5;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
        }
        .header {
            background: #CC0000;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 14px;
            opacity: 0.9;
        }
        .info-section {
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            border-bottom: 1px solid #eee;
        }
        .info-box h3 {
            margin: 0 0 10px;
            color: #CC0000;
            font-size: 16px;
        }
        .info-box p {
            margin: 5px 0;
            font-size: 14px;
        }
        .table-container {
            padding: 0 20px 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        th {
            background: #f8f9fa;
            font-weight: 600;
            color: #333;
        }
        .total-section {
            padding: 0 20px 20px;
            text-align: right;
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-size: 16px;
        }
        .total-row.total {
            font-weight: bold;
            font-size: 18px;
            color: #CC0000;
            border-top: 2px solid #CC0000;
            margin-top: 10px;
            padding-top: 10px;
        }
        .footer {
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #eee;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .status-pending { background: #FFC107; color: #333; }
        .status-paid { background: #4caf50; color: white; }
        .status-cancelled { background: #f44336; color: white; }
    </style>
</head>
<body>
    <div class="invoice-container">
        <!-- Header -->
        <div class="header">
            <h1>PEDASAN KUNCHUNG</h1>
            <p>Invoice #{{ str_pad($transaksi->id_transaksi, 6, '0', STR_PAD_LEFT) }}</p>
        </div>

        <!-- Info Section -->
        <div class="info-section">
            <div class="info-box">
                <h3>Penerima</h3>
                <p><strong>{{ $transaksi->nama_penerima }}</strong></p>
                <p>{{ $transaksi->alamat_pengiriman }}</p>
                <p>📞 {{ $transaksi->nomor_telepon }}</p>
            </div>
            <div class="info-box">
                <h3>Transaksi</h3>
                <p>Tanggal: {{ $transaksi->created_at->format('d M Y H:i') }}</p>
                <p>Status: 
                    <span class="status-badge 
                        @if($transaksi->status == 'Pending') status-pending
                        @elseif($transaksi->status == 'Processing') status-processing
                        @elseif($transaksi->status == 'Completed') status-completed
                        @else status-cancelled @endif">
                        {{ $transaksi->status }}
                    </span>
                </p>
                @if($transaksi->catatan)
                    <p>Catatan: {{ $transaksi->catatan }}</p>
                @endif
            </div>
        </div>

        <!-- Items Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi->detail as $detail)
                        <tr>
                            <td>{{ $detail->katalog->nama_katalog }}</td>
                            <td>Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                            <td>{{ $detail->qty }}</td>
                            <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Total -->
        <div class="total-section">
            <div class="total-row">
                <span>Total:</span>
                <span>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
            </div>
            <div class="total-row total">
                <span><strong>Total Tagihan:</strong></span>
                <span><strong>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</strong></span>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Terima kasih telah berbelanja di Pedasan Kunchung!</p>
            <p>www.pedasan-kunchung.com • 🌶️ Pedasnya Bikin Nagih</p>
        </div>
    </div>
</body>
</html>