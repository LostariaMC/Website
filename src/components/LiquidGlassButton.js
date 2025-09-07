import React from "react";
import styles from "../styles/components/LiquidGlassButton.module.scss";

const LiquidGlassButton = ({
  className = "",
  onClick = () => {},
  type = "button",
  arialLabel = "",
  children,
}) => {
  return (
    <button
      className={`${styles.container} ${className}`}
      onClick={onClick}
      type={type}
      aria-label={arialLabel}
    >
      {children}
    </button>
  );
};

export default LiquidGlassButton;
