const dashboard=async(req,res)=>{
    return res.status(200).json({
        "message": "JWT Dashboard",
        "user":req.user
    });
}
module.exports={dashboard}