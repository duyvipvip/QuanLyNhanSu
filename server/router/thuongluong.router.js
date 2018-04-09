const router = require('express').Router();
const thuongluongController = require("../controller/thuongluong.controller");

router.get('/timkiemmotthuongluong', timkiemmotthuongluong);
router.post('/taomoithuongluong', taomoithuongluong);
router.post('/chinhsuathuongluong', chinhsuathuongluong);
router.post('/xoathuongluong', xoathuongluong);
module.exports = router;

// LẤY TẤT CẢ NHÂN VIÊN
function timkiemmotthuongluong(req, res, next){
    thuongluongController.timkiemmotthuongluong(req.query)
        .then((thuongluong) => {
            res.send(thuongluong);
        })
        .catch((err) => {

        });
}

// TẠO MỚI LƯƠNG THƯỞNG
function taomoithuongluong(req, res, next){
    let bodyNhanvien = req.body;
    thuongluongController.taomoithuongluong(bodyNhanvien)
        .then((nhanvien) => {
            res.send(nhanvien);
        })
        .catch((err) => {

        });
}

// CHỈNH SỬA THƯỞNG LƯƠNG
function chinhsuathuongluong(req, res, next){
    thuongluongController.chinhsuathuongluong(req.body)
        .then((thuongluong) => {
            res.send(thuongluong);
        })
        .catch((err) => {

        });
}

// XOÁ MỘT NHÂN VIÊN
function xoathuongluong(req, res, next){
    thuongluongController.xoathuongluong(req.body)
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
