
const passport = require('passport');
const fs = require('fs');
const jwt = require('jsonwebtoken');



const util = require('util');
// Load your public key (this is the key used to sign tokens in Laravel Passport)

const publicKey = fs.readFileSync('./middleware/oauth-public.key', 'utf8');

// Define the custom Passport JWT strategy
class AuthTokenStrategy extends passport.Strategy {
    strategy_res;
    constructor() {
        super();
        this.strategy_res={
            status:400,
            message:null
        }
    }

    authenticate(req,res,next) {
        req.strategy_res=this.strategy_res;
        // Extract the token from the request, usually in the 'Authorization' header
        const token = req.headers['authorization']?.split(' ')[1]; // Assuming 'Bearer <token>'

        if (!token) {
            // return this.fail({ message: 'Invalid token', status: 401 }, 401);
            // this.strategy_res.message="Invalid token";
            req.strategy_res.message="Invalid token";
        }

        // Verify the token using JWT and the public key
        jwt.verify(token, publicKey, { algorithms: ['RS256'] }, (error, decoded) => {
            if (error) {
                // return this.fail({ message: 'Invalid token', status: 401 }, 401);
                req.strategy_res.message="Invalid token";
            }

            // Token is valid, so pass the decoded token to the next middleware
            this.success(decoded);
        });
    }
}

module.exports = AuthTokenStrategy;