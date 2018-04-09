const router = require('express').Router();
const tinhthanhController = require("../controller/tinhthanh.controller");

router.get('/all', getTinhThanhS);
router.get('/only', getTinhThanh);
router.post('/create', createTinhThanh);
router.post('/delete', deleteTinhThanh);
router.post('/update', updateTinhThanh);
module.exports = router;

function getTinhThanhS(req, res, next){
    tinhthanhController.getTinhThanhs()
        .then((tinhthanh) => {
            res.send(tinhthanh);
        })
        .catch((err) => {

        });
}

function updateTinhThanh(req, res, next){
    tinhthanhController.updateTinhThanh(req.body)
        .then((tinhthanh) => {
            res.send(tinhthanh);
        })
        .catch((err) => {

        });
}

function getTinhThanh(req, res, next){
    let idtinhthanh = req.query.idtinhthanh;
    tinhthanhController.getTinhThanh(idtinhthanh)
        .then((tinhthanh) => {
            res.send(tinhthanh);
        })
        .catch((err) => {

        });
}

function createTinhThanh(req, res, next){
    tinhthanhController.createTinhThanh(req.body)
        .then((tinhthanh) => {
            res.send(tinhthanh);
        })
        .catch((err) => {

        });
}

function deleteTinhThanh(req, res, next){
    tinhthanhController.deleteTinhThanh(req.body.idtinhthanh)
        .then((tinhthanh) => {
            res.send(tinhthanh);
        })
        .catch((err) => {

        });
}
