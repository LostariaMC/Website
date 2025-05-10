import { useEffect, useState } from "react";

const useIsTablet = (breakpoint = 1024) => {
  const [isTablet, setIsTablet] = useState(window.innerWidth <= breakpoint);

  useEffect(() => {
    const handleResize = () => {
      setIsTablet(window.innerWidth <= breakpoint);
    };

    window.addEventListener("resize", handleResize);
    return () => {
      window.removeEventListener("resize", handleResize);
    };
  }, [breakpoint]);

  return isTablet;
};

export default useIsTablet;
