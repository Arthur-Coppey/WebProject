const express = require('express'),
    router = express.Router(),
    controller = require('../controllers/user.controller');

/* GET users listing. */
router.get('/', function(req, res, next) {
    controller.index().then(body => {
        res.json(body);
    });
});

router.get('/:id', function (req, res, next) {
    controller.show(req.params.id).then(body => {
        res.json(body);
    });
});

module.exports = router;
