const router = require('express').Router();
const nguoidungModel = require('../model/nguoidung.model');
var jwt = require('../utils/jwt');
const nguoidungController = require("../controller/nguoidung.controller");

router.get('/laytatcanguoidung', laytatcanguoidung);
router.get('/xacnhannguoidung', xacnhannguoidung)
router.post('/taomoinguoidung', taomoinguoidung);
router.post('/chinhsuanguoidung', chinhsuanguoidung);
router.post('/xoanguoidung', xoanguoidung);
router.get('/timkiemnguoidung/:idnguoidung', timkiemnguoidung);

module.exports = router;

// LẤY TẤT CẢ NGƯỜI DÙNG
function laytatcanguoidung(req, res, next){
    nguoidungController.laytatcanguoidung()
        .then((nguoidung) => {
            res.send(nguoidung);
        })
        .catch((err) => {

        });
}
function xacnhannguoidung(req, res, next){
    let token = req.query.token;
    jwt.verify(token, function (err, decodedData) {
        if (err) {
            res.status(401);
            res.json({
                message: 'Invalid Token'
            });
        } else {
            var email = decodedData.email;
            return nguoidungModel.findOne({email: email})
                .then(function (foundNguoidung) {
                    if (foundNguoidung) {
                        foundNguoidung.kichhoat = 'true';
                        return foundNguoidung.save()
                            .then((updateNguoiDung) => {
                                res.writeHead(301, {
                                    Location: "http://localhost/quanlynhansu/index.php"
                                  });
                                res.end();
                            })
                    } else {
                        return Promise.reject({
                            message: 'Not Found'
                        });
                    }
                })
                .catch(function (err) {
                    res.send(err);
                })
        }
    })
}
// TẠO MỚI NGƯỜI DÙNG
function taomoinguoidung(req, res, next){
    let bodynguoidung = req.body;
    nguoidungController.taomoinguoidung(bodynguoidung)
        .then((nguoidung) => {
            res.send(nguoidung);
        })
        .catch((err) => {
            res.send(err);
        });
}

// CHỈNH SỬA NGƯỜI DÙNG
function chinhsuanguoidung(req, res, next){
    let bodynguoidung = req.body;
    nguoidungController.chinhsuanguoidung(bodynguoidung)
        .then((nguoidung) => {
            res.send(nguoidung);
        })
        .catch((err) => {

        });
}

// XOÁ MỘT NGƯỜI DÙNG
function xoanguoidung(req, res, next){
    let idnguoidung = req.body.idnguoidung;
    nguoidungController.xoanguoidung(idnguoidung)
        .then((nguoidung) => {
            res.send(nguoidung);
        })
        .catch((err) => {

        });
}

// TÌM KIẾM MỘT NHÂN VIÊN
function timkiemnguoidung(req, res, next){
    let idnguoidung = req.params.idnguoidung;
    nguoidungController.timkiemnguoidung(idnguoidung)
        .then((nguoidung) => {
            res.send(nguoidung);
        })
        .catch((err) => {

        });
}
