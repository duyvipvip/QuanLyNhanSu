const router = require('express').Router();
const phatluongController = require("../controller/phatluong.controller");

router.get('/timkiemmotphatluong', timkiemmotphatluong);
router.post('/taomoiphatluong', taomoiphatluong);
router.post('/chinhsuaphatluong', chinhsuaphatluong);
router.post('/xoaphatluong', xoaphatluong);
module.exports = router;

// LẤY TẤT CẢ NHÂN VIÊN
function timkiemmotphatluong(req, res, next){
    phatluongController.timkiemmotphatluong(req.query)
        .then((phatluong) => {
            res.send(phatluong);
        })
        .catch((err) => {

        });
}

// TẠO MỚI LƯƠNG THƯỞNG
function taomoiphatluong(req, res, next){
    let bodyNhanvien = req.body;
    phatluongController.taomoiphatluong(bodyNhanvien)
        .then((nhanvien) => {
            res.send(nhanvien);
        })
        .catch((err) => {

        });
}

// CHỈNH SỬA THƯỞNG LƯƠNG
function chinhsuaphatluong(req, res, next){
    phatluongController.chinhsuaphatluong(req.body)
        .then((phatluong) => {
            res.send(phatluong);
        })
        .catch((err) => {

        });
}

// XOÁ MỘT NHÂN VIÊN
function xoaphatluong(req, res, next){
    phatluongController.xoaphatluong(req.body)
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
