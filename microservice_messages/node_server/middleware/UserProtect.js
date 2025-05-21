const jwt = require('jsonwebtoken');
const fs = require('fs');
const public_key = fs.readFileSync('./middleware/oauth-public.key', 'utf8');
require('dotenv').config();
const secretKey = process.env.SECRET_KEY; //this is needed if you are using JWTAuth 


var checkPassportToken = (req, res, next) => {
    // const token = req.header('Authorization')?.replace('Bearer', '');
    const token = req.headers['authorization']?.split(' ')[1];
    if (!token) {
        return res.status(401).json({
            'message': 'Access denied'
        });
    }
    try {
        const decoded = jwt.verify(token, public_key, { algorithms: ['RS256'] });
        req.user = decoded;
        req.token=token;
        next();
    } catch (error) {
        return res.status(400).json({
            'message': error
        });
    }
}

// -------------- verify logged after strategy implementation ------------------
var checkUserAccess = async (req, res, next) => {
    if (!req.user) {
        return res.status(401).json({
            'message': req.strategy_res
        });
    }
    next();
}


// ---------------- check JWTAuth token -----------------
var checkJWTAuthToken = async (req, res, next) => {
    const token = req.headers['authorization']?.split(' ')[1]
    req.token=token;
    if (!token) {
        return res.status(401).json({
            'message': 'Access denied'
        });
    }
    try {
        // Verifying the token with the secret key
        const decoded = jwt.verify(token, secretKey);
        req.user=decoded;
        next();
    } catch (error) {
        return res.status(402).json({
            'message': error
        });
    }

}
module.exports = { checkPassportToken, checkUserAccess ,checkJWTAuthToken};