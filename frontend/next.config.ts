import type { NextConfig } from "next";

const nextConfig: NextConfig = {
  // Keep generated build output separate from the source tree's .next cache.
  distDir: "build-output",
};

export default nextConfig;
