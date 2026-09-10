import styles from "./page.module.css";

export default function Home() {
  return (
    <div className={styles.page}>
      <main className={styles.main}>
        <div className={styles.intro}>
          <p className={styles.eyebrow}>Smart Farming</p>
          <h1>Farm monitoring foundation</h1>
          <p>
            The frontend foundation is ready for authentication, farm setup,
            sensor monitoring, and safe automation.
          </p>
        </div>
        <section className={styles.status} aria-label="Foundation status">
          <strong>Foundation status</strong>
          <span>Ready for the first vertical slice</span>
        </section>
      </main>
    </div>
  );
}
