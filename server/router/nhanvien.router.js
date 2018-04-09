const router = require('express').Router();
const nhanvienController = require("../controller/nhanvien.controller");

router.get('/laytatcanhanvien', laytatcanhanvien);
router.post('/taomoinhanvien', taomoinhanvien);
router.post('/chinhsuanhanvien', chinhsuanhanvien);
router.post('/xoanhanvien', xoanhanvien);
router.get('/timkiemnhanvien/:idnhanvien', timkiemnhanvien);

module.exports = router;

// LẤY TẤT CẢ NHÂN VIÊN
function laytatcanhanvien(req, res, next){
    
    nhanvienController.laytatcanhanvien()
        .then((nhanvien) => {
            res.send(nhanvien);
        })
        .catch((err) => {

        });
}

// TẠO MỚI NHÂN VIÊN
function taomoinhanvien(req, res, next){
    let bodyNhanvien = req.body;
    nhanvienController.taomoinhanvien(bodyNhanvien)
        .then((nhanvien) => {
            res.send(nhanvien);
        })
        .catch((err) => {

        });
}

// CHỈNH SỬA NHÂN VIÊN
function chinhsuanhanvien(req, res, next){
    let bodyNhanvien = req.body;
    nhanvienController.chinhsuanhanvien(bodyNhanvien)
        .then((nhanvien) => {
            res.send(nhanvien);
        })
        .catch((err) => {

        });
}

// XOÁ MỘT NHÂN VIÊN
function xoanhanvien(req, res, next){
    let idnhanvien = req.body.idnhanvien;
    nhanvienController.xoanhanvien(idnhanvien)
        .then((nhanvien) => {
            res.send(nhanvien);
        })
        .catch((err) => {

        });
}

// TÌM KIẾM MỘT NHÂN VIÊN
function timkiemnhanvien(req, res, next){
    let idnhanvien = req.params.idnhanvien;
    nhanvienController.timkiemnhanvien(idnhanvien)
        .then((nhanvien) => {
            res.send(nhanvien);
        })
        .catch((err) => {

        });
}
