const router = require('express').Router();
const ngoainguController = require("../controller/ngoaingu.controller");

router.get('/all', getNgoaiNgus);
module.exports = router;

function getNgoaiNgus(req, res, next){
    ngoainguController.getNgoaiNgus()
        .then((ngoaingu) => {
            res.send(ngoaingu);
        })
        .catch((err) => {
        });
}
