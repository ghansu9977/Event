import React from 'react';
import { Carousel } from 'react-bootstrap';

const CarCarousel: React.FC = () => {
  return (
    <div style={{width:"100%",height:"400px",border:"1px solid red"}}>
<Carousel>
      <Carousel.Item>
        <img
          className="d-block w-100"
          src="/images/third.jpg"  // Correct path to the image
          alt="First slide"
        />
        <Carousel.Caption>
          <h3>First Slide Label</h3>
          <p>Description for the first slide.</p>
        </Carousel.Caption>
      </Carousel.Item>

      <Carousel.Item>
        <img
          className="d-block w-100"
          src="/images/first.jpg"  // Correct path to the image
          alt="Second slide"
        />
        <Carousel.Caption>
          <h3>Second Slide Label</h3>
          <p>Description for the second slide.</p>
        </Carousel.Caption>
      </Carousel.Item>

      <Carousel.Item>
        <img
          className="d-block w-100"
          src="/images/second.jpg"  // Correct path to the image
          alt="Third slide"
        />
        <Carousel.Caption>
          <h3>Third Slide Label</h3>
          <p>Description for the third slide.</p>
        </Carousel.Caption>
      </Carousel.Item>
    </Carousel>
    </div>
    
  );
}

export default CarCarousel;
