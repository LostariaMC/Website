import React from "react";
import styles from "../../styles/components/RoundedButton.module.scss";

const RoundedButton = ({
  children,
  secondary = false,
  buttonColor = "",
  textColor = "",
  action = () => {},
  type = "button",
  disabled = false,
  className = "",
}) => (
  <button
    className={`${styles.buttonContainer} ${secondary && styles.secondaryButton} ${className}`}
    style={{ backgroundColor: buttonColor, color: textColor }}
    onClick={action}
    type={type}
    disabled={disabled}
  >
    {children}
  </button>
);

export default RoundedButton;
