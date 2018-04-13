const router = require('express').Router();
const chamcongController = require("../controller/chamcong.controller");

router.get('/all', getChamCongS);
router.post('/create', createChamCong);
router.post('/thuchienchamcong', thucHienChamCong);
router.post('/delete', deleteChamCong);
module.exports = router;

function thucHienChamCong(req, res, next){
    chamcongController.thucHienChamCong(req.body)
        .then((chamcong) => {
            res.send(chamcong);
        })
        .catch((err) => {

        });
}
function getChamCongS(req, res, next){
    chamcongController.getChamCongs()
        .then((chamcong) => {
            res.send(chamcong);
        })
        .catch((err) => {

        });
}

function createChamCong(req, res, next){
    chamcongController.createChamCong(req.body)
        .then((chamcong) => {
            res.send(chamcong);
        })
        .catch((err) => {

        });
}

function deleteChamCong(req, res, next){
    chamcongController.deleteChamCong(req.body.idchamcong)
        .then((chamcong) => {
            res.send(chamcong);
        })
        .catch((err) => {

        });
}


