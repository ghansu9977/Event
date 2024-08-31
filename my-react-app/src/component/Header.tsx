import { useNavigate } from "react-router-dom";
import { FaHeart } from "react-icons/fa";
import CarCarousel from "./Carosal";

export default function Header() {
  const navigate = useNavigate();

  // Dummy authentication state and handlers
  const isAuthenticated = false; // Change to your actual auth logic
  const handleLogoutClick = () => {
    // Implement logout logic here
    console.log("Logout clicked");
  };
  const handleAddPropertyClick = () => {
    // Implement add property logic here
    console.log("Add Property clicked");
  };
  const handleLoginClick = () => {
    // Implement login logic here
    console.log("Login clicked");
  };

  return (<>
    <header className="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
      <div className="container">
        <a className="navbar-brand d-flex align-items-center" href="/" aria-label="Home">
          <h4 className="mb-0">Real<span className="text-primary">State</span></h4>
        </a>
        <button
          className="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span className="navbar-toggler-icon"></span>
        </button>
        <div className="collapse navbar-collapse" id="navbarNav">
          <ul className="navbar-nav me-auto mb-2 mb-lg-0">
            <li className="nav-item">
              <a className="nav-link active" href="/" aria-current="page">Home</a>
            </li>
            <li className="nav-item">
              <a
                className="nav-link"
                onClick={() => navigate("/AboutUs")}
                style={{ cursor: "pointer" }}
                aria-label="About Us"
              >
                About Us
              </a>
            </li>
            <li className="nav-item">
              <a
                className="nav-link"
                onClick={() => navigate("/user-property")}
                style={{ cursor: "pointer" }}
                aria-label="Properties"
              >
                Properties
              </a>
            </li>
          </ul>
          <form className="d-flex ms-auto mb-2 mb-lg-0" role="search">
            <input
              className="form-control me-2"
              type="search"
              placeholder="Enter location..."
              aria-label="Search"
            />
            <button className="btn btn-outline-success" type="submit">Search</button>
          </form>
          <div className="d-flex ms-2">
            {isAuthenticated ? (
              <>
                <button
                  className="btn btn-danger me-2"
                  onClick={handleLogoutClick}
                  aria-label="Logout"
                >
                  Logout
                </button>
                <button
                  className="btn btn-info"
                  onClick={handleAddPropertyClick}
                  aria-label="Add Property"
                >
                  Add Properties
                </button>
              </>
            ) : (
              <button
                className="btn btn-primary me-2"
                onClick={handleLoginClick}
                aria-label="Login"
              >
                Login
              </button>
            )}
            <button
              className="btn btn-light"
              onClick={() => navigate("/fav")}
              aria-label="Favorites"
            >
              <FaHeart size={20} />
            </button>
          </div>
        </div>
      </div>
    </header>
    <CarCarousel/>
  </>);
}
