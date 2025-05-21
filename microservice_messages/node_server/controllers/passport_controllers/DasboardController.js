const dashboard = async (req, res) => {
    return res.status(200).json({
        "message": "Dashboard",
        user: req.user,
        token:req.token
    });
}
module.exports = {
    dashboard
}