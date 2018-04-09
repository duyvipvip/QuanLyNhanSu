const router = require('express').Router();
const tamungController = require("../controller/tamung.controller");

router.get('/timkiemmottamung', timkiemmottamung);
router.post('/taomoitamung', taomoitamung);
router.post('/chinhsuatamung', chinhsuatamung);
router.post('/xoatamung', xoatamung);
module.exports = router;

// LẤY TẤT CẢ NHÂN VIÊN
function timkiemmottamung(req, res, next){
    tamungController.timkiemmottamung(req.query)
        .then((tamung) => {
            res.send(tamung);
        })
        .catch((err) => {

        });
}

// TẠO MỚI LƯƠNG THƯỞNG
function taomoitamung(req, res, next){
    let bodyNhanvien = req.body;
    tamungController.taomoitamung(bodyNhanvien)
        .then((nhanvien) => {
            res.send(nhanvien);
        })
        .catch((err) => {

        });
}

// CHỈNH SỬA THƯỞNG LƯƠNG
function chinhsuatamung(req, res, next){
    tamungController.chinhsuatamung(req.body)
        .then((tamung) => {
            res.send(tamung);
        })
        .catch((err) => {

        });
}

// XOÁ MỘT NHÂN VIÊN
function xoatamung(req, res, next){
    tamungController.xoatamung(req.body)
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
