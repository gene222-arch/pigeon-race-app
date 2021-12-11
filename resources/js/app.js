require('./bootstrap');
import QrScanner_ from './../../node_modules/qr-scanner/qr-scanner.min'

import QrScannerWorkerPath from '!!file-loader!./../../node_modules/qr-scanner/qr-scanner-worker.min.js';
QrScanner_.WORKER_PATH = QrScannerWorkerPath;

window.QrScanner = QrScanner_;