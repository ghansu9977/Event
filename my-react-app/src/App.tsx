import './App.css'
import { Route, BrowserRouter as Router, Routes } from 'react-router-dom'
import Home from './component/Home'
import Header from './component/Header'
import CarCarousel from './component/Carosal'


function App() {

  return (<>
      <Router basename='/react'>
          <Routes>
            <Route path='/' element={<Home/>}/>
            <Route path='/header' element={<Header/>}/>
            <Route path='/Carosal' element={<CarCarousel/>}/>
          </Routes>
      </Router>
    </>
  )
}

export default App